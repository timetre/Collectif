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
    	$statsJour = $repository->getStatisticsDay($user);
    	$statsSemaine = $repository->getStatisticsWeek($user);
    	$statsMois = $repository->getStatisticsMonth($user);
    	$statsAnnee = $repository->getStatisticsYear($user);
    	$statsActif = $repository->getStatisticsActive($user);
    	
   	
        return $this->render('CollectifStatisticsBundle:Statistics:index.html.twig', 
        		array(
        			'stat' => $stats,
        			'jour' => $statsJour,
        			'mois' => $statsMois,
        			'annee' => $statsAnnee,
        			'semaine' => $statsSemaine,
        			'active' => $statsActif
        				
        		)
        );
    }
    
}
