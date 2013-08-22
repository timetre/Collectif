<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User');
    	$disabled = $repository->getDisabledUsersSize();
    	
    	$alertUsers;
    	
    	return $this->render('CollectifAdminBundle:Admin:index.html.twig', array(
    		'disabled' => $disabled
        ));
    }
	
	public function mailBugAction()
    {
    	$request = $this->container->get('request');
    	
    	if ($request->getMethod() == 'POST')
    	{
    		$navigateur = $request->request->get('inputBrowser');
    		$mail = $request->request->get('inputEmail');
    		$page = $request->request->get('inputPage');
    		$desc = $request->request->get('inputDesc');

    		/*$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Parameters');
    		$parametres = $repository->getParameters();*/
    		$to = "webmaster@collectif-confluence.fr";

            $messageBody = "<div>Navigateur : ".$navigateur."</div>";
			$messageBody .= "<div>Page : ".$page."</div>";
			$messageBody .= "<div>Description : ".$desc."</div>";
    		
    		$send = \Swift_Message::newInstance()
    			->setSubject("bug found")
    			->setFrom($mail)
    			->setTo($to)
                ->setBody($messageBody, 'text/html')
    		;
    		$this->get('mailer')->send($send);

    		return $this->render('CollectifAdminBundle:Bug:index.html.twig');
    	}
    }
	
	public function activiteAction()
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User');
    	$users = $repository->getUsersLastLoggedIn();
    	
    	return $this->render('CollectifAdminBundle:Admin:activite.html.twig', array(
    		'users' => $users
        ));
    }
}
