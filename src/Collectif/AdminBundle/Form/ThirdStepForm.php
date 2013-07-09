<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ThirdStepForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	        
        $builder->add('contenuPage', 'textarea', array(
				'label' => 'Présentation',
				'required'  => false,
				'attr' => array(
						'class' => 'ckeditor'
				)
		));
        
		$builder->add('file', 'file', array('label' => 'Image de profil', 'required' => false));
		
    }
	
	public function getName()
	{
		return 'membre3';
	}
}