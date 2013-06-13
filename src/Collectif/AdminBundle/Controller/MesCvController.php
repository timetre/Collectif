<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

use Collectif\AdminBundle\Form\MonCvForm;
use Collectif\UserBundle\Entity\User;
use Collectif\AdminBundle\Entity\MonCv;

class MesCvController extends Controller
{
	public function listAction($tabNum = 1)
    {
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	
    	return $this->render('CollectifAdminBundle:MesCv:view.html.twig', array(
    			'user' => $user
    	));
    }
    
    public function editAction($monCvId = null)
    {
    	$message='';
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	$em = $this->getDoctrine()->getManager();
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:MonCv');
    
    	if (isset($monCvId))
    	{
    		$cv = $repository->find($monCvId);
    
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
    
    			if (isset($id))
    			{
    				$message='CV modifié avec succès !';
    			}
    			else
    			{
    				$message='CV ajouté avec succès !';
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
    
}
