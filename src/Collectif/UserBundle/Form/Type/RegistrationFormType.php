<?php

namespace Collectif\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	parent::buildForm($builder, $options);
        $builder->add('nom', 'text', array('label' => 'Nom'));
        $builder->add('prenom', 'text', array('label' => 'Prénom'));
        
        $builder->add('contenuPage', 'textarea', array(
        		'label' => 'Présentation',
        		'required'  => false,
        		'attr' => array(
        				'class' => 'ckeditor'
        		)
        ));
        
        $builder->add('activiteNumerique', 'text', array('label' => 'Activité numérique (site, blog, ...)', 'required' => false));
        $builder->add('lieu', 'text', array('label' => 'Lieu'));
        $builder->add('statut', 'text', array('label' => 'Statut'));
        $builder->add('sujetRecherche', 'text', array('label' => 'Sujet de recherche'));
        $builder->add('structure', 'text', array('label' => 'Structure', 'required' => false));
        
        $builder->add('twitter', 'text', array('label' => 'Compte Twitter', 'required' => false));
        $builder->add('facebook', 'text', array('label' => 'Compte Facebook', 'required' => false));
        $builder->add('hypothese', 'text', array('label' => 'Carnet de recherche', 'required' => false));
        
    }

    public function getName()
    {
        return 'collectif_user_registration';
    }
}
