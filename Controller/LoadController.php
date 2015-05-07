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

            $studentId = $rawStudent->getAttribute('id');

            $student = new Student();
        }

    }
}
