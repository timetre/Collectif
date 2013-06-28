<?php

namespace Collectif\AdminBundle\Controller;

use Collectif\AdminBundle\Entity\Feed;
use Collectif\AdminBundle\Entity\Post;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Collectif\AdminBundle\Form\FeedType;

/**
 * SousForum controller.
 *
 */
class FeedController extends Controller
{
	public function createFeedAction(Request $request, $sfId)
    {
    	$entity  = new Feed();
    	$form = $this->createForm(new FeedType(), $entity);
    	$form->bind($request);
    
    	if (!$form->isValid()) {
    
    		$em = $this->getDoctrine()->getManager();
    
    		$user = $this->container->get('security.context')->getToken()->getUser();
    		$sf = $em->getRepository('CollectifAdminBundle:SousForum')->find($sfId);
    
    		$entity->setMembre($user);
    		$entity->setSousForum($sf);
    
    		$em->persist($entity);
    		$em->flush();
    
    		$feed = new Feed();
    		$feed->setSousForum($sf);
    		$feed->setMembre($user);
    		$form = $this->createForm(new FeedType(), $feed);
    
    		if (!$sf) {
    			throw $this->createNotFoundException('Unable to find SousForum entity.');
    		}
    
    		return $this->redirect($this->generateUrl('reseau_sousforum_show', array('id' => $sf->getId())));
    	}
    
    	return $this->render('CollectifAdminBundle:Post:new.html.twig', array(
    			'entity' => $entity,
    			'form'   => $form->createView(),
    	));
    }
    
    public function showFeedAction($id)
    {
    	
    	$em = $this->getDoctrine()->getManager();
    
    	$entity = $em->getRepository('CollectifAdminBundle:Feed')->find($id);
    	
    	$reader = $this->get('eko_feed.feed.reader');
		$feeds = $reader->load($entity->getLien())->get();
		
		/*
		$items = array();
		
    	foreach ($feed as $entry) {
    	  echo $entry->getTitle() . " <br/>";
          echo $entry->getContent();
          echo $entry->getLink() . "<br/>";
          // echo $entry->getDateModified();
          $items[] =
        }
		
		die;
*/
    	
	
    	return $this->render('CollectifAdminBundle:Rss:detail.html.twig', array(
    		'entity'      => $entity,
    		'feeds' => $feeds
    	));
    }
    
	public function deleteFeedAction($id)
	{
    	$em = $this->getDoctrine()->getManager();
    	$article = $em->find('CollectifAdminBundle:Feed', $id);
    
    	if (!$article)
    	{
    		throw $this->createNotFoundException('Topic [id='.$id.'] inexistant.');
    	}
    	
    	$sf = $article->getSousForum();
    	
    	$em->remove($article);
    	$em->flush();
    
    	return $this->redirect($this->generateUrl('reseau_sousforum_show', array('id' => $sf->getId())));
    }
}
