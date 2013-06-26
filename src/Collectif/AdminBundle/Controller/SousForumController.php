<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Collectif\AdminBundle\Entity\SousForum;
use Collectif\AdminBundle\Form\SousForumType;
use Collectif\AdminBundle\Form\PostType;
use Collectif\AdminBundle\Entity\Post;

/**
 * SousForum controller.
 *
 */
class SousForumController extends Controller
{
    /**
     * Lists all SousForum entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CollectifAdminBundle:SousForum')->findAll();

        return $this->render('CollectifAdminBundle:SousForum:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a SousForum entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CollectifAdminBundle:SousForum')->find($id);
        
        $user = $this->container->get('security.context')->getToken()->getUser();
        $post = new Post();
        $post->setSousForum($entity);
        $post->setMembre($user);
        $form = $this->createForm(new PostType(), $post);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SousForum entity.');
        }

        return $this->render('CollectifAdminBundle:SousForum:show.html.twig', array(
            'entity'      => $entity,
        	'form'	=> $form->createView()
		));
    }

    /**
     * Displays a form to create a new SousForum entity.
     *
     */
    public function newAction($type)
    {
        $entity = new SousForum();
        
        $entity->setTypeTopic($type);
        
        if($type == "CLASSIQUE") {
        	$form = $this->container->get('form.factory')->create(new SousForumType(), $entity);
        } else if($type == "OUTILS") {
        	$form = $this->container->get('form.factory')->create(new SousForumType(), $entity);
        } else if($type == "STAGES") {
        	$form = $this->container->get('form.factory')->create(new SousForumType(), $entity);
        } else if($type == "RSS") {
        	$form = $this->container->get('form.factory')->create(new SousForumType(), $entity);
        }        
        
        return $this->render('CollectifAdminBundle:SousForum:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new SousForum entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new SousForum();
        $form = $this->createForm(new SousForumType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            //return $this->redirect($this->generateUrl('reseau_sousforum_show', array('id' => $entity->getId())));
            return $this->redirect($this->generateUrl('reseau_sousforum'));
        }

        return $this->render('CollectifAdminBundle:SousForum:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SousForum entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CollectifAdminBundle:SousForum')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SousForum entity.');
        }

        $editForm = $this->createForm(new SousForumType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CollectifAdminBundle:SousForum:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    
    public function beforeAction()
    {
    	 
    	$request = $this->container->get('request');
    
    	if ($request->getMethod() == 'POST')
    	{
    		$type = $request->request->get('type');
    
    		return $this->redirect($this->generateUrl('reseau_sousforum_new', array(
    				'type' => $type
    		)));
    
    	}
    }

    /**
     * Edits an existing SousForum entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CollectifAdminBundle:SousForum')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SousForum entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SousForumType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            //return $this->redirect($this->generateUrl('reseau_sousforum_edit', array('id' => $id)));
            return $this->redirect($this->generateUrl('reseau_sousforum'));
        }

        return $this->render('CollectifAdminBundle:SousForum:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SousForum entity.
     *
     */
    public function deleteAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$article = $em->find('CollectifAdminBundle:SousForum', $id);
    
    	if (!$article)
    	{
    		throw $this->createNotFoundException('Topic [id='.$id.'] inexistant.');
    	}
    
    	$em->remove($article);
    	$em->flush();
    
    
    	return $this->redirect($this->generateUrl('reseau_sousforum'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    public function createPostAction(Request $request, $sfId)
    {
    	$entity  = new Post();
    	$form = $this->createForm(new PostType(), $entity);
    	$form->bind($request);

    	if (!$form->isValid()) {
    		
    		$em = $this->getDoctrine()->getManager();
    		
    		$user = $this->container->get('security.context')->getToken()->getUser();
    		$sf = $em->getRepository('CollectifAdminBundle:SousForum')->find($sfId);
    		
    		$entity->setMembre($user);
    		$entity->setSousForum($sf);
    		
    		$em->persist($entity);
    		$em->flush();
    
    		
        
	        $post = new Post();
	        $post->setSousForum($sf);
	        $post->setMembre($user);
	        $form = $this->createForm(new PostType(), $post);
	
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
}
