<?php

namespace Collectif\GalleryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Collectif\GalleryBundle\Entity\Album;
use Collectif\GalleryBundle\Entity\Photo;
use Collectif\GalleryBundle\Form\AlbumType;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOException;

use Symfony\Component\Finder\Finder;

/**
 * Album controller.
 *
 */
class AlbumController extends Controller
{
    /**
     * Lists all Album entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CollectifGalleryBundle:Album')->findAll();

        return $this->render('CollectifGalleryBundle:Album:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Album entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Album();
        $form = $this->createForm(new AlbumType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $fs = new Filesystem();
            $url = $entity->getUploadRootDir();

            try {
                $fs->mkdir($url);
            } catch (IOException $e) {
                echo "An error occured while creating your directory";
            }

            return $this->redirect($this->generateUrl('album'));
        }

        return $this->render('CollectifGalleryBundle:Album:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Album entity.
     *
     */
    public function newAction()
    {
        $entity = new Album();
        $form   = $this->createForm(new AlbumType(), $entity);

        return $this->render('CollectifGalleryBundle:Album:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Album entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CollectifGalleryBundle:Album')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Album entity.');
        }


        $path = $entity->getUploadRootDir();
        
        return $this->render('CollectifGalleryBundle:Album:show.html.twig', array(
            'entity'      => $entity,
            'path'      => $path
       ));
    }

    /**
     * Displays a form to edit an existing Album entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CollectifGalleryBundle:Album')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Album entity.');
        }

        $editForm = $this->createForm(new AlbumType(), $entity);

        return $this->render('CollectifGalleryBundle:Album:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView()
        ));
    }

    /**
     * Edits an existing Album entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CollectifGalleryBundle:Album')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Album entity.');
        }

        $editForm = $this->createForm(new AlbumType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('album'));
        }

        return $this->render('CollectifGalleryBundle:Album:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView()
        ));
    }

    /**
     * Deletes a Album entity.
     *
     */

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->find('CollectifGalleryBundle:Album', $id);
        $url = $entity->getUploadRootDir();
        if (!$entity)
        {
            throw $this->createNotFoundException('Album[id='.$id.'] inexistant.');
        }
        
        $em->remove($entity);
        $em->flush();
        
        $fs = new Filesystem();
        
        try {
            $fs->remove($url);
        } catch (IOException $e) {
            echo "An error occured while removing your directory";
        }

        return $this->redirect($this->generateUrl('album'));
    }

    public function deletePhotoAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->find('CollectifGalleryBundle:Photo', $id);
        $url = $entity->getAlbum()->getUploadRootDir().'/'.$entity->getPath();

        $album = $entity->getAlbum();

        if (!$entity)
        {
            throw $this->createNotFoundException('Album[id='.$id.'] inexistant.');
        }
        
        $em->remove($entity);
        $em->flush();
        
        $fs = new Filesystem();
        
        try {
            $fs->remove($url);
        } catch (IOException $e) {
            echo "An error occured while removing your directory";
        }

        return $this->redirect($this->generateUrl('album_show', array('id' => $album->getId())));
    }

    public function savePhotosAction(Request $request, $id) {
        //http://symfony.com/fr/doc/current/components/finder.html
        $em = $this->getDoctrine()->getManager();
        $entity = $em->find('CollectifGalleryBundle:Album', $id);
        $url = $entity->getUploadRootDir();
        $fs = new Filesystem();

        $finder = new Finder();
        $finder->files()->in($url);
        $finder->sortByName();

        $repository = $this->getDoctrine()->getManager()->getRepository('CollectifGalleryBundle:Photo');

        foreach ($finder as $file) {
            $photo = new Photo();
            $filename = $this->clear_str($file->getRelativePathname());

            if(!$repository->isAlreadyInAlbum($entity->getId(), $filename)) {
                $newFileName = sha1(uniqid(mt_rand(), true));
                $extension = substr($filename, strrpos($filename, "."));

                $newFileName = $newFileName.$extension;

                $toRename = $url.'/'.$file->getRelativePathname();

                if($toRename !== $newFileName) 
                    $fs->rename($toRename, $url.'/'.$newFileName);

                $photo->setTitre($newFileName);
                $photo->setAlbum($entity);
                $photo->setPath($newFileName);

                //die;
                $em->persist($photo);
                $em->flush();
            }
            // affiche le chemin absolu
            //print "1." . $file->getRealpath()."<br/>";
            // affiche le chemin relatif du fichier
            //print "3." . $file->getRelativePathname()."<br/>";
        }

        return $this->redirect($this->generateUrl('album_show', array('id' => $entity->getId())));
    }


    private function clear_str($text, $separator = '-', $charset = 'utf-8') {
        // Pour l'encodage
        $text = mb_convert_encoding($text,'HTML-ENTITIES',$charset);
        $text = strtolower(trim($text));
        // On vire les accents
        $text = preg_replace(   array('/ß/','/&(..)lig;/', '/&([aouAOU])uml;/','/&(.)[^;]*;/'),
                array('ss',"$1","$1".'e',"$1"),
                $text);
        // on vire tout ce qui n'est pas alphanumérique
        $text_clear = preg_replace("[^a-z0-9_-]",' ',trim($text));// ^a-zA-Z0-9_-
        // Nettoyage pour un espace maxi entre les mots
        $array = explode(' ', $text_clear);
        $str = '';
        $i = 0;
        foreach($array as $cle=>$valeur){
             
            if(trim($valeur) != '' AND trim($valeur) != $separator AND $i > 0)
                $str .= $separator.$valeur;
            elseif(trim($valeur) != '' AND trim($valeur) != $separator AND $i == 0)
            $str .= $valeur;
             
            $i++;
    
        }
    
        //on renvoie la chaîne transformée
        return $str;
    
    }
}
