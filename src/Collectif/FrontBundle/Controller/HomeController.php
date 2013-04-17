<?php

namespace Collectif\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Collectif\AdminBundle\Entity\Domaine;
use Collectif\AdminBundle\Entity\Page;

class HomeController extends Controller
{
    public function indexAction() {
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Page');
    	$page = $repository->getDefaultPage();
		
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Domaine');
    	$domaines = $repository->getAll();
		
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Article');
    	$articles = $repository->getArticles(true, 5);
		//$articles = $repository->getArticlesPublications();
		
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Partenaire');
    	$partenaires = $repository->findAll();
		
    	return $this->render('CollectifFrontBundle:Default:index.html.twig', array(
    		'page' 			=> $page,
			'domaines' 		=> $domaines, 
			'articles' 		=> $articles, 
			'partenaires'	=> $partenaires,
			'lastArticle' 	=> $articles[0]
    	));
    }
    
    public function innerAction($alias) {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Page');
    	$page = $repository->getPageByAlias($alias);
		
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Domaine');
    	$domaines = $repository->getAll();
		
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Article');
    	$articles = $repository->getArticles(true, 5);
		
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Partenaire');
    	$partenaires = $repository->findAll();
		
		$articlesPage = null;
		
		if($page->getCategorie() != null) {
			$articlesPage = $page->getCategorie()->getArticles();
		}
		
    	
    	return $this->render('CollectifFrontBundle:Default:inner-page.html.twig', array(
    		'page' 			=> $page,
			'domaines'  	=> $domaines,
			'articles' 		=> $articles, 
			'partenaires'	=> $partenaires, 
			'articlesPage'	=> $articlesPage
    	));
    }
    
    public function domaineAction($titrePage) {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Domaine');
    	$domaine = $repository->getDomaineByTitre($titrePage);
		
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Article');
    	$articles = $repository->getArticles(true, 5);
		
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Partenaire');
    	$partenaires = $repository->findAll();
    	
    	return $this->render('CollectifFrontBundle:Default:domaine.html.twig', array(
    		'description' 	=> $domaine->getDescription(), 
			'domaine'		=> $domaine, 
			'articles' 		=> $articles, 
			'partenaires'	=> $partenaires,
    		'nom' 			=> $domaine->getNom()
    	));
    }
    
    public function membreAction($id) {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User');
    	$membre = $repository->find($id);
		$domaine = $membre->getDomaine();
		
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Article');
    	$articles = $repository->getArticles(true, 5);
		
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Partenaire');
    	$partenaires = $repository->findAll();
    	
    	return $this->render('CollectifFrontBundle:Default:membre.html.twig', array(
    		'membre' 		=> $membre,
			'domaine'		=> $domaine,
			'partenaires'	=> $partenaires,
			'articles' 		=> $articles
    	));
    }
    
    public function listArticlesAction() {
    	
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Article');
    	$articles = $repository->getArticles(true);
    	
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Domaine');
    	$domaines = $repository->getAll();
		
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Partenaire');
    	$partenaires = $repository->findAll();
    	
    	return $this->render('CollectifFrontBundle:Articles:view.html.twig', array(
			'domaines'		=> $domaines,
			'partenaires'	=> $partenaires,
			'articles' 		=> $articles
    	));
    }
    
    public function viewArticleAction($id) {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Article');
    	$article = $repository->find($id);
    	
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Domaine');
    	$domaines = $repository->getAll();
		
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Article');
    	$articles = $repository->getArticles(true, 5);
		
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Partenaire');
    	$partenaires = $repository->findAll();
    	
    	return $this->render('CollectifFrontBundle:Articles:detail.html.twig', array(
    		'domaines'		=> $domaines,
			'partenaires'	=> $partenaires,
			'articles' 		=> $articles, 
    		'article'		=> $article,
    	));
    }
    
	public function menuTopAction() {       
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Page');
		
		$pages = $repository->getHierarchie();
		
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Parameters');
    	$parametres = $repository->getParameters();

    	return $this->render('CollectifFrontBundle:Commons:menu-top.html.twig', array(
       		'pages' 	=> $pages,
			'param'		=> $parametres,
        ));
    }
    
    public function menuBottomAction() {
        $repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Domaine');
    	$domaines = $repository->getDomaines(true);
    	
    	
        $liste_membres = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User')->getActifEnabled(true, true);
    	    	
        return $this->render('CollectifFrontBundle:Commons:menu-bottom.html.twig', array(
       		'domaines' => $domaines, 
       		'membres' => $liste_membres
        ));
        
    }
    
    public function researchAction() {       
       	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Domaine');
    	$domaines = $repository->getAll();
		
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Article');
    	$articles = $repository->getArticles(true, 5);
		
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Partenaire');
    	$partenaires = $repository->findAll();
		
		$arg = "";

		
		$request = $this->container->get('request');

        if ($request->getMethod() == 'POST') {
        	$arg = $request->get('search');
        	
        	//Méthodes de recherche
        	//On retourne une liste d'éléments avec un titre, un lien et une pertinence
        	
        	
        } else {
        	return $this->redirect($this->generateUrl('collectif_front_homepage'));
        }
    	
    	return $this->render('CollectifFrontBundle:Default:inner-search.html.twig', array(
			'domaines'  	=> $domaines,
			'articles' 		=> $articles, 
			'partenaires'	=> $partenaires, 
			'arg'			=> $arg,
    	));
    }
    
    public function searchAction() {       
       	return $this->render('CollectifFrontBundle:Commons:search.html.twig');
    }
    
    public function headerAction() {       
        return $this->render('CollectifFrontBundle:Commons:header.html.twig');
    }
    
	public function footerAction() {       
        return $this->render('CollectifFrontBundle:Commons:footer.html.twig');
    }

    
    
    
}
