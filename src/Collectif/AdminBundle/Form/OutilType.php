<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class OutilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', 'text', array(
            		'label' => 'Titre'
            	))
            ->add('file', 'file', array(
            		'required'  => false,
            		'label' => 'Image'
            ))
            ->add('contenu', 'textarea', array(
            		'label' => 'Description'
            ))
            ->add('lien', 'text', array(
            		'label' => "Lien vers l'outil"
            ))
        ;
    }


    public function getName()
    {
        return 'collectif_adminbundle_outiltype';
    }
}
