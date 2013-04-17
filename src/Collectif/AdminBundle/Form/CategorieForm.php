<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CategorieForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre');
		$builder->add('description', 'textarea', array(
				'label' => 'Contenu',
				'attr' => array(
						'class' => 'tinymce',
						'data-theme' => 'advanced' // simple, medium, advanced, bbcode
				)
		));
    }
	
	public function getName()
	{
		return 'Categorie';
	}
}