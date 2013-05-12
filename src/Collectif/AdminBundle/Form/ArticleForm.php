<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ArticleForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	        
		$builder->add('actif', 'checkbox', array('required' => false, 'label' => 'Actif'));
        $builder->add('titre', 'text', array('label' => 'Actif'));
		$builder->add('resume', 'textarea', array(
				'label' => 'Résumé',
				'attr' => array(
						'class' => 'tinymce',
						'data-theme' => 'advanced' // simple, medium, advanced, bbcode
				)
		));
		$builder->add('contenu', 'textarea', array(
				'label' => 'Contenu',
				'attr' => array(
						'class' => 'tinymce',
						'data-theme' => 'advanced' // simple, medium, advanced, bbcode
				)
		));
		$builder->add('categorie','entity', array(
	            'class' => 'Collectif\AdminBundle\Entity\Categorie',
	            'property' => 'titre',
	            'multiple' => false,
	            'required' => true,
				'label' => 'Catégorie'
            ));
    }
	
	public function getName()
	{
		return 'article';
	}
}