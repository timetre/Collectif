<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class DomaineForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	        
		$builder->add('actif', 'checkbox', array('required' => false, 'label' => 'Actif'));
        $builder->add('nom', 'text', array('label' => 'Nom'));
        $builder->add('description', 'textarea', array(
        		'label' => 'Description',
        		'required'  => false,
        		'attr' => array(
        				'class' => 'ckeditor'
        		)
        ));
        $builder->add('ordre', 'text', array('label' => 'Ordre'));
		$builder->add('file', 'file', array('label' => 'Bannière'));
    }
	
	public function getName()
	{
		return 'domaine';
	}
}