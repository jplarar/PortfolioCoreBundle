<?php

namespace Portfolio\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Portfolio\CoreBundle\Entity\ExtemporaneousExam;

class AcademicController extends Controller
{
    public function historyAction($id)
    {
        /* @var \Doctrine\ORM\EntityRepository $repository */
        $repository = $this->getDoctrine()->getRepository('Portfolio\CoreBundle\Entity\Student');

        /** @var \Portfolio\CoreBundle\Entity\Student $student */
        $student = $repository->find($id);

        $courseLogs = $student->getCourseLog();
        
        return $this->render('PortfolioCoreBundle:Academic:history.html.twig', array(
            'id' => $id,
            'student' => $student,
            'courseLogs' => $courseLogs
        ));
    }

    public function scoreAction($id)
    {
        /* @var \Doctrine\ORM\EntityRepository $repository */
        $repository = $this->getDoctrine()->getRepository('Portfolio\CoreBundle\Entity\Student');

        /** @var \Portfolio\CoreBundle\Entity\Student $student */
        $student = $repository->find($id);

        $courseLogs = $student->getCourseLog();

        return $this->render('PortfolioCoreBundle:Academic:score.html.twig', array(
            'id' => $id,
            'student' => $student,
            'courseLogs' => $courseLogs
        ));
    }

    public function dropoutAction($id)
    {
        /* @var \Doctrine\ORM\EntityRepository $repository */
        $repository = $this->getDoctrine()->getRepository('Portfolio\CoreBundle\Entity\SubjectDropout');
        $subjectDropouts = $repository->findBy(array(
            'studentId' => $id
        ));

        return $this->render('PortfolioCoreBundle:Academic:dropout.html.twig', array(
            'id' => $id,
            'subjectDropouts' => $subjectDropouts
        ));
    }

    public function toeflAction($id)
    {
        /* @var \Doctrine\ORM\EntityRepository $repository */
        $repository = $this->getDoctrine()->getRepository('Portfolio\CoreBundle\Entity\Toefl');
        $toefls = $repository->findBy(
            array('studentId' => $id),
            array('date' => 'ASC')
        );

        $sql = <<<ENDSQL
SELECT
    MAX(t.score) as max
FROM
    Toefls as t
WHERE
    studentId = :studentId
ENDSQL;
        /* @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->bindValue('studentId', $id);
        $stmt->execute();
        $max = $stmt->fetch(0);

        return $this->render('PortfolioCoreBundle:Academic:toefl.html.twig', array(
            'id' => $id,
            'toefls' => $toefls,
            'max' => $max['max']
        ));
    }

    public function changeScoreAction($id)
    {
        /* @var \Doctrine\ORM\EntityRepository $repository */
        $repository = $this->getDoctrine()->getRepository('Portfolio\CoreBundle\Entity\ChangeGrade');
        $changeGrades = $repository->findBy(array(
            'studentId' => $id
        ));

        return $this->render('PortfolioCoreBundle:Academic:changeScore.html.twig', array(
            'id' => $id,
            'changeGrades' => $changeGrades
        ));
    }

    public function extemporaneousAction($id, Request $request)
    {
        /* @var \Doctrine\ORM\EntityRepository $repository */
        $repository = $this->getDoctrine()->getRepository('Portfolio\CoreBundle\Entity\ExtemporaneousExam');
        $extemporaneous = $repository->findBy(array(
            'studentId' => $id
        ));
        $error = "";
        if($request->isMethod('post')) {

            // get extemporaneous parameters
            $period = $request->request->get('period');
            $exam = $request->request->get('exam');
            $originalDate = new \DateTime($request->request->get('originalDate'));
            $newDate = new \DateTime($request->request->get('newDate'));
            $motive = $request->request->get('motive');
            $courseCode = $request->request->get('courseCode');
            $courseName = $request->request->get('courseName');

            if (!$period || !$exam || !$originalDate || !$newDate || !$motive || !$courseCode || !$courseName) {
                $error = "Por favor completa todos los campos";
                return $this->render('PortfolioCoreBundle:Academic:extemporaneous.html.twig', array(
                    'id' => $id,
                    'extemporaneous' => $extemporaneous,
                    'error' => $error
                ));
            }

            $extemp = new ExtemporaneousExam();
            $extemp->setPeriod($period);
            $extemp->setExam($exam);
            $extemp->setOriginalDate($originalDate);
            $extemp->setNewDate($newDate);
            $extemp->setMotive($motive);
            $extemp->setStudentId($id);
            $extemp->setCourseCode($courseCode);
            $extemp->setCourseName($courseName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($extemp);
            $em->flush();

            return $this->redirect(
                $this->generateUrl('portfolio_control_academic_extemporaneous', array('id' => $id))
            );
        }

        return $this->render('PortfolioCoreBundle:Academic:extemporaneous.html.twig', array(
            'id' => $id,
            'extemporaneous' => $extemporaneous,
            'error' => $error
        ));
    }
}
