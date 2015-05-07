<?php

namespace Portfolio\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SocialServiceController extends Controller
{
    public function listAction($id)
    {
        /* @var \Doctrine\ORM\EntityRepository $repository */
        $repository = $this->getDoctrine()->getRepository('Portfolio\CoreBundle\Entity\SocialService');
        $socialServices = $repository->findBy(array(
            'studentId' => $id
        ));

        $sum = 0;
        $ssp = 0;
        $ssc = 0;
        if ($socialServices) {
            /** @var \Portfolio\Corebundle\Entity\SocialService $result */
            foreach($socialServices as $result) {
                $sum = $sum + $result->getAccreditedHours();
                if ($result->getType() == 'SSC') {
                    $ssc = $ssc + $result->getAccreditedHours();
                } else {
                    $ssp = $ssp + $result->getAccreditedHours();
                }
            }
        }


        return $this->render('PortfolioCoreBundle:SocialService:list.html.twig', array(
            'id' => $id,
            'socialServices' => $socialServices,
            'ssc' => $ssc,
            'ssp' => $ssp,
            'sum' => $sum
        ));
    }
}
