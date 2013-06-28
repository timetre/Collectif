<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Collectif\AdminBundle\Entity\SousForum;
use Collectif\AdminBundle\Form\OutilType;
use Collectif\AdminBundle\Entity\Outil;

/**
 * SousForum controller.
 *
 */
class OutilController extends Controller
{
    public function createOutilAction(Request $request, $sfId)
    {
    	$entity  = new Outil();
    	$form = $this->createForm(new OutilType(), $entity);
    	$form->bind($request);
    
    	if (!$form->isValid()) {
    
    		$em = $this->getDoctrine()->getManager();
    
    		$user = $this->container->get('security.context')->getToken()->getUser();
    		$sf = $em->getRepository('CollectifAdminBundle:SousForum')->find($sfId);
    
    		$entity->setMembre($user);
    		$entity->setSousForum($sf);
    
    		$em->persist($entity);
    		$em->flush();
    
    		$outil = new Outil();
    		$outil->setSousForum($sf);
    		$outil->setMembre($user);
    		$form = $this->createForm(new OutilType(), $outil);
    
    		if (!$sf) {
    			throw $this->createNotFoundException('Unable to find SousForum entity.');
    		}
    
    		return $this->redirect($this->generateUrl('reseau_sousforum_show', array('id' => $sf->getId())));
    	}
    }
    
    public function showOutilAction($id)
    {
    	
    	$em = $this->getDoctrine()->getManager();
    
    	$entity = $em->getRepository('CollectifAdminBundle:Outil')->find($id);

    	$user = $this->container->get('security.context')->getToken()->getUser();
    	$post = new Post();
    	$post->setOutil($entity);
    	$post->setMembre($user);
    	$form = $this->createForm(new PostType(), $post);
	
    	return $this->render('CollectifAdminBundle:Outil:show.html.twig', array(
    		'entity'      => $entity,
    		'form'	=> $form->createView()
    	));
    }
    
	public function deleteOutilAction($id)
	{
    	$em = $this->getDoctrine()->getManager();
    	$article = $em->find('CollectifAdminBundle:Outil', $id);
    
    	if (!$article)
    	{
    		throw $this->createNotFoundException('Topic [id='.$id.'] inexistant.');
    	}
    	
    	$sf = $article->getSousForum();
    	
    	$em->remove($article);
    	$em->flush();
    
    	return $this->redirect($this->generateUrl('reseau_sousforum_show', array('id' => $sf->getId())));
    }
    
    public function editOutilAction($id = null)
    {
    	$message='';
    	$em = $this->getDoctrine()->getManager();
    	$repository = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Outil');
    
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
    		$outil = new Outil();
    	}
    
    	$form = $this->container->get('form.factory')->create(new OutilType(), $outil);
    
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
    
    	return $this->render('CollectifAdminBundle:Outil:edit.html.twig', array(
    			'entity' => $outil,
    			'sfId'   => $outil->getSousForum()->getId(),
    			'form'   => $form->createView(),
    	));
    }
}
