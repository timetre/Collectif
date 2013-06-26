<?php

namespace Collectif\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use APY\DataGridBundle\Grid\Source\Entity;

use Collectif\AdminBundle\Entity\Forum;
use Collectif\AdminBundle\Form\ForumType;


/**
 * Forum controller.
 *
 */
class ForumController extends Controller
{
    /**
     * Lists all Forum entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $source = new Entity('CollectifAdminBundle:Forum');
        $grid = $this->get('grid');
        $grid->setSource($source);
        $grid->isReadyForRedirect();
        $entities = $em->getRepository('CollectifAdminBundle:Forum')->findAll();

        return $this->render('CollectifAdminBundle:Forum:index.html.twig', array(
            'entities' => $entities,
        	'grid' => $grid
        ));
    }

    /**
     * Finds and displays a Forum entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CollectifAdminBundle:Forum')->find($id);
        
        

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Forum entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CollectifAdminBundle:Forum:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView()
		));
    }

    /**
     * Displays a form to create a new Forum entity.
     *
     */
    public function newAction()
    {
        $entity = new Forum();
        $form   = $this->createForm(new ForumType(), $entity);

        return $this->render('CollectifAdminBundle:Forum:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Forum entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Forum();
        $form = $this->createForm(new ForumType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            //return $this->redirect($this->generateUrl('reseau_forum_show', array('id' => $entity->getId())));
            return $this->redirect($this->generateUrl('reseau_forum'));
        }

        return $this->render('CollectifAdminBundle:Forum:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Forum entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CollectifAdminBundle:Forum')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Forum entity.');
        }

        $editForm = $this->createForm(new ForumType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CollectifAdminBundle:Forum:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Forum entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CollectifAdminBundle:Forum')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Forum entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ForumType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            
            return $this->redirect($this->generateUrl('reseau_forum'));
            //return $this->redirect($this->generateUrl('reseau_forum_edit', array('id' => $id)));
        }

        return $this->render('CollectifAdminBundle:Forum:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Forum entity.
     *
     */
    /*public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CollectifAdminBundle:Forum')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Forum entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('reseau_forum'));
    }
    */
    public function deleteAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$article = $em->find('CollectifAdminBundle:Forum', $id);
    	 
    	if (!$article)
    	{
    		throw $this->createNotFoundException('Forum[id='.$id.'] inexistant.');
    	}
    	 
    	$em->remove($article);
    	$em->flush();
    	 
    	 
    	return $this->redirect($this->generateUrl('reseau_forum'));
    }

	private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    public function navigationAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$forums = $em->getRepository('CollectifAdminBundle:Forum')->findAll();
    	return $this->render(
            'CollectifAdminBundle:Forum:navigation.html.twig', array('forums' => $forums));
    }
}
