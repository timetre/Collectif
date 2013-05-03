<?php

namespace Collectif\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Collectif\AdminBundle\Entity\Domaine;
use Collectif\AdminBundle\Entity\Page;

class HomeController extends Controller
{
    
	public function indexAction() {
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Article');
    	$articles = $repository->getArticles(true, 5);
		
    	return $this->render('CollectifFrontBundle:Default:index.html.twig', array(
			'lastArticle' 	=> $articles[0]
    	));
    }
    
    public function innerAction($alias) {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Page');
    	$page = $repository->getPageByAlias($alias);
    	
    	$articlesPage = null;
    	
    	if($page->getCategorie() != null) {
    		$articlesPage = $page->getCategorie()->getArticles();
    	}
    	
    	if($page->getTypePage() == "CONTENU") {
    		return $this->render('CollectifFrontBundle:Page:inner-page.html.twig', array(
    				'page' 			=> $page,
    				'articlesPage'	=> $articlesPage
    		));
    	} else if($page->getTypePage() == "BUREAU") {
    		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User');
    		$users = $repository->getUsersBureau();
    		
    		return $this->render('CollectifFrontBundle:Page:inner-bureau.html.twig', array(
    				'page' 			=> $page,
    				'articlesPage'	=> $articlesPage,
    				'usersBureau' 	=> $users
    		));
    	} else if($page->getTypePage() == "CONTACT") {
    		return $this->render('CollectifFrontBundle:Page:inner-contact.html.twig', array(
    				'page' 			=> $page
    		));
    	} else if($page->getTypePage() == "PARTENAIRES") {
    		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Partenaire');
    		$partenaires = $repository->getAll();
    		
    		return $this->render('CollectifFrontBundle:Page:inner-partenaires.html.twig', array(
    				'page' 			=> $page,
    				'partenaires'   => $partenaires
    		));
    	}
		
		
    		return $this->render('CollectifFrontBundle:Default:inner-page.html.twig', array(
    				'page' 			=> $page,
    				'articlesPage'	=> $articlesPage
    		));
    	
    }
    
    public function domaineAction($titrePage) {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Domaine');
    	$domaine = $repository->getDomaineByTitre($titrePage);
    	
    	$users = $domaine->getUsers();
    	$publications = array();
    	
    	foreach ($users as $user) {
    		foreach($user->getPublications() as $pub) {
    			$publications[] = $pub;
    		}
    	}
    	
    	
    	return $this->render('CollectifFrontBundle:Default:domaine.html.twig', array( 
			'domaine'		=> $domaine, 
			'publications'  => $publications
    	));
    }
    
    public function membreAction($id) {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User');
    	$membre = $repository->find($id);
		$domaine = $membre->getDomaine();
    	
    	return $this->render('CollectifFrontBundle:Default:membre.html.twig', array(
    		'membre' 		=> $membre,
			'domaine'		=> $domaine,
    	));
    }
    
    public function listArticlesAction() {
    	
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Article');
    	$articles = $repository->getArticles(true);
    	
    	return $this->render('CollectifFrontBundle:Articles:view.html.twig', array(
			'articles' 		=> $articles
    	));
    }
    
	public function viewArticleAction($id) {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Article');
    	$article = $repository->find($id);
    	
    	return $this->render('CollectifFrontBundle:Articles:detail.html.twig', array(
    		'article'		=> $article,
    	));
    }
    
    public function viewPublicationAction($id) {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Publication');
    	$publication = $repository->find($id);
    	 
    	return $this->render('CollectifFrontBundle:Publications:detail.html.twig', array(
    			'publication'		=> $publication,
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
    
	public function sidebarAction() {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Article');
    	$articles = $repository->getArticles(true, 5);
		//$articles = $repository->getArticlesPublications();
		
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Partenaire');
    	$partenaires = $repository->getAll();
		
    	return $this->render('CollectifFrontBundle:Commons:sidebar.html.twig', array(
			'articles' 		=> $articles, 
			'partenaires'	=> $partenaires
    	));
    
    }
    
    public function sidebarInnerAction() {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Article');
    	$articles = $repository->getArticles(true, 5);
    	//$articles = $repository->getArticlesPublications();
    
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Partenaire');
    	$partenaires = $repository->getAll();
    
    	return $this->render('CollectifFrontBundle:Commons:sidebar-inner.html.twig', array(
    			'articles' 		=> $articles,
    			'partenaires'	=> $partenaires
    	));
    
    }
    
    public function researchAction() {       
       	$arg = "";

		$request = $this->container->get('request');

        if ($request->getMethod() == 'POST') {
        	$arg = $request->get('search');
        	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Domaine');
        	$searchDomaines = $repository->getDomainesSearch($arg);
        	
        	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Article');
        	$searchArticles = $repository->getArticlesSearch($arg);
        	
        	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Publication');
        	$searchPublications = $repository->getPublicationsSearch($arg);
        	
        } else {
        	return $this->redirect($this->generateUrl('collectif_front_homepage'));
        }
    	
    	return $this->render('CollectifFrontBundle:Default:inner-search.html.twig', array(
			'searchDomaines'  		=> $searchDomaines,
			'searchArticles'		=> $searchArticles, 
			'searchPublications'	=> $searchPublications, 
			'arg'					=> $arg,
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

    public function contactAction() {
    	$request = $this->container->get('request');
    	
    	if ($request->getMethod() == 'POST')
    	{
    		$nom = $request->request->get('nom');
    		$mail = $request->request->get('mail');
    		$sujet = $request->request->get('sujet');
    		$message = $request->request->get('message');
    		//die;
    		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Parameters');
    		$parametres = $repository->getParameters();
    		$to = $parametres->getContactInfos();
    		
    		$send = \Swift_Message::newInstance()
    			->setSubject($sujet)
    			->setFrom($mail)
    			->setTo($to)
    			->setBody($this->renderView('CollectifFrontBundle:Mail:contact.html.twig', array('message' => $message)))
    		;
    		$this->get('mailer')->send($send);
    		
    	
    		return $this->render('CollectifFrontBundle:Page:inner-contact-envoye.html.twig');
    	
    	}
    }
    
    
}
