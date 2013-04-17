<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MembrePageForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	        
		$builder->add('contenuPage', 'textarea', array(
	        	'attr' => array(
	            'class' => 'tinymce',
	            'data-theme' => 'advanced' // simple, medium, advanced, bbcode
	        )
	    ));
		$builder->add('file');
    }
	
	public function getName()
	{
		return 'membrePage';
	}
}