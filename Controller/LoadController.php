<?php

namespace Portfolio\CoreBundle\Controller;

use Portfolio\CoreBundle\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class LoadController extends Controller
{
    public function listAction()
    {
        return $this->render('PortfolioCoreBundle:Load:list.html.twig');
    }

    public function academicAction()
    {
        $error = null;
        return $this->render('PortfolioCoreBundle:Load:academic.html.twig', array(
            'error' => $error
        ));
    }

    public function academicParseAction(Request $request)
    {
        /* @var UploadedFile $file */
        $file = $request->files->get('file');

        if ($file->getMimeType() != "application/xml") {
            // No es un archivo XML
            $this->createAccessDeniedException("Archivo con formato incorrecto.");
        }
        $document = new \DOMDocument();
        $document->preserveWhiteSpace = FALSE;
        $document->loadXml(file_get_contents($file->getPathname()));

        // Initialize entity manager
        $em = $this->getDoctrine()->getManager();
        $em->getConnection()->getConfiguration()->setSQLLogger(null);

        // Get array of students (Crawler Object)
        $students = $document->getElementsByTagName('Student');

        /** @var \DOMElement $rawStudent */
        foreach($students as $rawStudent)
        {
            $student = new Student();
            $student->setStudentId($rawStudent->getAttribute('id'));
            $student->setFullName($rawStudent->getElementsByTagName('fullName')->item(0)->nodeValue);
            $student->setSemester($rawStudent->getElementsByTagName('semester')->item(0)->nodeValue);
            $student->setLocalAddress($rawStudent->getElementsByTagName('localAddress')->item(0)->nodeValue);
            $student->setForeignAddress($rawStudent->getElementsByTagName('foreignAddress')->item(0)->nodeValue);
            $student->setTelephone($rawStudent->getElementsByTagName('telephone')->item(0)->nodeValue);
            $student->setCareer($rawStudent->getElementsByTagName('career')->item(0)->nodeValue);
            $student->setAdmissionDate(new \DateTime($rawStudent->getElementsByTagName('admissionDate')->item(0)->nodeValue));
            $student->setStatus($rawStudent->getElementsByTagName('status')->item(0)->nodeValue);
            $student->setGpa($rawStudent->getElementsByTagName('gpa')->item(0)->nodeValue);
            $student->setUnits($rawStudent->getElementsByTagName('units')->item(0)->nodeValue);

            $em->persist($student);
            $em->flush();
        }

    }
}
