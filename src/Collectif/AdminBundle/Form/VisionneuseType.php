<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class VisionneuseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', 'text', array(
            		'label' => 'Titre *'
            	))
           	->add('contenu', 'textarea', array(
            		'label' => 'Description',
            		'required'  => false,
            		'attr' => array(
            				'class' => 'ckeditor'
            		)
            ))
            ->add('file', 'file', array('label' => 'Document *', 'required' => true))
        ;
    }


    public function getName()
    {
        return 'collectif_adminbundle_visionneusetype';
    }
}
