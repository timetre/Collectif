<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class DomaineForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	        
		$builder->add('actif', 'checkbox', array('required' => false));
        $builder->add('nom');
		$builder->add('description', 'textarea', array(
				'label' => 'Description',
				'attr' => array(
						'class' => 'tinymce',
						'data-theme' => 'advanced' // simple, medium, advanced, bbcode
				)
		));
        $builder->add('ordre', 'text');
		$builder->add('file');
    }
	
	public function getName()
	{
		return 'domaine';
	}
}