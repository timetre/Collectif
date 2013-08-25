<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Collectif\UserBundle\Entity\User;

use Collectif\AdminBundle\Form\MembreForm;
use Collectif\AdminBundle\Form\MembreFormAdd;
use Collectif\AdminBundle\Form\MembrePageForm;
use Collectif\AdminBundle\Form\MembreRegisterForm;
use Collectif\AdminBundle\Controller\MembreController;
use Collectif\AdminBundle\Entity\Candidature;
use Collectif\LoggerBundle\Entity\Logger;

class MembreController extends Controller {
    
    public function indexAction() {
        return $this->render('CollectifAdminBundle:Membre:index.html.twig', array('nom' => 'test'));
    }
    
    public function listAction()
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User');

    	$membres = $repository->getAll();
    	
    	
        return $this->render('CollectifAdminBundle:Membre:view.html.twig', array(
            'membres' => $membres
        ));
    }
    
    public function detailAction($id)
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User');
    	
    	$membre = $repository->find($id);
    	
    	if($membre === null)
    	{
    		throw $this->createNotFoundException('Membre[id='.$id.'] inexistant.');
    	}
    	
    	return $this->render('CollectifAdminBundle:Membre:detail.html.twig', array(
    			'membre' => $membre
    	));
    }
    
	public function editAction($id = null)
    {
    	
    	$message='';
    	$titre="Ajouter un membre";
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User');

        if (isset($id)) 
        {
            $membre = $repository->find($id);
            $membre->setDateModification(new \DateTime());
            
            if (!$membre)
            {
                $message='Aucun membre trouvé';
            }
			$form = $this->container->get('form.factory')->create(new MembreForm(), $membre);
        }
        else 
        {
	 		$membre = new User();
	 		$membre->setDateModification(new \DateTime());
	 		$membre->setEnabled(true);
    		$form = $this->container->get('form.factory')->create(new MembreFormAdd(), $membre);
        }

        $request = $this->container->get('request');

        if ($request->getMethod() == 'POST') 
        {
            $form->bindRequest($request);
            
            if ($form->isValid()) 
            {
                
                $em->persist($membre);
                
                $em->flush();
                
                if (isset($id)) 
                {
                     $message='Membre modifié avec succès !';
                }
                else 
                {
                    $message='Membre ajouté avec succès !';
                }
                
                return new RedirectResponse($this->container->get('router')->generate('collectif_membre_homepage'));
            }
        }

    	return $this->render('CollectifAdminBundle:Membre:edit.html.twig', array(
    		'form' => $form->createView(),
            'message' => $message,
			'membre' => $membre, 
    		'titre'  => $titre	
    	));
    }
    
    public function editAdminAction($id = null)
    {
    	 
    	$message='';
    	$titre="Ajouter un administrateur";
    	$em = $this->getDoctrine()->getManager();
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User');
    
    	if (isset($id))
    	{
    		$membre = $repository->find($id);
    		$membre->setDateModification(new \DateTime());
    
    		if (!$membre)
    		{
    			$message='Aucun membre trouv�';
    		}
    		$form = $this->container->get('form.factory')->create(new MembreForm(), $membre);
    	}
    	else
    	{
    		$membre = new User();
    		$membre->setDateModification(new \DateTime());
    		$membre->addRole("ROLE_SUPER_ADMIN");
    		$membre->setEnabled(true);
    		$form = $this->container->get('form.factory')->create(new MembreFormAdd(), $membre);
    	}
    
    	$request = $this->container->get('request');
    
    	if ($request->getMethod() == 'POST')
    	{
    		$form->bindRequest($request);
    
    		if ($form->isValid())
    		{
    
    			$em->persist($membre);
    
    			$em->flush();
    
    			if (isset($id))
    			{
    				$message='Membre modifi� avec succ�s !';
    			}
    			else
    			{
    				$message='Membre ajout� avec succ�s !';
    			}
    
    			return new RedirectResponse($this->container->get('router')->generate('collectif_membre_homepage'));
    		}
    	}
    
    	return $this->render('CollectifAdminBundle:Membre:edit.html.twig', array(
    			'form' => $form->createView(),
    			'message' => $message,
    			'membre' => $membre, 
    			'titre'  => $titre	
    	));
    }
    
	public function editPageAction($id)
    {
    	$message='';
    	$em = $this->getDoctrine()->getManager();
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User');
    
    	if (isset($id))
    	{
    		$membre = $repository->find($id);
    		$membre->setDateModification(new \DateTime());
    
    		if (!$membre)
    		{
    			$message='Aucun membre trouv�';
    		}
    		$form = $this->container->get('form.factory')->create(new MembrePageForm(), $membre);
    	}
    	else
    	{
    		$membre = new User();
    		$membre->setDateModification(new \DateTime());
    		$membre->addRole("ROLE_SUPER_ADMIN");
    		$membre->setEnabled(true);
    		$form = $this->container->get('form.factory')->create(new MembreFormAdd(), $membre);
    	}
    
    	$request = $this->container->get('request');
    
    	if ($request->getMethod() == 'POST')
    	{
    		$form->bindRequest($request);
    
    		if ($form->isValid())
    		{
    
    			$em->persist($membre);
    
    			$em->flush();

                $loggerService = $this->container->get('collectif_logger.log');
                $user = $this->container->get('security.context')->getToken()->getUser();
                $loggerService->logAction($em, $user, "Modification de la présentation");
    
    			if (isset($id))
    			{
    				$message='Membre modifi� avec succ�s !';
    			}
    			else
    			{
    				$message='Membre ajout� avec succ�s !';
    			}
    
    			return new RedirectResponse($this->container->get('router')->generate('collectif_membre_edit_page', array('id' => $id)));
    		}
    	}
    
    	return $this->render('CollectifAdminBundle:Membre:editPage.html.twig', array(
    			'form' => $form->createView(),
    			'message' => $message,
    			'membre' => $membre 
    	));
    }
    
    public function showPageAction($id)
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User');
    	
    	$membre = $repository->find($id);
    	
    	if($membre === null)
    	{
    		throw $this->createNotFoundException('Membre[id='.$id.'] inexistant.');
    	}
    	
    	return $this->render('CollectifAdminBundle:Membre:detail.html.twig', array(
    			'user' => $membre
    	));
    }
    
    public function deleteAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$membre = $em->find('CollectifUserBundle:User', $id);
    	
    	if (!$membre)
    	{
    		throw $this->createNotFoundException('Membre[id='.$id.'] inexistant.');
    	}
    	
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Candidature');
    	$candi = $repository->getByUser($id);
    	
    	if($candi !== null) {
    		$em->remove($candi);
	    	$em->flush();
    	} else {
    		$em->remove($membre);
    		$em->flush();
    	}

    	 return new RedirectResponse($this->container->get('router')->generate('collectif_membre_homepage'));
    }
    
}
