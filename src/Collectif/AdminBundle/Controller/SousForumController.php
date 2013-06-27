<?php

namespace Collectif\AdminBundle\Controller;





use Collectif\AdminBundle\Entity\Feed;
use Collectif\AdminBundle\Entity\Outil;
use Collectif\AdminBundle\Entity\Message;
use Collectif\AdminBundle\Entity\Offre;
use Collectif\AdminBundle\Entity\Post;
use Collectif\AdminBundle\Entity\SousForum;
use Collectif\AdminBundle\Entity\Visionneuse;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Collectif\AdminBundle\Form\SousForumType;
use Collectif\AdminBundle\Form\SousForumRssType;
use Collectif\AdminBundle\Form\SousForumOutilsType;
use Collectif\AdminBundle\Form\SousForumStagesType;
use Collectif\AdminBundle\Form\SousForumPdfType;
use Collectif\AdminBundle\Form\PostType;
use Collectif\AdminBundle\Form\MessageType;
use Collectif\AdminBundle\Form\OutilType;
use Collectif\AdminBundle\Form\OffreType;
use Collectif\AdminBundle\Form\FeedType;
use Collectif\AdminBundle\Form\VisionneuseType;



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
        
        $type = $entity->getTypeTopic();
        
        if($type == "CLASSIQUE") {
        	$user = $this->container->get('security.context')->getToken()->getUser();
        	$message = new Message();
        	$message->setSousForum($entity);
        	$message->setMembre($user);
        	$form = $this->createForm(new MessageType(), $message);
        	
	        return $this->render('CollectifAdminBundle:SousForum:show.html.twig', array(
	        		'entity'      => $entity,
	        		'form'	=> $form->createView()
	        ));
	        
        } else if($type == "OUTILS") {
        	$user = $this->container->get('security.context')->getToken()->getUser();
        	$outil = new Outil();
        	$outil->setSousForum($entity);
        	$outil->setMembre($user);
        	$form = $this->createForm(new OutilType(), $outil);
        	
	        return $this->render('CollectifAdminBundle:Outil:show.html.twig', array(
	        		'entity'      => $entity,
	        		'form'	=> $form->createView()
	        ));
	        
        } else if($type == "STAGES") {
        	$user = $this->container->get('security.context')->getToken()->getUser();
        	$offre = new Offre();
        	$offre->setSousForum($entity);
        	$offre->setMembre($user);
        	$form = $this->createForm(new OffreType(), $offre);
        	
	        return $this->render('CollectifAdminBundle:Offre:show.html.twig', array(
	        		'entity'      => $entity,
	        		'form'	=> $form->createView()
	        ));
	        
        } else if($type == "RSS") {
        	$user = $this->container->get('security.context')->getToken()->getUser();
        	$feed = new Feed();
        	$feed->setSousForum($entity);
        	$feed->setMembre($user);
        	$form = $this->createForm(new FeedType(), $feed);
        	
	        return $this->render('CollectifAdminBundle:Rss:show.html.twig', array(
	        		'entity'      => $entity,
	        		'form'	=> $form->createView()
	        ));
	        
        } else if($type == "PDF") {
        	$user = $this->container->get('security.context')->getToken()->getUser();
        	$visionneuse = new Visionneuse();
        	$visionneuse->setSousForum($entity);
        	$visionneuse->setMembre($user);
        	$form = $this->createForm(new VisionneuseType(), $visionneuse);
        	
	        return $this->render('CollectifAdminBundle:Pdf:show.html.twig', array(
	        		'entity'      => $entity,
	        		'form'	=> $form->createView()
	        ));
	        
        } else {
	        
        	$user = $this->container->get('security.context')->getToken()->getUser();
	        $message = new Message();
        	$message->setSousForum($entity);
        	$message->setMembre($user);
        	$form = $this->createForm(new MessageType(), $message);
        	
	        return $this->render('CollectifAdminBundle:SousForum:show.html.twig', array(
	        		'entity'      => $entity,
	        		'form'	=> $form->createView()
	        ));
        }
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
        	$form = $this->container->get('form.factory')->create(new SousForumOutilsType(), $entity);
        } else if($type == "STAGES") {
        	$form = $this->container->get('form.factory')->create(new SousForumStagesType(), $entity);
        } else if($type == "RSS") {
        	$form = $this->container->get('form.factory')->create(new SousForumRssType(), $entity);
        } else if($type == "PDF") {
        	$form = $this->container->get('form.factory')->create(new SousForumPdfType(), $entity);
        }        
        
        return $this->render('CollectifAdminBundle:SousForum:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        	'type'   => $type	
        ));
    }

    /**
     * Creates a new SousForum entity.
     *
     */
    public function createAction(Request $request, $type)
    {
        $entity  = new SousForum();
        
    	if($type == "CLASSIQUE") {
        	$form = $this->createForm(new SousForumType(), $entity);
        } else if($type == "OUTILS") {
        	$form = $this->createForm(new SousForumOutilsType(), $entity);
        } else if($type == "STAGES") {
        	$form = $this->createForm(new SousForumStagesType(), $entity);
        } else if($type == "RSS") {
        	$form = $this->createForm(new SousForumRssType(), $entity);
        } else if($type == "PDF") {
        	$form = $this->createForm(new SousForumPdfType(), $entity);
        } 
        
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setTypeTopic($type);
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
        
        $type = $entity->getTypeTopic();
        
        if($type == "CLASSIQUE") {
        	$editForm = $this->createForm(new SousForumType(), $entity);
        } else if($type == "OUTILS") {
        	$editForm = $this->createForm(new SousForumOutilsType(), $entity);
        } else if($type == "STAGES") {
        	$editForm = $this->createForm(new SousForumStagesType(), $entity);
        } else if($type == "RSS") {
        	$editForm = $this->createForm(new SousForumRssType(), $entity);
        } else if($type == "PDF") {
        	$editForm = $this->createForm(new SousForumPdfType(), $entity);
        } else {
        	$editForm = $this->createForm(new SousForumType(), $entity);
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
