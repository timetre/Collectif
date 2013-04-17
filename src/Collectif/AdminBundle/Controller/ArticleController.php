<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Collectif\AdminBundle\Entity\Article;

use Collectif\AdminBundle\Form\ArticleForm;
use Collectif\AdminBundle\Controller\ArticleController;

class ArticleController extends Controller
{
    public function listAction()
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Article');
    	
    	$articles = $repository->findAll();
    	
        return $this->render('CollectifAdminBundle:Article:view.html.twig', array(
            'articles' => $articles
        ));
    }
    
    public function detailAction($id)
    {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Article');
    	
    	$article = $repository->find($id);
    	
    	if($article === null)
    	{
    		throw $this->createNotFoundException('Article[id='.$id.'] inexistant.');
    	}
    	
    	return $this->render('CollectifAdminBundle:Article:detail.html.twig', array(
    			'article' => $article
    	));
    }
    
    public function editAction($id = null)
    {
    	$message='';
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Article');

        if (isset($id)) 
        {
            $article = $repository->find($id);
            $date = new \Datetime();
            $article->setDateModification($date);
            
            if (!$article)
            {
                $message='Aucun article trouvé';
            }
        }
        else 
        {
	 		$article = new Article();
			$article->setActif(true);
			$article->setDateModification(new \Datetime());
        }

        $form = $this->container->get('form.factory')->create(new ArticleForm(), $article);

        $request = $this->container->get('request');

        if ($request->getMethod() == 'POST') 
        {
			$form->bindRequest($request);

            if ($form->isValid()) 
            {			
                $em->persist($article);

                $em->flush();
                
                if (isset($id)) 
                {
                     $message='Article modifié avec succès !';
                }
                else 
                {
                    $message='Article ajouté avec succès !';
                }
                
                return new RedirectResponse($this->container->get('router')->generate('collectif_articles_homepage'));
            }
        }

    	return $this->render('CollectifAdminBundle:Article:edit.html.twig', array(
    		'form' => $form->createView(),
            'message' => $message,
			'article' => $article
    	));
    }

    public function deleteAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$article = $em->find('CollectifAdminBundle:Article', $id);
    	
    	if (!$article)
    	{
    		throw $this->createNotFoundException('Article[id='.$id.'] inexistant.');
    	}
    	
    	$em->remove($article);
    	$em->flush();
    	
    	
    	 return new RedirectResponse($this->container->get('router')->generate('collectif_articles_homepage'));
    }    
}
