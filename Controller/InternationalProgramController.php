<?php

namespace Portfolio\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InternationalProgramController extends Controller
{
    public function listAction($id)
    {
        /* @var \Doctrine\ORM\EntityRepository $repository */
        $repository = $this->getDoctrine()->getRepository('Portfolio\CoreBundle\Entity\InternationalProgram');
        $internationalsPrograms = $repository->findBy(array(
            'studentId' => $id
        ));

        return $this->render('PortfolioCoreBundle:InternationalProgram:list.html.twig', array(
            'id' => $id,
            'internationalsPrograms' => $internationalsPrograms
        ));
    }
}
