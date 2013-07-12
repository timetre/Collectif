<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Collectif\UserBundle\Entity\User;

class WebServiceController extends Controller
{
    public function positioningAction() {
        $repository = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User');
        $users = $repository->getAll();
       
        $results = array();

        foreach ($users as $user) {
        	if($user->getLieu() !== null) {
	        	$results[] = array("id" => $user->getId(),
	                             "longitude" => $user->getLongitude(),
	                             "latitude" => $user->getLatitude(),
	        					 "ville" => $user->getLieu()
	        			); 
        	}
        }
        
		$response = new Response();
		$response->setStatusCode(200);
		$response->headers->set('Content-Type', 'application/json');
		$response->headers->set('Access-Control-Allow-Origin', '*');
		$response->setContent(json_encode($results));

		return $response;

    }
}
