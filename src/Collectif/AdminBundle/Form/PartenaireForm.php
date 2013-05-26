<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PartenaireForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	        
        $builder->add('nom', 'text', array(
        		'label' => 'Nom'
        	)
        );
        $builder->add('lien', 'text', array(
        		'label' => 'Lien'
        	)
        );
        $builder->add('description', 'textarea', array(
        		'label' => 'Description',
        		'required'  => false,
        		'attr' => array(
        				'class' => 'ckeditor'
        		)
        ));
        $builder->add('file', 'file', array(
        		'label' => 'Image', 
        		'required' => false
        	)
        );
        $builder->add('ordre', 'text', array(
        		'label' => 'Ordre'
      		)
        );
        $builder->add('height', 'text', array(
        		'label' => 'Hauteur'
        	)
        );
        $builder->add('width', 'text', array(
        		'label' => 'Largeur'
        	)
        );
        $builder->add('align', 'choice', array(
        		'choices'   => array('left' => 'Gauche', 'center' => 'Milieu'),
        		'label' => 'Alignement principal'
        	)
        );
    }
	
	public function getName()
	{
		return 'partenaire';
	}
}