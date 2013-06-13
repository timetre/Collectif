<?php

namespace Collectif\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;


use Collectif\AdminBundle\Entity\Domaine;
use Collectif\AdminBundle\Entity\Page;
use Collectif\AdminBundle\Entity\Article;
use Collectif\StatisticsBundle\Entity\Statistic;
use Collectif\UserBundle\Entity\User;

class HomeController extends Controller
{
    
	public function indexAction() {
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:SuperClassArticle');
    	$articles = $repository->getArticles(true, 5);
    	$art = null;
    	
    	if(count($articles) > 0) {
    		$art = $articles[0];
    	}  	
		
    	return $this->render('CollectifFrontBundle:Default:index.html.twig', array(
			'lastArticle' 	=> $art
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
    	
    	$this->container->get('request')->getSession()->set('domaine', $domaine->getId());
    	
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
    
    public function membreAction($alias) {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User');
    	$membre = $repository->findByAlias($alias);
		$domaine = $membre->getDomaine();
		
		$this->setStatistic($membre);

		$this->container->get('request')->getSession()->set('domaine', $domaine->getId());
		
		if(sizeof($membre->getMesCvs()) > 0) {
			$cvList = $membre->getMesCvs();
			$cv = $cvList[0];
		} 
		else 
			$cv = null;
    	
    	return $this->render('CollectifFrontBundle:Default:membre.html.twig', array(
    		'membre' 		=> $membre,
			'domaine'		=> $domaine,
    		'cv'			=> $cv,
    	));
    }
    
    public function listArticlesAction() {
    	
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Article');
    	$articles = $repository->getArticles(true);
    	
    	return $this->render('CollectifFrontBundle:Articles:view.html.twig', array(
			'articles' 		=> $articles
    	));
    }
    
	public function viewArticleAction($alias) {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Article');
    	$article = $repository->findByAlias($alias);
    	
    	return $this->render('CollectifFrontBundle:Articles:detail.html.twig', array(
    		'article'		=> $article,
    	));
    }
    
    public function viewPublicationAction($alias) {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Publication');
    	$publication = $repository->findByAlias($alias);
    	 
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
    	
    	
        $liste_membres = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User')->getActifEnabled(true);
    	    	
        return $this->render('CollectifFrontBundle:Commons:menu-bottom.html.twig', array(
       		'domaines' => $domaines, 
       		'membres' => $liste_membres
        ));
        
    }
    
    public function menuBottomDomaineAction() {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Domaine');
    	$domaines = $repository->getDomaines(true);
    	
    	if($this->container->get('request')->getSession()->get('domaine') != null) {
    		$mondomaine = $repository->find($this->container->get('request')->getSession()->get('domaine'));
    	} else {
    		$mondomaine = null;
    	}
    	 
    	$liste_membres = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User')->getActifEnabled(true);
    
    	return $this->render('CollectifFrontBundle:Commons:menu-bottom-domaine.html.twig', array(
    			'domaines' => $domaines,
    			'monDomaine' => $mondomaine,
    			'membres' => $liste_membres
    	));
    
    }
    
	public function sidebarAction() {
    	/*$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Article');
    	$articles = $repository->getArticles(true, 5);*/
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:SuperClassArticle');
    	$articles = $repository->getArticles(true, 5);
		
		$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Partenaire');
    	$partenaires = $repository->getAll();
		
    	return $this->render('CollectifFrontBundle:Commons:sidebar.html.twig', array(
			'articles' 		=> $articles, 
			'partenaires'	=> $partenaires
    	));
    
    }
    
    public function sidebarInnerAction() {
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:SuperClassArticle');
    	$articles = $repository->getArticles(true, 5);
    
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
    
    private function setStatistic($membre) {
    	$stat = new Statistic();
    	
    	$test = $this->getRequest()->server->get('HTTP_X_FORWARDED_FOR');
    	
    	if(isset($test)) {
    		$ip = $this->getRequest()->server->get('HTTP_X_FORWARDED_FOR');
    	} else {
    		$test = $this->getRequest()->server->get('HTTP_CLIENT_IP');
    		if(isset($test)) {
    			$ip = $this->getRequest()->server->get('HTTP_CLIENT_IP');
    		} else {
    			$ip = $this->getRequest()->server->get('REMOTE_ADDR');
    		}
    	}
    	
    	$test = $this->getRequest()->server->get('HTTP_REFERER');
    	if (isset($test)) {
    		$httphost = $this->getRequest()->server->get('HTTP_HOST');
    		if (eregi($httphost, $test)) {
    			$referer = '';
    		}
    		else {
    			$referer = $this->getRequest()->server->get('HTTP_REFERER');
    		}
    	} else {
    		$referer ='';
    	}
    	
    	$stat->setIp($ip);
    	$stat->setHost(gethostbyaddr($ip));
    	$stat->setNavigateur($this->getRequest()->server->get('HTTP_USER_AGENT'));
    	$stat->setReferer($referer);
    	$stat->setMembre($membre);
    	
    	$em = $this->getDoctrine()->getManager();
    	$em->persist($stat);
    	$em->flush();
    }
}
