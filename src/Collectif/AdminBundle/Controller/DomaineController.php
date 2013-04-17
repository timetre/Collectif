<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Collectif\AdminBundle\Entity\Domaine;

use Collectif\AdminBundle\Form\DomaineForm;
use Collectif\AdminBundle\Controller\DomaineController;

class DomaineController extends Controller
{
    public function listAction()
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Domaine');
    	
    	$domaines = $repository->getAll();
    	
        return $this->render('CollectifAdminBundle:Domaine:view.html.twig', array(
            'domaines' => $domaines
        ));
    }
    
    public function detailAction($id)
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Domaine');
    	
    	$domaine = $repository->find($id);
    	
    	if($domaine === null)
    	{
    		throw $this->createNotFoundException('Domaine[id='.$id.'] inexistant.');
    	}
    	
    	return $this->render('CollectifAdminBundle:Domaine:detail.html.twig', array(
    			'domaine' => $domaine
    	));
    }
    
    public function editAction($id = null)
    {
    	$message='';
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Domaine');

        if (isset($id)) 
        {
            $domaine = $repository->find($id);
            $date = new \Datetime();
            $domaine->setDateModification($date);
            
            if (!$domaine)
            {
                $message='Aucun domaine trouvé';
                //throw $this->createNotFoundException('Domaine[id='.$id.'] inexistant.');
            }
        }
        else 
        {
	 		$domaine = new Domaine();
			$domaine->setActif(true);
			$domaine->setDateModification(new \Datetime());
    		$ordre = $repository->getMaxOrdre();
			$domaine->setOrdre($ordre+1);
        }
        
       

        $form = $this->container->get('form.factory')->create(new DomaineForm(), $domaine);        
        
        $request = $this->container->get('request');

        if ($request->getMethod() == 'POST') 
        {
			$form->bindRequest($request);
			
            if ($form->isValid()) 
            {
				$domaine->setTitrePage($this->clear_str($domaine->getNom()));
				
                $em->persist($domaine);

                $em->flush();
                
                if (isset($id)) 
                {
                     $message='Domaine modifié avec succès !';
                }
                else 
                {
                    $message='Domaine ajouté avec succès !';
                }
                
                return new RedirectResponse($this->container->get('router')->generate('collectif_domaine_homepage'));
            }
        }

    	return $this->render('CollectifAdminBundle:Domaine:edit.html.twig', array(
    		'form' => $form->createView(),
            'message' => $message,
			'domaine' => $domaine
    	));
    }
    
    
    public function deleteAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$domaine = $em->find('CollectifAdminBundle:Domaine', $id);
    	
    	if (!$domaine)
    	{
    		throw $this->createNotFoundException('Domaine[id='.$id.'] inexistant.');
    	}
    	
    	$em->remove($domaine);
    	$em->flush();
    	
    	
    	 return new RedirectResponse($this->container->get('router')->generate('collectif_domaine_homepage'));
    }
	
	private function clear_str($text, $separator = '-', $charset = 'utf-8') {
		// Pour l'encodage
		$text = mb_convert_encoding($text,'HTML-ENTITIES',$charset);
		$text = strtolower(trim($text));
		// On vire les accents
		$text = preg_replace(   array('/ß/','/&(..)lig;/', '/&([aouAOU])uml;/','/&(.)[^;]*;/'), 
						array('ss',"$1","$1".'e',"$1"),  
						$text);
		// on vire tout ce qui n'est pas alphanumérique
		$text_clear = preg_replace("[^a-z0-9_-]",' ',trim($text));// ^a-zA-Z0-9_-
		// Nettoyage pour un espace maxi entre les mots
		$array = explode(' ', $text_clear);
		$str = '';
		$i = 0;
		foreach($array as $cle=>$valeur){
			
			if(trim($valeur) != '' AND trim($valeur) != $separator AND $i > 0)
				$str .= $separator.$valeur;
			elseif(trim($valeur) != '' AND trim($valeur) != $separator AND $i == 0)
				$str .= $valeur;
			
			$i++;

		}
		
		//on renvoie la chaîne transformée
		return $str;
		
	}
	    
}
