<?php

namespace Collectif\AdminBundle\Controller;

use Collectif\AdminBundle\Entity\Message;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Collectif\AdminBundle\Entity\SousForum;
use Collectif\AdminBundle\Form\SousForumType;
use Collectif\AdminBundle\Form\SousForumRssType;
use Collectif\AdminBundle\Form\SousForumOutilsType;
use Collectif\AdminBundle\Form\SousForumStagesType;
use Collectif\AdminBundle\Form\SousForumPdfType;
use Collectif\AdminBundle\Form\PostType;
use Collectif\AdminBundle\Form\MessageType;
use Collectif\AdminBundle\Entity\Post;

/**
 * SousForum controller.
 *
 */
class MessageController extends Controller
{

    public function createMessageAction(Request $request, $sfId)
    {
    	$entity  = new Message();
    	$form = $this->createForm(new MessageType(), $entity);
    	$form->bind($request);
    
    	if (!$form->isValid()) {
    
    		$em = $this->getDoctrine()->getManager();
    
    		$user = $this->container->get('security.context')->getToken()->getUser();
    		$sf = $em->getRepository('CollectifAdminBundle:SousForum')->find($sfId);
    
    		$entity->setMembre($user);
    		$entity->setSousForum($sf);
    
    		$em->persist($entity);
    		$em->flush();
    
    		$message = new Message();
    		$message->setSousForum($sf);
    		$message->setMembre($user);
    		$form = $this->createForm(new MessageType(), $message);
    
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
    
    public function showMessageAction($id)
    {
    	
    	$em = $this->getDoctrine()->getManager();
    
    	$entity = $em->getRepository('CollectifAdminBundle:Message')->find($id);

    	$user = $this->container->get('security.context')->getToken()->getUser();
    	$post = new Post();
    	$post->setMessage($entity);
    	$post->setMembre($user);
    	$form = $this->createForm(new PostType(), $post);
	
    	return $this->render('CollectifAdminBundle:message:show.html.twig', array(
    		'entity'      => $entity,
    		'form'	=> $form->createView()
    	));
    }
    
	public function deleteMessageAction($id)
	{
    	$em = $this->getDoctrine()->getManager();
    	$article = $em->find('CollectifAdminBundle:Message', $id);
    
    	if (!$article)
    	{
    		throw $this->createNotFoundException('Topic [id='.$id.'] inexistant.');
    	}
    	
    	$sf = $article->getSousForum();
    	
    	$em->remove($article);
    	$em->flush();
    
    	return $this->redirect($this->generateUrl('reseau_sousforum_show', array('id' => $sf->getId())));
    }
    
    public function editMessageAction($id = null)
    {
    	$message='';
    	$em = $this->getDoctrine()->getManager();
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Message');
    
    	if (isset($id))
    	{
    		$outil = $repository->find($id);
    		if (!$outil)
    		{
    			$message='Aucun outil trouvé';
    		}
    	}
    	else
    	{
    		$outil = new Message();
    	}
    
    	$form = $this->container->get('form.factory')->create(new MessageType(), $outil);
    
    	$request = $this->container->get('request');
    
    	if ($request->getMethod() == 'POST')
    	{
    		$form->bindRequest($request);
    
    		if ($form->isValid())
    		{
    			$em->persist($outil);
    
    			$em->flush();
    
    			if (isset($id))
    			{
    				$message='Outil modifié avec succès !';
    			}
    			else
    			{
    				$message='Outil ajouté avec succès !';
    			}
    
    			return $this->redirect($this->generateUrl('reseau_sousforum_show', array('id' => $outil->getSousForum()->getId())));
    		}
    	}
    
    	return $this->render('CollectifAdminBundle:message:edit.html.twig', array(
    			'entity' => $outil,
    			'sfId'   => $outil->getSousForum()->getId(),
    			'form'   => $form->createView(),
    	));
    }

}
