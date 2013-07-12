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
	
    	return $this->render('CollectifAdminBundle:Pdf:detail.html.twig', array(
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
    
    public function editVisionneuseAction($id = null)
    {
    	$message='';
    	$em = $this->getDoctrine()->getManager();
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Visionneuse');
    
    	if (isset($id))
    	{
    		$visionneuse = $repository->find($id);
    		if (!$visionneuse)
    		{
    			$message='Aucun visionneuse trouvé';
    		}
    	}
    	else
    	{
    		$visionneuse = new Visionneuse();
    	}
    
    	$form = $this->container->get('form.factory')->create(new VisionneuseType(), $visionneuse);
    
    	$request = $this->container->get('request');
    
    	if ($request->getMethod() == 'POST')
    	{
    		$form->bindRequest($request);
    
    		if ($form->isValid())
    		{
    			$em->persist($visionneuse);
    
    			$em->flush();
    
    			if (isset($id))
    			{
    				$message='Visionneuse modifié avec succès !';
    			}
    			else
    			{
    				$message='Visionneuse ajouté avec succès !';
    			}
    
    			return $this->redirect($this->generateUrl('reseau_sousforum_show', array('id' => $visionneuse->getSousForum()->getId())));
    		}
    	}
    
    	return $this->render('CollectifAdminBundle:Pdf:edit.html.twig', array(
    			'entity' => $visionneuse,
    			'sfId'   => $visionneuse->getSousForum()->getId(),
    			'form'   => $form->createView(),
    	));
    }
    
	public function createPostAction(Request $request, $id)
    {
    	$entity  = new Post();
    	$form = $this->createForm(new PostType(), $entity);
    	$form->bind($request);
    
    	$em = $this->getDoctrine()->getManager();
    
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	$visionneuse = $em->getRepository('CollectifAdminBundle:Visionneuse')->find($id);
    
    	$entity->setMembre($user);
    	$entity->setVisionneuse($visionneuse);
    
    	$em->persist($entity);
    	$em->flush();
    
    	$post = new Post();
    
    	$entity->setMembre($user);
    	$entity->setVisionneuse($visionneuse);
    
    	$form = $this->createForm(new PostType(), $post);
    
    	return $this->redirect($this->generateUrl('reseau_sousforum_visionneuse_show', array('id' => $visionneuse->getId())));
    }
    
    public function deletePostAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$post = $em->find('CollectifAdminBundle:Post', $id);
    
    	if (!$post)
    	{
    		throw $this->createNotFoundException('Topic [id='.$id.'] inexistant.');
    	}
    
    	$visionneuse = $post->getVisionneuse();
    
    	$em->remove($post);
    	$em->flush();
    
    	return $this->redirect($this->generateUrl('reseau_sousforum_visionneuse_show', array('id' => $visionneuse->getId())));
    }
    
	public function editPostAction($id = null)
    {
    	$message='';
    	$em = $this->getDoctrine()->getManager();
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Post');
    
    	if (isset($id))
    	{
    		$outil = $repository->find($id);
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

    		$em->persist($outil);
    		$em->flush();
    
    		return $this->redirect($this->generateUrl('reseau_sousforum_visionneuse_show', array('id' => $outil->getVisionneuse()->getId())));
    	}
    
    		return $this->render('CollectifAdminBundle:Pdf:editPost.html.twig', array(
    				'entity' => $outil,
    				'sfId'   => $outil->getVisionneuse()->getId(),
    				'form'   => $form->createView(),
    		));
    	}
}
