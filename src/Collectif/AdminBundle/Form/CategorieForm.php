<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CategorieForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre', 'text', array('label' => 'Titre'));
		$builder->add('description', 'textarea', array(
            		'label' => 'Contenu',
					'required'  => false,
            		'attr' => array(
            				'class' => 'ckeditor'
            		)
            ));
    }
	
	public function getName()
	{
		return 'Categorie';
	}
}