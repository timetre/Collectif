<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Finder\Finder;

class AdminController extends Controller
{
    public function generateRobotAction()
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User');
    	$disabled = $repository->getDisabledUsersSize();
    	
    	
    	
    	return $this->render('CollectifAdminBundle:Admin:index.html.twig', array(
    		'disabled' => $disabled,
			'articles' => $articles,
            'offres'   => $offres,
            'accueil'  => $parametres->getTexteAccueil()
        ));
    }

}
