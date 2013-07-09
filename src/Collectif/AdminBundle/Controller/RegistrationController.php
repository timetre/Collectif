<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Collectif\UserBundle\Entity\User;

use Collectif\AdminBundle\Form\FirstStepForm;
use Collectif\AdminBundle\Form\SecondStepForm;
use Collectif\AdminBundle\Form\ThirdStepForm;
use Collectif\AdminBundle\Form\FourthStepForm;
use Collectif\AdminBundle\Controller\MembreController;
use Collectif\AdminBundle\Entity\Candidature;
use Collectif\AdminBundle\Entity\MonCv;



class RegistrationController extends Controller
{
	public function firstStepAction()
	{
		$message='';
		$titre="Inscription";
		$em = $this->getDoctrine()->getManager();
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User');
	
		$membre = new User();
		$membre->setEnabled(false);
		$membre->addRole("ROLE_ADMIN");
		$membre->setDateModification(new \DateTime());
			
		$form = $this->container->get('form.factory')->create(new FirstStepForm(), $membre);
		 
		$request = $this->container->get('request');
	
		if ($request->getMethod() == 'POST')
		{
			$form->bindRequest($request);
	
			if ($form->isValid())
			{
				$em->persist($membre);
				$candidature = new Candidature();
				$candidature->setMembre($membre);
				$em->persist($candidature);
	
				$em->flush();
	
				return $this->redirect($this->generateUrl('collectif_membre_register_step2', array('userId' => $membre->getId())));
			}
		} else {
	
			return $this->render('CollectifAdminBundle:Registration:step1.html.twig', array(
					'form' => $form->createView(),
					'message' => $message,
					'membre' => $membre,
					'titre'  => $titre
			));
		}
	}
	
	public function secondStepAction($userId)
	{
		$message='';
		$user = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User')->find($userId);
		$em = $this->getDoctrine()->getManager();
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:MonCv');
	
		$cv = new MonCv();
		$cv->setMembre($user);
	
		$form = $this->container->get('form.factory')->create(new SecondStepForm(), $cv);
		$request = $this->container->get('request');
	
		if ($request->getMethod() == 'POST')
		{
			$form->bindRequest($request);
	
			if ($form->isValid())
			{
				$em->persist($cv);
				$em->flush();
				return $this->redirect($this->generateUrl('collectif_membre_register_step3', array('userId' => $cv->getMembre()->getId())));
			}
		}
	
		return $this->render('CollectifAdminBundle:Registration:step2.html.twig', array(
				'form' => $form->createView(),
				'cv'   => $cv
		));
	}
	
	public function thirdStepAction($userId)
	{
		$user = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User')->find($userId);
		$em = $this->getDoctrine()->getManager();
		
		$form = $this->container->get('form.factory')->create(new ThirdStepForm(), $user);
		$request = $this->container->get('request');
	
		if ($request->getMethod() == 'POST')
		{
			$form->bindRequest($request);
	
			if ($form->isValid())
			{
				$em->persist($user);
				$em->flush();
				return $this->redirect($this->generateUrl('collectif_membre_register_step4', array('userId' => $user->getId())));
			}
		}
	
		return $this->render('CollectifAdminBundle:Registration:step3.html.twig', array(
				'form' => $form->createView()
		));
	}
	
	public function fourthStepAction($userId)
	{
		$user = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User')->find($userId);
		$em = $this->getDoctrine()->getManager();
	
		$form = $this->container->get('form.factory')->create(new FourthStepForm(), $user);
		$request = $this->container->get('request');
	
		if ($request->getMethod() == 'POST')
		{
			$form->bindRequest($request);
	
			if ($form->isValid())
			{
				$em->persist($user);
				$em->flush();
				return $this->render('CollectifAdminBundle:Registration:confirmation.html.twig');
			}
		}
	
		return $this->render('CollectifAdminBundle:Registration:step4.html.twig', array(
				'form' => $form->createView()
		));
	}
}
