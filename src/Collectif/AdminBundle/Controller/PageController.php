<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Collectif\AdminBundle\Entity\Page;

use Collectif\AdminBundle\Form\PageForm;
use Collectif\AdminBundle\Controller\PageController;

class PageController extends Controller {
    
    public function indexAction() {
        return $this->render('CollectifAdminBundle:Page:index.html.twig', array('nom' => 'test'));
    }
    
    public function listAction($parent = null)
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Page');
    	if($parent==0) {
			$parent = null;
		}
    	$pages = $repository->getHierarchie($parent);
		
		if($parent != null) {
			$backpage = $repository->find($parent);
			if($backpage->getParent() != null) {
				$backlink = $backpage->getParent()->getId();
			} else {
				$backlink = 0;
			}
		} else {
			$backlink = 0;
			$parent = 0;
		}
		
		return $this->render('CollectifAdminBundle:Page:view.html.twig', array(
            'pages' => $pages, 
			'parent' => $parent,
			'backlink' => $backlink
        ));
    }
    
    public function detailAction($id)
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Page');
    	
    	$page = $repository->find($id);
    	
    	if($page === null)
    	{
    		throw $this->createNotFoundException('Page[id='.$id.'] inexistante.');
    	}
    	
    	return $this->render('CollectifAdminBundle:Page:detail.html.twig', array(
    			'page' => $page
    	));
    }
    
    public function editAction($id = null, $parent = 0)
    {
    	$message='';
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Page');
		$backlink = 0;
		if($parent != 0) {
			$backpage = $repository->find($parent);
			if($backpage->getParent() != null) {
				$backlink = $backpage->getParent()->getId();
			}
		}

        if (isset($id)) 
        {
            $page = $repository->find($id);
            $date = new \Datetime();
            $page->setDateModification($date);
            
            if (!$page)
            {
                $message='Aucune page trouvée';
            }
        }
        else 
        {
	 		$page = new Page();
			$page->setDateModification(new \Datetime());
    		$page->setActif(true);
    		$page->setClickable(true);
    		$ordre = $repository->getMaxOrdre();
			$page->setOrdre($ordre+1);
			//$parent = new Page();
			if($parent != 0) {
				$page->setParent($repository->find($parent));
			}
			
        }

        $form = $this->container->get('form.factory')->create(new PageForm(), $page);

        $request = $this->container->get('request');

        if ($request->getMethod() == 'POST') 
        {
            $form->bindRequest($request);
            
            if ($form->isValid()) 
            {
			
				$page->setAlias($this->clear_str($page->getTitre()));
                
                $em->persist($page);
                
                $em->flush();
				
                if (isset($id)) 
                {
                     $message='Page modifié avec succès !';
                }
                else 
                {
                    $message='Page ajouté avec succès !';
                }
                
                return new RedirectResponse($this->container->get('router')->generate('collectif_page_homepage', array(
					'parent' => $_POST['retour'])));
            }
        }
    	return $this->render('CollectifAdminBundle:Page:edit.html.twig', array(
    		'form' => $form->createView(),
            'message' => $message,
			'backlink' => $backlink,
			'parent' => $parent
    	));
    }
    
    
    public function deleteAction($id, $parent=0)
    {
    	$em = $this->getDoctrine()->getManager();
    	$page = $em->find('CollectifAdminBundle:Page', $id);
    	
    	if (!$page)
    	{
    		throw $this->createNotFoundException('Page[id='.$id.'] inexistant.');
    	}
    	
    	$em->remove($page);
    	$em->flush();
    	
    	
    	return new RedirectResponse($this->container->get('router')->generate('collectif_page_homepage', array('parent' => $parent)));
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
