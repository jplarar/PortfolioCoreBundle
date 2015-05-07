<?php

namespace Portfolio\CoreBundle\Controller;

use Portfolio\CoreBundle\Entity\CourseLog;
use Portfolio\CoreBundle\Entity\Student;
use Portfolio\CoreBundle\Entity\SubjectDropout;
use Portfolio\CoreBundle\Entity\Toefl;
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

            // Crawl TOEFL
            $toefls = $rawStudent->getElementsByTagName('Toefl');

            /** @var \DOMElement $rawToefl */
            foreach($toefls as $rawToefl)
            {
                $toefl = new Toefl();
                $toefl->setDate(new \DateTime($rawToefl->getElementsByTagName('date')->item(0)->nodeValue));
                $toefl->setScore(floatval($rawToefl->getElementsByTagName('score')->item(0)->nodeValue));
                $toefl->setStudentId($student);

                $em->persist($toefl);
                $em->flush();
            }

            // Crawl SubjectDropouts
            $dropouts = $rawStudent->getElementsByTagName('SubjectDropout');

            /** @var \DOMElement $rawDropout */
            foreach($dropouts as $rawDropout)
            {
                $dropout = new SubjectDropout();

                $dropout->setMotive($rawDropout->getElementsByTagName('motive')->item(0)->nodeValue);
                $dropout->setPeriod($rawDropout->getElementsByTagName('period')->item(0)->nodeValue);
                $dropout->setCourseName($rawDropout->getElementsByTagName('courseName')->item(0)->nodeValue);
                $dropout->setCourseCode($rawDropout->getElementsByTagName('courseCode')->item(0)->nodeValue);
                $dropout->setStudentId($student);

                $em->persist($dropout);
                $em->flush();
            }

            // Crawl CourseLogs
            $courselogs = $rawStudent->getElementsByTagName('CourseLog');

            /** @var \DOMElement $rawCourseLog */
            foreach($courselogs as $rawCourseLog)
            {
                $courseLog = new CourseLog();
                $courseLog->setPeriod($rawCourseLog->getElementsByTagName('period')->item(0)->nodeValue);
                $courseLog->setFinalGrade($rawCourseLog->getElementsByTagName('finalGrade')->item(0)->nodeValue);
                $courseLog->setFirstGrade($rawCourseLog->getElementsByTagName('firstGrade')->item(0)->nodeValue);
                $courseLog->setSecondGrade($rawCourseLog->getElementsByTagName('secondGrade')->item(0)->nodeValue);
                $courseLog->setCourseCode($rawCourseLog->getElementsByTagName('courseCode')->item(0)->nodeValue);
                $courseLog->setCourseName($rawCourseLog->getElementsByTagName('courseName')->item(0)->nodeValue);

                $em->persist($courseLog);
                $em->flush();
            }

        }

    }
}
