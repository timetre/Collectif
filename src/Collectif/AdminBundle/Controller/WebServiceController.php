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
        $users = $repository->findAll();
        $response = new Response();

        $results = array();

        foreach ($users as $user) {
        	$results[] = $user->getLatitude().", ".$user->getLongitude();
        }

        
		$response->setContent(json_encode(array(
		    //'positions' => $results,
		    'data' => 123
		)));

		$response->headers->set('Content-Type', 'application/json');

		return $response;

    }
}
