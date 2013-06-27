<?php

namespace Collectif\AdminBundle\Controller;

use Collectif\AdminBundle\Entity\Offre;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Collectif\AdminBundle\Form\OffreType;

/**
 * Offre controller.
 *
 */
class OffreController extends Controller
{
    public function createOffreAction(Request $request, $sfId)
    {
    	$entity  = new Offre();
    	$form = $this->createForm(new OffreType(), $entity);
    	$form->bind($request);
    
    	if (!$form->isValid()) {
    
    		$em = $this->getDoctrine()->getManager();
    
    		$user = $this->container->get('security.context')->getToken()->getUser();
    		$sf = $em->getRepository('CollectifAdminBundle:SousForum')->find($sfId);
    
    		$entity->setMembre($user);
    		$entity->setSousForum($sf);
    
    		$em->persist($entity);
    		$em->flush();
    
    		$offre = new Offre();
    		$offre->setSousForum($sf);
    		$offre->setMembre($user);
    		$form = $this->createForm(new OffreType(), $offre);
    
    		if (!$sf) {
    			throw $this->createNotFoundException('Unable to find Offre entity.');
    		}
    
    		return $this->redirect($this->generateUrl('reseau_sousforum_show', array('id' => $sf->getId())));
    	}
    }
    
    public function showOffreAction($id)
    {
    	
    	$em = $this->getDoctrine()->getManager();
    
    	$entity = $em->getRepository('CollectifAdminBundle:Offre')->find($id);
	
    	return $this->render('CollectifAdminBundle:Offre:detail.html.twig', array(
    		'entity'      => $entity
    	));
    }
    
	public function deleteOffreAction($id)
	{
    	$em = $this->getDoctrine()->getManager();
    	$article = $em->find('CollectifAdminBundle:Offre', $id);
    
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
