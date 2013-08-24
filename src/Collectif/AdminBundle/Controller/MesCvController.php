<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

use Collectif\AdminBundle\Form\MonCvForm;
use Collectif\UserBundle\Entity\User;
use Collectif\LoggerBundle\Entity\Logger;
use Collectif\AdminBundle\Entity\MonCv;

class MesCvController extends Controller
{
	public function editAction($tabNum = 1)
    {
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	
    	return $this->render('CollectifAdminBundle:MesCv:view.html.twig', array(
    			'user' => $user
    	));
    }
    
    public function listAction($monCvId = null)
    {
    	$message='';
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	$em = $this->getDoctrine()->getManager();
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:MonCv');
    	$cvList = $repository->getCvFR($user->getId());
    	if(sizeof($cvList) > 0) {
    		$monCvId = $cvList[0]->getId();
    	}
    	if (isset($monCvId))
    	{
    		$cv = $repository->find($monCvId);
    		$cv->setDateCreation(new \Datetime());
    
    		if (!$cv)
    		{
    			$message='Aucun CV trouvé';
    		}
    	}
    	else
    	{
    		$cv = new MonCv();
    		$cv->setMembre($user);
    	}
    
    	$form = $this->container->get('form.factory')->create(new MonCvForm(), $cv);
    	$request = $this->container->get('request');
    
    	if ($request->getMethod() == 'POST')
    	{
    		$form->bindRequest($request);
    
    		if ($form->isValid())
    		{
    			$em->persist($cv);
    
    			$em->flush();
    
    			if (isset($monCvId))
    			{
                    $loggerService = $this->container->get('collectif_logger.log');
                    $user = $this->container->get('security.context')->getToken()->getUser();
                    $loggerService->logAction($em, $user, "Modification du CV");
    			}
    			else
    			{
                    $loggerService = $this->container->get('collectif_logger.log');
                    $user = $this->container->get('security.context')->getToken()->getUser();
                    $loggerService->logAction($em, $user, "Ajout du CV");
    			}
    
    			return new RedirectResponse($this->container->get('router')->generate('collectif_mescv_list'));
    		}
    	}
    	
    	return $this->render('CollectifAdminBundle:MesCv:edit.html.twig', array(
    			'form' => $form->createView(),
    			'cv'   => $cv,
    			'message' => $message,
    	));
    }
    
    public function deleteAction($monCvId)
    {
    	$em = $this->getDoctrine()->getManager();
    	$cv = $em->find('CollectifAdminBundle:MonCv', $monCvId);
    	 
    	if (!$cv)
    	{
    		throw $this->createNotFoundException('CV[id='.$monCvId.'] inexistant.');
    	}
    	 
    	$em->remove($cv);
    	$em->flush();
    	 
    	 
    	return new RedirectResponse($this->container->get('router')->generate('collectif_mescv_list'));
    }
	
	private function logAction($message = "") {
		$logger = new Logger();
		$user = $this->container->get('security.context')->getToken()->getUser();
		$logger->setDescription($message);
		$logger->setMembre($user);
		
		$em = $this->getDoctrine()->getManager();
		$em->persist($logger);
		$em->flush();
	}
        
}
