<?php

namespace Portfolio\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ExtracurricularController extends Controller
{
    public function sportAction($id)
    {
        /* @var \Doctrine\ORM\EntityRepository $repository */
        $repository = $this->getDoctrine()->getRepository('Portfolio\CoreBundle\Entity\Sport');
        $sports = $repository->findBy(array(
            'studentId' => $id
        ));

        return $this->render('PortfolioCoreBundle:Extracurricular:sport.html.twig', array(
            'id' => $id,
            'sports' => $sports
        ));
    }

    public function representativeAction($id)
    {
        /* @var \Doctrine\ORM\EntityRepository $repository */
        $repository = $this->getDoctrine()->getRepository('Portfolio\CoreBundle\Entity\RepresentativeTeam');
        $representativeTeam = $repository->findBy(array(
            'studentId' => $id
        ));

        return $this->render('PortfolioCoreBundle:Extracurricular:representative.html.twig', array(
            'id' => $id,
            'representativeTeam' => $representativeTeam
        ));
    }

    public function culturalAction($id)
    {
        /* @var \Doctrine\ORM\EntityRepository $repository */
        $repository = $this->getDoctrine()->getRepository('Portfolio\CoreBundle\Entity\CulturalDiffusion');
        $culturalDiffusion = $repository->findBy(array(
            'studentId' => $id
        ));

        return $this->render('PortfolioCoreBundle:Extracurricular:cultural.html.twig', array(
            'id' => $id,
            'culturalDiffusion' => $culturalDiffusion
        ));
    }

    public function groupsAction($id)
    {
        /* @var \Doctrine\ORM\EntityRepository $repository */
        $repository = $this->getDoctrine()->getRepository('Portfolio\CoreBundle\Entity\StudentGroup');
        $studentGroup = $repository->findBy(array(
            'studentId' => $id
        ));

        return $this->render('PortfolioCoreBundle:Extracurricular:groups.html.twig', array(
            'id' => $id,
            'studentGroup' => $studentGroup
        ));
    }

    public function catAction($id)
    {
        /* @var \Doctrine\ORM\EntityRepository $repository */
        $repository = $this->getDoctrine()->getRepository('Portfolio\CoreBundle\Entity\AddictionAwareness');
        $cat = $repository->findBy(array(
            'studentId' => $id
        ));

        return $this->render('PortfolioCoreBundle:Extracurricular:cat.html.twig', array(
            'id' => $id,
            'cat' => $cat
        ));
    }
}
