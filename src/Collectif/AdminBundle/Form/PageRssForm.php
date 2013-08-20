<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PageRssForm extends AbstractType
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
		$builder->add('lienRedirectionInterne', 'text', array('label' => 'Lien flux RSS'));

		$builder->add('actif', 'checkbox', array('required' => false, 'label' => 'Actif'));
		
		$builder->add('ordre', 'text', array('required' => false, 'label' => 'Ordre'));
		$builder->add('parent','entity', array(
	            'class' => 'Collectif\AdminBundle\Entity\Page',
	            'property' => 'titre',
	            'multiple' => false,
	            'required' => false, 
				'label' => 'Page parente'
            ));
    }
	
	public function getName()
	{
		return 'page';
	}
}