<?php

namespace Portfolio\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{
    public function searchAction(Request $request)
    {
        $error = null;
        if($request->isMethod('post')) {
            $id = $request->request->get('id');

            /* @var \Doctrine\ORM\EntityRepository $repository */
            $repository = $this->getDoctrine()->getRepository('Portfolio\CoreBundle\Entity\Student');

            /** @var \Portfolio\CoreBundle\Entity\Student $student */
            $student = $repository->find($id);

            if (!$student) {
                $error = "No se encontró ningun alumno con esa matrícula";
            }

            if (!$error) {
                return $this->redirect(
                    $this->generateUrl('portfolio_control_academic_history', array('id' => $id))
                );
            }

        }
        return $this->render('PortfolioCoreBundle:Search:search.html.twig', array(
            'error' => $error
        ));
    }
}
