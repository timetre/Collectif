<?php

namespace Collectif\GalleryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CollectifGalleryBundle:Default:index.html.twig', array('name' => $name));
    }
}
