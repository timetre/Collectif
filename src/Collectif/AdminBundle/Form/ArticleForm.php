<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ArticleForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	        
		$builder->add('actif', 'checkbox', array('required' => false, 'label' => 'Actif'));
        $builder->add('titre', 'text', array('label' => 'Titre'));
        $builder->add('datePublication', 'date', array(
	    			'widget'    => 'single_text',
					'label' => 'Date de publication',
	    			'attr' => array('class' => 'datePicker'),
	    			'format' => 'dd/MM/yyyy',
	    			'input'  => 'datetime',
	    			'required'  => true));
        
		$builder->add('resume', 'textarea', array(
				'label' => 'Résumé',
				'required'  => false,
				'attr' => array(
						'class' => 'ckeditor'
				)
		));
		$builder->add('contenu', 'textarea', array(
				'label' => 'Contenu',
				'required'  => false,
				'attr' => array(
						'class' => 'ckeditor'
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