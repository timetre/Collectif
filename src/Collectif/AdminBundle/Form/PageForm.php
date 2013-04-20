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
				'attr' => array(
						'class' => 'tinymce',
						'data-theme' => 'advanced' // simple, medium, advanced, bbcode
				)
		));

		$builder->add('actif', 'checkbox', array('required' => false, 'label' => 'Actif'));
		$builder->add('clickable', 'checkbox', array('required' => false, 'label' => 'Page clickable ?'));
		$builder->add('lienRedirectionExterne', 'text', array('required' => false, 'label' => 'Lien de redirection interne'));
		$builder->add('lienRedirectionInterne', 'text', array('required' => false, 'label' => 'Lien de redirection externe'));
		$builder->add('seoDescription', 'text', array('required' => false, 'label' => 'Description SEO'));
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
		
		$builder->add('typePage','choice', array(
				'required' => true,
				'label'    => 'Type de page', 
				'choices' => array(
						'CONTENU' => 'Contenu', 
						'LIEN' => 'Lien de redirection',
						'CONTACT' => 'Contact',
						'BUREAU' => 'Bureau',
						'PARTENAIRES' => 'Partenaires'
				)
		));
    }
	
	public function getName()
	{
		return 'page';
	}
}