<?php

namespace Portfolio\CoreBundle\Controller;

use Portfolio\CoreBundle\Entity\CulturalDiffusion;
use Portfolio\CoreBundle\Entity\Sport;
use Portfolio\CoreBundle\Entity\AddictionAwareness;
use Portfolio\CoreBundle\Entity\CourseLog;
use Portfolio\CoreBundle\Entity\RepresentativeTeam;
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

    public function culturalAction()
    {
        $error = null;
        return $this->render('PortfolioCoreBundle:Load:cultural.html.twig', array(
            'error' => $error
        ));
    }

    public function catAction()
    {
        $error = null;
        return $this->render('PortfolioCoreBundle:Load:cat.html.twig', array(
            'error' => $error
        ));
    }

    public function groupAction()
    {
        $error = null;
        return $this->render('PortfolioCoreBundle:Load:group.html.twig', array(
            'error' => $error
        ));
    }

    public function internationalAction()
    {
        $error = null;
        return $this->render('PortfolioCoreBundle:Load:international.html.twig', array(
            'error' => $error
        ));
    }

    public function representativeAction()
    {
        $error = null;
        return $this->render('PortfolioCoreBundle:Load:representative.html.twig', array(
            'error' => $error
        ));
    }

    public function socialAction()
    {
        $error = null;
        return $this->render('PortfolioCoreBundle:Load:social.html.twig', array(
            'error' => $error
        ));
    }

    public function sportAction()
    {
        $error = null;
        return $this->render('PortfolioCoreBundle:Load:sport.html.twig', array(
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
                $courseLog->setStudentId($student);

                $em->persist($courseLog);
                $em->flush();
            }

        }
    }

    public function teamsParseAction(Request $request)
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
        $teams = $document->getElementsByTagName('RepresentativeTeam');

        /** @var \DOMElement $rawTeam */
        foreach($teams as $rawTeam)
        {
            $team = new RepresentativeTeam();
            $team->setSport($rawTeam->getElementsByTagName('sport')->item(0)->nodeValue);
            $team->setPeriod($rawTeam->getElementsByTagName('period')->item(0)->nodeValue);

            // Look for student
            /** @var \Portfolio\CoreBundle\Entity\Student $student */
            $student = $this->getDoctrine()->getRepository('Portfolio\CoreBundle\Entity\Student')
                ->find($rawTeam->getElementsByTagName('studentId')->item(0)->nodeValue);

            if ($student) {
                $team->setStudentId($student);
                $em->persist($team);
                $em->flush();
            }
        }
    }


    public function catParseAction(Request $request)
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
        $addictions = $document->getElementsByTagName('AddictionAwareness');

        /** @var \DOMElement $rawAddiction */
        foreach($addictions as $rawAddiction)
        {
            $addiction = new AddictionAwareness();
            $addiction->setDate(new \DateTime($rawAddiction->getElementsByTagName('date')->item(0)->nodeValue));
            $addiction->setMethod($rawAddiction->getElementsByTagName('method')->item(0)->nodeValue);
            $addiction->setResult($rawAddiction->getElementsByTagName('result')->item(0)->nodeValue);

            // Look for student
            /** @var \Portfolio\CoreBundle\Entity\Student $student */
            $student = $this->getDoctrine()->getRepository('Portfolio\CoreBundle\Entity\Student')
                ->find($rawAddiction->getElementsByTagName('studentId')->item(0)->nodeValue);

            if ($student) {
                $addiction->setStudentId($student);
                $em->persist($addiction);
                $em->flush();
            }
        }
    }

    public function sportsParseAction(Request $request)
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
        $sports = $document->getElementsByTagName('Sport');

        /** @var \DOMElement $rawSport */
        foreach($sports as $rawSport)
        {
            $sport = new Sport();
            $sport->setDiscipline($rawSport->getElementsByTagName('discipline')->item(0)->nodeValue);
            $sport->setTeam($rawSport->getElementsByTagName('team')->item(0)->nodeValue);
            $sport->setPeriod($rawSport->getElementsByTagName('period')->item(0)->nodeValue);

            // Look for student
            /** @var \Portfolio\CoreBundle\Entity\Student $student */
            $student = $this->getDoctrine()->getRepository('Portfolio\CoreBundle\Entity\Student')
                ->find($rawSport->getElementsByTagName('studentId')->item(0)->nodeValue);

            if ($student) {
                $sport->setStudentId($student);
                $em->persist($sport);
                $em->flush();
            }
        }
    }

    public function culturalParseAction(Request $request)
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
        $activities = $document->getElementsByTagName('CulturalDiffusion');

        /** @var \DOMElement $rawActivity */
        foreach($activities as $rawActivity)
        {
            $activity = new CulturalDiffusion();
            $activity->setPeriod($rawActivity->getElementsByTagName('period')->item(0)->nodeValue);
            $activity->setActivity($rawActivity->getElementsByTagName('activity')->item(0)->nodeValue);
            $activity->setRole($rawActivity->getElementsByTagName('role')->item(0)->nodeValue);

            // Look for student
            /** @var \Portfolio\CoreBundle\Entity\Student $student */
            $student = $this->getDoctrine()->getRepository('Portfolio\CoreBundle\Entity\Student')
                ->find($rawActivity->getElementsByTagName('studentId')->item(0)->nodeValue);

            if ($student) {
                $activity->setStudentId($student);
                $em->persist($activity);
                $em->flush();
            }
        }
    }

}
