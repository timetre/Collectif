<?php

namespace Collectif\StatisticsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StatisticsController extends Controller
{
    public function indexAction()
    {
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifStatisticsBundle:Statistic');
    	$stats = $repository->getStatistics($user);
    	$statsUniques = $repository->getUniqueStatistics($user);
    	

    	//$stat = $user->getStatistics();
    	

    	
    	
    	
        return $this->render('CollectifAdminBundle:Statistics:index.html.twig', 
        		array(
        			'stat' => $stats,
        			'unique' => $statsUniques
        		)
        );
    }
    
}
