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

        $sql = <<<ENDSQL
SELECT
	SUM(ss.accreditedHours) as hours,
	ss.type
FROM SocialServices as ss
WHERE
ss.studentId = :studentId
GROUP BY DATE(ss.type)
ENDSQL;

        /* @var \Doctrine\ORM\EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->bindValue('studentId', $id);
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $this->render('PortfolioCoreBundle:Academic:score.html.twig', array(
            'id' => $id,
            'socialServices' => $socialServices,
            'results' => $results
        ));
    }
}
