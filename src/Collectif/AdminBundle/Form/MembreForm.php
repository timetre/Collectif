<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MembreForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	        
    	$builder->add('username', 'text', array(
    			'disabled' => true, 
    			'attr' => array('class' => 'test')));
        $builder->add('nom');
        $builder->add('prenom');
		$builder->add('email');
		$builder->add('dateNaissance', 'date', array(
                'widget'    => 'single_text',
                'attr' => array('class' => 'datePicker'),
                'format' => 'dd/MM/yyyy', 
				'input'  => 'datetime',
                'required'  => true));
		$builder->add('membreBureau', 'checkbox', array('required' => false));
		$builder->add('fonctionBureau');
		$builder->add('contenuPage', 'textarea', array(
				'label' => 'Description',
				'attr' => array(
						'class' => 'tinymce',
						'data-theme' => 'advanced' // simple, medium, advanced, bbcode
				)
		));
		$builder->add('actif', 'checkbox', array('required' => false));
		$builder->add('file');

		$builder->add('domaine','entity', array(
	            'class' => 'Collectif\AdminBundle\Entity\Domaine',
	            'property' => 'nom',
	            'multiple' => false,
	            'required' => true
            ));
    }
	
	public function getName()
	{
		return 'membre';
	}
}