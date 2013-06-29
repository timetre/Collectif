<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Collectif\AdminBundle\Entity\Election;

/**
 * SousForum controller.
 *
 */
class ElectionController extends Controller
{    
    public function voteAction($candidatureId, $vote)
    {
    	$em = $this->getDoctrine()->getManager();
    	$user = $this->container->get('security.context')->getToken()->getUser();
    
    	$candidature = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:Candidature')->find($candidatureId);
    	$election = new Election();
    	$election->setCandidature($candidature);
    	$election->setMembre($candidature->getMembre());
    	$election->setVotant($user);
    	$election->setVote($vote);
    	
    	$em->persist($election);
    	$em->flush();

    	return $this->redirect($this->generateUrl('reseau_sousforum_candidature_show', array('id' => $candidatureId)));

    }
}
