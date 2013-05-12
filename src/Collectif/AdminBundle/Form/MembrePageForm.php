<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MembrePageForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	        
		$builder->add('contenuPage', 'textarea', array(
				'label' => 'Contenu de la page',
	        	'attr' => array(
	            'class' => 'tinymce',
	            'data-theme' => 'advanced' // simple, medium, advanced, bbcode
	        )
	    ));
		$builder->add('file', 'file', array('label' => 'Image de profil', 'required' => false));
		
		$builder->add('twitter', 'text', array('label' => 'Compte Twitter', 'required' => false));
		$builder->add('facebook', 'text', array('label' => 'Compte Facebook', 'required' => false));
		$builder->add('googlePlus', 'text', array('label' => 'Compte Google Plus', 'required' => false));
		$builder->add('hypothese', 'text', array('label' => 'Carnet hypothèse', 'required' => false));
    }
	
	public function getName()
	{
		return 'membrePage';
	}
}