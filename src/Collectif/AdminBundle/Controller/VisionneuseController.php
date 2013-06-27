<?php

namespace Collectif\AdminBundle\Controller;

use Collectif\AdminBundle\Entity\Message;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Collectif\AdminBundle\Entity\Visionneuse;
use Collectif\AdminBundle\Form\VisionneuseType;
use Collectif\AdminBundle\Form\VisionneuseRssType;
use Collectif\AdminBundle\Form\VisionneuseVisionneusesType;
use Collectif\AdminBundle\Form\VisionneuseStagesType;
use Collectif\AdminBundle\Form\VisionneusePdfType;
use Collectif\AdminBundle\Form\PostType;
use Collectif\AdminBundle\Form\MessageType;
use Collectif\AdminBundle\Entity\Post;

/**
 * Visionneuse controller.
 *
 */
class VisionneuseController extends Controller
{
    public function createVisionneuseAction(Request $request, $sfId)
    {
    	$entity  = new Visionneuse();
    	$form = $this->createForm(new VisionneuseType(), $entity);
    	$form->bind($request);
    
    	$em = $this->getDoctrine()->getManager();
    
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	$sf = $em->getRepository('CollectifAdminBundle:SousForum')->find($sfId);
    
    	$entity->setMembre($user);
    	$entity->setSousForum($sf);
    
    	$em->persist($entity);
    	$em->flush();
    
    	$outil = new Visionneuse();
    	$outil->setSousForum($sf);
    	$outil->setMembre($user);
    	$form = $this->createForm(new VisionneuseType(), $outil);
    
    	if (!$sf) {
    		throw $this->createNotFoundException('Unable to find Visionneuse entity.');
    	}
    
    	return $this->redirect($this->generateUrl('reseau_sousforum_show', array('id' => $sf->getId())));
    	
    }
    
    public function showVisionneuseAction($id)
    {
    	
    	$em = $this->getDoctrine()->getManager();
    
    	$entity = $em->getRepository('CollectifAdminBundle:Visionneuse')->find($id);

    	$user = $this->container->get('security.context')->getToken()->getUser();
    	$post = new Post();
    	$post->setVisionneuse($entity);
    	$post->setMembre($user);
    	$form = $this->createForm(new PostType(), $post);
	
    	return $this->render('CollectifAdminBundle:Visionneuse:show.html.twig', array(
    		'entity'      => $entity,
    		'form'	=> $form->createView()
    	));
    }
    
	public function deleteVisionneuseAction($id)
	{
    	$em = $this->getDoctrine()->getManager();
    	$article = $em->find('CollectifAdminBundle:Visionneuse', $id);
    
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
