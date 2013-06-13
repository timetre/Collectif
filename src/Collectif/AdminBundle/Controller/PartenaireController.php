<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Collectif\AdminBundle\Entity\Partenaire;

use Collectif\AdminBundle\Form\PartenaireForm;
use Collectif\AdminBundle\Form\PartenaireFormAdd;
use Collectif\AdminBundle\Controller\PartenaireController;

class PartenaireController extends Controller {
    
    public function listAction()
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Partenaire');
    	
    	//findAll();
    	$partenaires = $repository->getAll();
    	
        return $this->render('CollectifAdminBundle:Partenaire:view.html.twig', array(
            'partenaires' => $partenaires
        ));
    }
    
    public function detailAction($id)
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Partenaire');
    	
    	$partenaire = $repository->find($id);
    	
    	if($partenaire === null)
    	{
    		throw $this->createNotFoundException('Partenaire[id='.$id.'] inexistant.');
    	}
    	
    	return $this->render('CollectifAdminBundle:Partenaire:detail.html.twig', array(
    			'partenaire' => $partenaire
    	));
    }
    
    public function editAction($id = null)
    {
    	$message='';
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Partenaire');

        if (isset($id)) 
        {
            $partenaire = $repository->find($id);
            
			if (!$partenaire)
            {
                $message='Aucun partenaire trouvé';
            }
        }
        else 
        {
	 		$partenaire = new Partenaire();
        }

		$form = $this->container->get('form.factory')->create(new PartenaireForm(), $partenaire);
        $request = $this->container->get('request');

        if ($request->getMethod() == 'POST') 
        {
            $form->bindRequest($request);
            
            if ($form->isValid()) 
            {
                $em->persist($partenaire);
                
                $em->flush();
                
                if (isset($id)) 
                {
                     $message='Partenaire modifié avec succès !';
                }
                else 
                {
                    $message='Partenaire ajouté avec succès !';
                }
                
                return new RedirectResponse($this->container->get('router')->generate('collectif_partenaires_homepage'));
            }
        }

    	return $this->render('CollectifAdminBundle:Partenaire:edit.html.twig', array(
    		'form' => $form->createView(),
            'message' => $message,
			'partenaire' => $partenaire
    	));
    }
    
    
    public function deleteAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$partenaire = $em->find('CollectifAdminBundle:Partenaire', $id);
    	
    	if (!$partenaire)
    	{
    		throw $this->createNotFoundException('Partenaire[id='.$id.'] inexistant.');
    	}
    	
    	$em->remove($partenaire);
    	$em->flush();
    	
    	return new RedirectResponse($this->container->get('router')->generate('collectif_partenaires_homepage'));
    }
    
   
}
