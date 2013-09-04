<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Collectif\AdminBundle\Entity\Candidature;
use Collectif\AdminBundle\Entity\Election;
use Collectif\AdminBundle\Form\PostType;
use Collectif\AdminBundle\Entity\Post;

/**
 * Candidature controller.
 *
 */
class CandidatureController extends Controller
{
   
    public function showCandidatureAction($id)
    {
        $em = $this->getDoctrine()->getManager();
    
        $entity = $em->getRepository('CollectifAdminBundle:Candidature')->find($id);
        
        $electionPour = $em->getRepository('CollectifAdminBundle:Election')->getVotes($entity->getMembre()->getId(), true);
        $electionContre = $em->getRepository('CollectifAdminBundle:Election')->getVotes($entity->getMembre()->getId(), false);

        $user = $this->container->get('security.context')->getToken()->getUser();
        $post = new Post();
        $post->setCandidature($entity);
        $post->setMembre($user);
        $form = $this->createForm(new PostType(), $post);
        
        $vote = $em->getRepository('CollectifAdminBundle:Election')->dejaVote($user->getId(), $entity->getId());
        
        
        $cvList = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:MonCv')->getCvFR($entity->getMembre());
        if(sizeof($cvList) > 0) {
            $monCvId = $cvList[0]->getId();
        }
                
        if (isset($monCvId))
        {
            $cv = $this->getDoctrine()->getManager()->getRepository('CollectifAdminBundle:MonCv')->find($monCvId);
        } else {
            $cv = null; 
        }
    
        return $this->render('CollectifAdminBundle:Candidatures:detail.html.twig', array(
            'entity'      => $entity,
            'cv'        => $cv,
            'pour'  => $electionPour,
            'contre' => $electionContre,
            'form'  => $form->createView(), 
            'dejaVote' => $vote
        ));
    }
    
    public function createPostAction(Request $request, $id)
    {
        $entity  = new Post();
        $form = $this->createForm(new PostType(), $entity);
        $form->bind($request);
    
        $em = $this->getDoctrine()->getManager();
    
        $user = $this->container->get('security.context')->getToken()->getUser();
        $candidature = $em->getRepository('CollectifAdminBundle:Candidature')->find($id);
    
        $entity->setMembre($user);
        $entity->setCandidature($candidature);
    
        $em->persist($entity);
        $em->flush();
    
        $post = new Post();
    
        $entity->setMembre($user);
        $entity->setCandidature($candidature);
    
        $form = $this->createForm(new PostType(), $post);
    
        return $this->redirect($this->generateUrl('reseau_sousforum_candidature_show', array('id' => $candidature->getId())));
    }
    
    public function deletePostAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->find('CollectifAdminBundle:Post', $id);
    
        if (!$post)
        {
            throw $this->createNotFoundException('Topic [id='.$id.'] inexistant.');
        }
    
        $msg = $post->getCandidature();
    
        $em->remove($post);
        $em->flush();
    
        return $this->redirect($this->generateUrl('reseau_sousforum_candidature_show', array('id' => $msg->getId())));
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
    
            return $this->redirect($this->generateUrl('reseau_sousforum_candidature_show', array('id' => $outil->getCandidature()->getId())));
            }
    
            return $this->render('CollectifAdminBundle:Post:edit.html.twig', array(
                    'entity' => $outil,
                    'sfId'   => $outil->getCandidature()->getId(),
                    'form'   => $form->createView(),
            ));
        }
    
}
