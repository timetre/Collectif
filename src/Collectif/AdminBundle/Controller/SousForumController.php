<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Collectif\AdminBundle\Entity\SousForum;
use Collectif\AdminBundle\Form\SousForumType;

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

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SousForum entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CollectifAdminBundle:SousForum:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new SousForum entity.
     *
     */
    public function newAction($type)
    {
        $entity = new SousForum();
        
        $entity->setTypeTopic($type);
        
        if($type == "CONTENU") {
        	$form = $this->container->get('form.factory')->create(new SousForumType(), $entity);
        } else if($type == "LIEN") {
        	$form = $this->container->get('form.factory')->create(new SousForumType(), $entity);
        } else if($type == "BUREAU") {
        	$form = $this->container->get('form.factory')->create(new SousForumType(), $entity);
        } else if($type == "CONTACT") {
        	$form = $this->container->get('form.factory')->create(new SousForumType(), $entity);
        } else if($type == "PARTENAIRES") {
        	$form = $this->container->get('form.factory')->create(new SousForumType(), $entity);
        }
        
        
        //$form   = $this->createForm(new SousForumType(), $entity);

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
}
