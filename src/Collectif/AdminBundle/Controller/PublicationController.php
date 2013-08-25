<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Collectif\AdminBundle\Entity\Publication;
use Collectif\LoggerBundle\Entity\Logger;
use Collectif\AdminBundle\Form\PublicationForm;
use Collectif\AdminBundle\Form\PublicationOwnForm;
use Collectif\UserBundle\Entity\User;

class PublicationController extends Controller
{
	public function listAction($id = null)
    {
    	$em = $this->getDoctrine()->getManager();
    	if($id==null) {
    		$publications = $em->getRepository('CollectifAdminBundle:Publication')->findAll();
    		
    		return $this->render('CollectifAdminBundle:Publication:view.html.twig', array(
    				'publications' => $publications,
    				'id' => $id
    		));
    		
    	} else {
    		$repository = $em->getRepository('CollectifUserBundle:User');
    		$user = new User();
    		$user = $repository->find($id);
    		$publications = $user->getPublications();
    		
    		
    		return $this->render('CollectifAdminBundle:Publication:viewOwn.html.twig', array(
    				'publications' => $publications,
    				'id' => $id
    		));
    	}
    }
	
	public function detailAction($id)
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Publication');
    	
    	$publication = $repository->find($id);
    	
    	if($publication === null)
    	{
    		throw $this->createNotFoundException('Publication[id='.$id.'] inexistante.');
    	}
    	
    	return $this->render('CollectifAdminBundle:Publication:detail.html.twig', array(
    			'publication' => $publication
    	));
    }
	
	public function editAction($id = null)
    {
    	
    	$message='';
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Publication');

        if (isset($id)) 
        {
            $publication = $repository->find($id);
            $date = new \Datetime();
            $publication->setDateModification($date);
            
            if (!$publication)
            {
                $message='Aucune publication trouv�e';
            }
        }
        else 
        {
	 		$publication = new Publication();
			$publication->setDateModification(new \Datetime());
    		$publication->setActif(true);
        }

        $form = $this->container->get('form.factory')->create(new PublicationForm(), $publication);

        $request = $this->container->get('request');

        if ($request->getMethod() == 'POST') 
        {
            $form->bindRequest($request);
            
            if ($form->isValid()) 
            {
                
                $em->persist($publication);
                
                $em->flush();
                
                if (isset($id)) 
                {
                     $message='Publication modifi� avec succ�s !';
                }
                else 
                {
                    $message='Publication ajout� avec succ�s !';
                }
                
                return new RedirectResponse($this->container->get('router')->generate('collectif_publication_homepage'));
            }
        }

    	return $this->render('CollectifAdminBundle:Publication:edit.html.twig', array(
    		'form' => $form->createView(),
            'message' => $message,
    	));
    }
    
    public function editOwnAction($pubId = null)
    {
    	 
    	$message='';
    	$user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Publication');

        if (isset($pubId)) 
        {
            $publication = $repository->find($pubId);
            $date = new \Datetime();
            $publication->setDateModification($date);
            
            if (!$publication)
            {
                $message='Aucune publication trouv�e';
            }
        }
        else 
        {
	 		$publication = new Publication();
			$publication->setDateModification(new \Datetime());
    		$publication->setActif(true);
    		$publication->setMembre($user);
        }

        $form = $this->container->get('form.factory')->create(new PublicationOwnForm(), $publication);

        $request = $this->container->get('request');

        if ($request->getMethod() == 'POST') 
        {
            $form->bindRequest($request);
            
            if ($form->isValid()) 
            {
                
                $em->persist($publication);
                $em->flush();

                if (isset($pubId)) 
                {
                     $message='Publication modifi� avec succ�s !';
                     $loggerService = $this->container->get('collectif_logger.log');
                     $user = $this->container->get('security.context')->getToken()->getUser();
                     $loggerService->logAction($em, $user, "Edition de la publication n° " . $pubId);
                }
                else 
                {
                    $message='Publication ajout�e avec succ�s !';
                    $loggerService = $this->container->get('collectif_logger.log');
                    $user = $this->container->get('security.context')->getToken()->getUser();
                    $loggerService->logAction($em, $user, "Création d'une publication");
                }
                
                return new RedirectResponse($this->container->get('router')->generate('collectif_publication_list_own', array('id' => $user->getId())));
            }
        }
    
    	return $this->render('CollectifAdminBundle:Publication:edit.html.twig', array(
    			'form' => $form->createView(),
    			'message' => $message,
    	));
    }
	
	public function deleteAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$publication = $em->find('CollectifAdminBundle:Publication', $id);
    	
    	if (!$publication)
    	{
    		throw $this->createNotFoundException('Publication[id='.$id.'] inexistante.');
    	}
    	
    	$em->remove($publication);
    	$em->flush();
    	
    	
    	 return new RedirectResponse($this->container->get('router')->generate('collectif_publication_homepage'));
    }
    
    public function deleteOwnAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$publication = $em->find('CollectifAdminBundle:Publication', $id);
    	 
    	if (!$publication)
    	{
    		throw $this->createNotFoundException('Publication[id='.$id.'] inexistante.');
    	}
    	 
    	$em->remove($publication);
    	$em->flush();
		
        $loggerService = $this->container->get('collectif_logger.log');
        $user = $this->container->get('security.context')->getToken()->getUser();
        $loggerService->logAction($em, $user, "Suppression d'une publication");
    	 
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	return new RedirectResponse($this->container->get('router')->generate('collectif_publication_list_own', array('id' => $user->getId())));
    }
}
