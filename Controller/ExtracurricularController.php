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
        $representativeTeams = $repository->findBy(array(
            'studentId' => $id
        ));

        return $this->render('PortfolioCoreBundle:Extracurricular:representative.html.twig', array(
            'id' => $id,
            'representativeTeams' => $representativeTeams
        ));
    }

    public function culturalAction($id)
    {
        /* @var \Doctrine\ORM\EntityRepository $repository */
        $repository = $this->getDoctrine()->getRepository('Portfolio\CoreBundle\Entity\CulturalDiffusion');
        $culturalDiffusions = $repository->findBy(array(
            'studentId' => $id
        ));

        return $this->render('PortfolioCoreBundle:Extracurricular:cultural.html.twig', array(
            'id' => $id,
            'culturalDiffusions' => $culturalDiffusions
        ));
    }

    public function groupsAction($id)
    {
        /* @var \Doctrine\ORM\EntityRepository $repository */
        $repository = $this->getDoctrine()->getRepository('Portfolio\CoreBundle\Entity\StudentGroup');
        $studentGroups = $repository->findBy(array(
            'studentId' => $id
        ));

        return $this->render('PortfolioCoreBundle:Extracurricular:groups.html.twig', array(
            'id' => $id,
            'studentGroups' => $studentGroups
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
