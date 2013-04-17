<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Collectif\AdminBundle\Entity\Categorie;

use Collectif\AdminBundle\Form\CategorieForm;
use Collectif\AdminBundle\Controller\CategorieController;

class CategorieController extends Controller
{
    public function listAction()
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Categorie');
    	
    	$categories = $repository->findAll();
    	
        return $this->render('CollectifAdminBundle:Categorie:view.html.twig', array(
            'categories' => $categories
        ));
    }
    
    public function detailAction($id)
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Categorie');
    	
    	$categorie = $repository->find($id);
    	
    	if($categorie === null)
    	{
    		throw $this->createNotFoundException('Categorie[id='.$id.'] inexistant.');
    	}
    	
    	return $this->render('CollectifAdminBundle:Categorie:detail.html.twig', array(
    			'categorie' => $categorie
    	));
    }
    
    public function editAction($id = null)
    {
    	$message='';
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Categorie');

        if (isset($id)) 
        {
            $categorie = $repository->find($id);
            $date = new \Datetime();
            $categorie->setDateModification($date);
            
            if (!$categorie)
            {
                $message='Aucun categorie trouvé';
            }
        }
        else 
        {
	 		$categorie = new Categorie();
			$categorie->setDateModification(new \Datetime());
        }

        $form = $this->container->get('form.factory')->create(new CategorieForm(), $categorie);

        $request = $this->container->get('request');

        if ($request->getMethod() == 'POST') 
        {
			$form->bindRequest($request);

            if ($form->isValid()) 
            {
                $em->persist($categorie);

                $em->flush();
                
                if (isset($id)) 
                {
                     $message='Categorie modifiée avec succès !';
                }
                else 
                {
                    $message='Categorie ajoutée avec succès !';
                }
                
                return new RedirectResponse($this->container->get('router')->generate('collectif_categories_homepage'));
            }
        }

    	return $this->render('CollectifAdminBundle:Categorie:edit.html.twig', array(
    		'form' => $form->createView(),
            'message' => $message,
			'categorie' => $categorie
    	));
    }
    
    public function deleteAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$categorie = $em->find('CollectifAdminBundle:Categorie', $id);
    	
    	if (!$categorie)
    	{
    		throw $this->createNotFoundException('Categorie[id='.$id.'] inexistante.');
    	}
    	
    	$em->remove($categorie);
    	$em->flush();
    	
    	
    	 return new RedirectResponse($this->container->get('router')->generate('collectif_categories_homepage'));
    }
}
