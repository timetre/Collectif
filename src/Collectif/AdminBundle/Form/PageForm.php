<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PageForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	        
    	$builder->add('titre', 'text', array('label' => 'Titre de la page', 'attr' => array('size' => "250")));
		$builder->add('texteMenu', 'text', array('label' => 'Texte du menu'));
		$builder->add('contenu', 'textarea', array(
				'label' => 'Contenu',
				'required'  => false,
				'attr' => array(
						'class' => 'ckeditor'
				)
		));

		$builder->add('actif', 'checkbox', array('required' => false, 'label' => 'Actif'));
		$builder->add('clickable', 'checkbox', array('required' => false, 'label' => 'Page clickable ?'));
		$builder->add('ordre', 'text', array('required' => false, 'label' => 'Ordre'));
		$builder->add('parent','entity', array(
	            'class' => 'Collectif\AdminBundle\Entity\Page',
	            'property' => 'titre',
	            'multiple' => false,
	            'required' => false, 
				'label' => 'Page parente'
            ));
		$builder->add('categorie','entity', array(
	            'class' => 'Collectif\AdminBundle\Entity\Categorie',
	            'property' => 'titre',
	            'multiple' => false,
	            'required' => false,
				'label'    => 'Articles du groupe'
            ));
    }
	
	public function getName()
	{
		return 'page';
	}
}