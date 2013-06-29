<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Collectif\AdminBundle\Entity\Post;
use Collectif\AdminBundle\Form\PostType;

/**
 * Post controller.
 *
 */
class PostController extends Controller
{
	public function createPostAction(Request $request, $sfId)
	{
		$entity  = new Post();
		$form = $this->createForm(new PostType(), $entity);
		$form->bind($request);
	
		if (!$form->isValid()) {
	
			$em = $this->getDoctrine()->getManager();
	
			$user = $this->container->get('security.context')->getToken()->getUser();
			$message = $em->getRepository('CollectifAdminBundle:Message')->find($sfId);
	
			$entity->setMembre($user);
			$entity->setMessage($message);
	
			$em->persist($entity);
			$em->flush();
	
			$post = new Post();
			 
			$post->setMessage($message);
			$post->setMembre($user);
			 
			$form = $this->createForm(new PostType(), $post);
	
			if (!$message) {
				throw $this->createNotFoundException('Unable to find SousForum entity.');
			}
				
			return $this->redirect($this->generateUrl('reseau_sousforum_message_show', array('id' => $message->getId())));
		}
	
		return $this->render('CollectifAdminBundle:Post:new.html.twig', array(
				'entity' => $entity,
				'form'   => $form->createView(),
		));
	}
	
	public function deletePostAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$post = $em->find('CollectifAdminBundle:Post', $id);
    
    	if (!$post)
    	{
    		throw $this->createNotFoundException('Topic [id='.$id.'] inexistant.');
    	}
    	 
    	$msg = $post->getMessage();
    	 
    	$em->remove($post);
    	$em->flush();
    
    	return $this->redirect($this->generateUrl('reseau_sousforum_message_show', array('id' => $msg->getId())));
    }
    
    public function editPostAction($id = null)
    {
    	$message='';
    	$em = $this->getDoctrine()->getManager();
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Post');
    
    	if (isset($id))
    	{
    		$outil = $repository->find($id);
    		if (!$outil)
    		{
    			$message='Aucun commentaire trouvé';
    		}
    	}
    	else
    	{
    		$outil = new Post();
    	}
    
    	$form = $this->container->get('form.factory')->create(new PostType(), $outil);
    
    	$request = $this->container->get('request');
    
    	if ($request->getMethod() == 'POST')
    	{
    		$form->bindRequest($request);
    		
    		//if ($form->isValid())
    		//{
    			$em->persist($outil);
    			$em->flush();
    
    			if (isset($id))
    			{
    				$message='Post modifié avec succès !';
    			}
    			else
    			{
    				$message='Post ajouté avec succès !';
    			}
    
    			return $this->redirect($this->generateUrl('reseau_sousforum_message_show', array('id' => $outil->getMessage()->getId())));
    		//}
    	}
    
    	return $this->render('CollectifAdminBundle:Post:edit.html.twig', array(
    			'entity' => $outil,
    			'sfId'   => $outil->getMessage()->getId(),
    			'form'   => $form->createView(),
    	));
    }
}
