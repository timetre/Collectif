<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

use Collectif\AdminBundle\Form\ExperienceForm;
use Collectif\AdminBundle\Form\CompetenceForm;
use Collectif\AdminBundle\Form\MembreContactForm;
use Collectif\AdminBundle\Form\MembreCompteForm;
use Collectif\AdminBundle\Form\InteretForm;
use Collectif\UserBundle\Entity\User;
use Collectif\AdminBundle\Entity\Experience;
use Collectif\AdminBundle\Entity\Competence;
use Collectif\AdminBundle\Entity\Interet;
use Collectif\AdminBundle\Entity\Formation;
use Collectif\LoggerBundle\Entity\Logger;

class CvController extends Controller
{
	public function listAction($tabNum = 1)
    {
    	$tabNum = $this->container->get('request')->getSession()->get('tabNum');

    	if($tabNum === null) {
    		$tabNum = 1;
    		$this->container->get('request')->getSession()->set('tabNum', $tabNum);
    	}
    	
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	
    	return $this->render('CollectifAdminBundle:Cv:view.html.twig', array(
    			'user' => $user
    	));
    }
	
	public function editExperienceAction($experienceId = null)
    {
    	$this->container->get('request')->getSession()->set('tabNum', 1);
    	$message='';
    	$user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Experience');

        if (isset($experienceId)) 
        {
            $experience = $repository->find($experienceId);
            
            if (!$experience)
            {
                $message='Aucune expérience trouvée';
            }
        }
        else 
        {
	 		$experience = new Experience();
    		$experience->setMembre($user);
        }

        $form = $this->container->get('form.factory')->create(new ExperienceForm(), $experience);
        $request = $this->container->get('request');

        if ($request->getMethod() == 'POST') 
        {
            $form->bindRequest($request);
            
            if ($form->isValid()) 
            {
                
                $em->persist($experience);
                
                $em->flush();
                
                if (isset($id)) 
                {
                     $message='Expérience modifiée avec succès !';
                }
                else 
                {
                    $message='Expérience ajoutée avec succès !';
                }
                
                return new RedirectResponse($this->container->get('router')->generate('collectif_cv_list'));
            }
        }
    
    	return $this->render('CollectifAdminBundle:Cv:editExperience.html.twig', array(
    			'form' => $form->createView(),
    			'message' => $message,
    	));
    }
	
    public function editCompetenceAction($competenceId = null)
    {
    	$this->container->get('request')->getSession()->set('tabNum', 2);
    	$message='';
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	$em = $this->getDoctrine()->getManager();
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Competence');
    
    	if (isset($competenceId))
    	{
    		$competence = $repository->find($competenceId);
    
    		if (!$competence)
    		{
    			$message='Aucune expérience trouvée';
    		}
    	}
    	else
    	{
    		$competence = new Competence();
    		$competence->setMembre($user);
    	}
    
    	$form = $this->container->get('form.factory')->create(new CompetenceForm(), $competence);
    	$request = $this->container->get('request');
    
    	if ($request->getMethod() == 'POST')
    	{
    		$form->bindRequest($request);
    
    		if ($form->isValid())
    		{
    
    			$em->persist($competence);
    
    			$em->flush();
    
    			if (isset($id))
    			{
    				$message='Compétence modifiée avec succès !';
    			}
    			else
    			{
    				$message='Compétence ajoutée avec succès !';
    			}
    
    			return new RedirectResponse($this->container->get('router')->generate('collectif_cv_list'));
    		}
    	}
    
    	return $this->render('CollectifAdminBundle:Cv:editCompetence.html.twig', array(
    			'form' => $form->createView(),
    			'message' => $message,
    	));
    }

    public function editFormationAction($formationId = null)
    {
    	$this->container->get('request')->getSession()->set('tabNum', 3);
    	$message='';
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	$em = $this->getDoctrine()->getManager();
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Formation');
    
    	if (isset($formationId))
    	{
    		$formation = $repository->find($formationId);
    
    		if (!$formation)
    		{
    			$message='Aucune formation trouvée';
    		}
    	}
    	else
    	{
    		$formation = new Formation();
    		$formation->setMembre($user);
    	}
    
    	$form = $this->container->get('form.factory')->create(new FormationForm(), $formation);
    	$request = $this->container->get('request');
    
    	if ($request->getMethod() == 'POST')
    	{
    		$form->bindRequest($request);
    
    		if ($form->isValid())
    		{
    
    			$em->persist($formation);
    
    			$em->flush();
    
    			if (isset($id))
    			{
    				$message='Formation modifiée avec succès !';
    			}
    			else
    			{
    				$message='Formation ajoutée avec succès !';
    			}
    
    			return new RedirectResponse($this->container->get('router')->generate('collectif_cv_list'));
    		}
    	}
    
    	return $this->render('CollectifAdminBundle:Cv:editFormation.html.twig', array(
    			'form' => $form->createView(),
    			'message' => $message,
    	));
    }
    
	public function editContactAction()
    {
    	$this->container->get('request')->getSession()->set('tabNum', 2);
    	$message='';
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	$em = $this->getDoctrine()->getManager();
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User');
    
    	$form = $this->container->get('form.factory')->create(new MembreContactForm(), $user);
    	$request = $this->container->get('request');
    
    	if ($request->getMethod() == 'POST')
    	{
    		$form->bindRequest($request);
    
    		if ($form->isValid())
    		{
    
    			$em->persist($user);
    
    			$em->flush();

                $loggerService = $this->container->get('collectif_logger.log');
                $user = $this->container->get('security.context')->getToken()->getUser();
                $loggerService->logAction($em, $user, "Modification des activités numériques");
    
    			return new RedirectResponse($this->container->get('router')->generate('collectif_cv_list'));
    		}
    	}
    
    	return $this->render('CollectifAdminBundle:Cv:edit.html.twig', array(
    			'form' => $form->createView(),
    			'message' => $message,
    			'membre' => $user
    	));
    }
    
    public function editCompteAction()
    {
    	$this->container->get('request')->getSession()->set('tabNum', 3);
    	$message='';
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	$em = $this->getDoctrine()->getManager();
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User');
    
    	$form = $this->container->get('form.factory')->create(new MembreCompteForm(), $user);
    	$request = $this->container->get('request');
    
    	if ($request->getMethod() == 'POST')
    	{
            $user->setDateCreation(new \Datetime());
    		$form->bindRequest($request);
    
    		if ($form->isValid())
    		{
    
    			$em->persist($user);
    
    			$em->flush();

                $loggerService = $this->container->get('collectif_logger.log');
                $user = $this->container->get('security.context')->getToken()->getUser();
                $loggerService->logAction($em, $user, "Modification des infos du compte");
    
    			return new RedirectResponse($this->container->get('router')->generate('collectif_cv_list'));
    		}
    	}
    
    	return $this->render('CollectifAdminBundle:Cv:edit-compte.html.twig', array(
    			'form' => $form->createView(),
    			'message' => $message,
    			'membre' => $user
    	));
    }
    
    public function editInteretAction($interetId = null)
    {
    	$this->container->get('request')->getSession()->set('tabNum', 1);
    	$message='';
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	$em = $this->getDoctrine()->getManager();
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Interet');
    
    	if (isset($interetId))
    	{
    		$interet = $repository->find($interetId);
    
    		if (!$interet)
    		{
    			$message="Aucun centre d'intérêt trouvé";
    		}
    	}
    	else
    	{
    		$interet = new Interet();
    		$interet->setMembre($user);
    	}
    
    	$form = $this->container->get('form.factory')->create(new InteretForm(), $interet);
    	$request = $this->container->get('request');
    
    	if ($request->getMethod() == 'POST')
    	{
    		$form->bindRequest($request);
    
    		if ($form->isValid())
    		{
    
    			$em->persist($interet);
    
    			$em->flush();
    
    			if (isset($interetId))
    			{
    				$message='Interêt modifiée avec succès !';
                    $loggerService = $this->container->get('collectif_logger.log');
                    $user = $this->container->get('security.context')->getToken()->getUser();
                    $loggerService->logAction($em, $user, "Modification de l'objet de recherche n° " . $interetId);
    			}
    			else
    			{
    				$message='Interêt ajoutée avec succès !';
                    $loggerService = $this->container->get('collectif_logger.log');
                    $user = $this->container->get('security.context')->getToken()->getUser();
                    $loggerService->logAction($em, $user, "Ajout d'un objet de recherche");
    			}
    
    			return new RedirectResponse($this->container->get('router')->generate('collectif_cv_list'));
    		}
    	}
    
    	return $this->render('CollectifAdminBundle:Cv:editInteret.html.twig', array(
    			'form' => $form->createView(),
    			'message' => $message,
    	));
    }
    
	public function deleteExperienceAction($experienceId)
    {
    	$em = $this->getDoctrine()->getManager();
    	$experience = $em->find('CollectifAdminBundle:Experience', $experienceId);
    	
    	if (!$experience)
    	{
    		throw $this->createNotFoundException('Experience[id='.$experienceId.'] inexistante.');
    	}
    	
    	$em->remove($experience);
    	$em->flush();
    	
    	
    	return new RedirectResponse($this->container->get('router')->generate('collectif_cv_list'));
    }
    
    public function deleteCompetenceAction($competenceId)
    {
    	$em = $this->getDoctrine()->getManager();
    	$comp = $em->find('CollectifAdminBundle:Competence', $competenceId);
    	 
    	if (!$comp)
    	{
    		throw $this->createNotFoundException('Compétence[id='.$competenceId.'] inexistante.');
    	}
    	 
    	$em->remove($comp);
    	$em->flush();
    	 
    	 
    	return new RedirectResponse($this->container->get('router')->generate('collectif_cv_list'));
    }
    
    public function deleteFormationAction($formationId)
    {
    	$em = $this->getDoctrine()->getManager();
    	$formation = $em->find('CollectifAdminBundle:Formation', $formationId);
    	 
    	if (!$formation)
    	{
    		throw $this->createNotFoundException('Formation [id='.$formationId.'] inexistante.');
    	}
    	 
    	$em->remove($formation);
    	$em->flush();
    	 
    	 
    	return new RedirectResponse($this->container->get('router')->generate('collectif_cv_list'));
    }
    
    public function deleteInteretAction($interetId)
    {
    	$this->container->get('request')->getSession()->set('tabNum', 1);
    	$em = $this->getDoctrine()->getManager();
    	$interet = $em->find('CollectifAdminBundle:Interet', $interetId);
    	 
    	if (!$interet)
    	{
    		throw $this->createNotFoundException('Centre dintérêt[id='.$interetId.'] inexistant.');
    	}
    	 
    	$em->remove($interet);
    	$em->flush();
		
		$loggerService = $this->container->get('collectif_logger.log');
        $user = $this->container->get('security.context')->getToken()->getUser();
        $loggerService->logAction($em, $user, "Suppression d'un objet de recherche");
    	 
    	 
    	return new RedirectResponse($this->container->get('router')->generate('collectif_cv_list'));
    }    
}
