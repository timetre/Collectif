<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Finder\Finder;

class SitemapController extends Controller
{
    public function generateSitemapAction()
    {
        $cpt = 0;
    	//Users
        $repository = $this->getDoctrine()->getManager()->getRepository('CollectifUserBundle:User');
    	$users = $repository->getActifEnabled(true);

        foreach($users as $user) {
            $url = "http://" . $this->getRequest()->getHost() . $this->generateUrl('collectif_front_chercheur', array('alias' => $user->getAlias()));
            echo $url . "<br/>";
            $cpt++;
        }
    	
        //Pages
        $repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Page');
        $pages = $repository->getPages(true);

        foreach($pages as $page) {
            $url = "http://" . $this->getRequest()->getHost() . $this->generateUrl('collectif_front_inner', array('alias' => $page->getAlias()));
            echo $url . "<br/>";
            $cpt++;
        }

        //Articles
        $repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Article');
        $articles = $repository->getArticles(true);

        foreach($articles as $article) {
            $url = "http://" . $this->getRequest()->getHost() . $this->generateUrl('collectif_front_article', array('alias' => $article->getAlias()));
            echo $url . "<br/>";
            $cpt++;
        }

        //Publications
        $repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Publication');
        $publications = $repository->getPublications(true);

        foreach($publications as $publication) {
            $url = "http://" . $this->getRequest()->getHost() . $this->generateUrl('collectif_front_publication', array('alias' => $publication->getAlias()));
            echo $url . "<br/>";
            $cpt++;
        }
        echo $cpt;
        die;
    	
    	return null;
    }

}
