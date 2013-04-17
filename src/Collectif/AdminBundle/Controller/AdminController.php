<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Forum');
    	$forums = $repository->findAll();
    	
    	return $this->render('CollectifAdminBundle:Admin:index.html.twig', array(
            'forums' => $forums
        ));
    }
}
