<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', 'text', array(
            		'label' => 'Titre'
            	))
            ->add('resume', 'textarea', array(
            		'label' => 'Résumé',
            		'attr' => array(
            				'class' => 'full-width'
            		)
            ))
            	
            ->add('contenu', 'textarea', array(
            		'label' => 'Contenu',
            		'required' => false,
            		'attr' => array(
            				'class' => 'ckeditor'
            		)
            ))
        ;
    }


    public function getName()
    {
        return 'collectif_adminbundle_messagetype';
    }
}
