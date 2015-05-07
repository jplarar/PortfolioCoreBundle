<?php

namespace Portfolio\CoreBundle\Controller;

use Portfolio\CoreBundle\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Symfony\Component\DomCrawler\Crawler;

class LoadController extends Controller
{
    public function parseAction(Request $request)
    {
        /* @var UploadedFile $file */
        $file = $request->files->get('file');

        if ($file->getMimeType() != "application/xml") {
            // No es un archivo XML
            $this->createAccessDeniedException("Archivo con formato incorrecto.");
        }
        $document = new \DOMDocument();
        $document->loadXml(file_get_contents($file->getPathname()));

        /** @var \Symfony\Component\DomCrawler\Crawler  $crawler */
        $crawler = new Crawler();
        $crawler->addDocument($document);

        // Get array of students (Crawler Object)
        $students = $crawler->filter("Student");

        for ($i = 0; $i < $students->count(); $i++)
        {
            $rawStudent = $students->getNode($i);
            // Haz un print de rawStudent para ver si vas bien
            $student = new Student();
            $student->setStudentId($rawStudent->getAttribute('id'));
            // Si si, creo que asi los puedes ir llamando
            $student->setFullName($rawStudent->getElementsByTagName('fullName')->item(0)->textContent);

            // Te traes el siguiente arreglo y haces el mismo pedo
            $rawToefls = $rawStudent->getElementsByTagName('Toefls')->item(0)->childNodes;
            for ($t = 0; $t < $rawToefls->length; $t++) {
                $rawToefl = $rawToefls->item($t)->childNodes;

            }

        }

    }
}
