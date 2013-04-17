<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Collectif\AdminBundle\Entity\Parameters;

use Collectif\AdminBundle\Form\ParametersForm;
use Collectif\AdminBundle\Controller\ParametersController;

class ParametersController extends Controller {
    

    public function editAction()
    {
    	$message='';
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Parameters');


		$parameters = $repository->getParameters();
		
		if (!$parameters)
		{
			$message='Problème !!';
		}
        
        $form = $this->container->get('form.factory')->create(new ParametersForm(), $parameters);

        $request = $this->container->get('request');

        if ($request->getMethod() == 'POST') 
        {
            $form->bindRequest($request);
            
            if ($form->isValid()) 
            {
                
                $em->persist($parameters);
                
                $em->flush();
                
                if (isset($id)) 
                {
                     $message='Parameters modifié avec succès !';
                }
                else 
                {
                    $message='Parameters ajouté avec succès !';
                }
                
                return new RedirectResponse($this->container->get('router')->generate('collectif_parameters_homepage'));
            }
        }

    	return $this->render('CollectifAdminBundle:Parameters:edit.html.twig', array(
    		'form' => $form->createView(),
            'message' => $message,
    	));
    }
}
