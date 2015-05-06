<?php

namespace Portfolio\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function dashboardAction()
    {
        
        return $this->render('PortfolioCoreBundle:Dashboard:dashboard.html.twig');
    }
}
