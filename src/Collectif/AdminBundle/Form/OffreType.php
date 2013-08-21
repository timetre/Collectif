<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre', 'text', array(
            		'label' => 'Titre'
            	));
         $builder->add('resume', 'textarea', array(
            			'label' => 'Résumé', 
         				'required' => false
            	));
         $builder->add('contenu', 'textarea', array(
         		'label' => 'Contenu',
         		'required' => false,
         		'attr' => array(
         				'class' => 'ckeditor'
         		)
         ));
         $builder->add('entreprise', 'text', array(
         		'label' => 'Société/Université'
         ));
         /*$builder->add('ville', 'text', array(
         		'label' => 'Ville',
         		'required' => false
         ));*/
         $builder->add('contrat', 'text', array(
         		'label' => 'Type de contrat',
         		'required' => false
         ));
         /*$builder->add('salaire', 'text', array(
         		'label' => 'Salaire',
         		'required' => false
         ));*/
         $builder->add('duree', 'text', array(
         		'label' => 'Durée',
         		'required' => false
         ));
         $builder->add('contact', 'text', array(
         		'label' => 'Contact',
         		'required' => false
         ));
    }


    public function getName()
    {
        return 'collectif_adminbundle_offretype';
    }
}
