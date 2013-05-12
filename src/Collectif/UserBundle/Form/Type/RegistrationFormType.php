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
        $builder->add('dateNaissance', 'date', array(
        		'label' => 'Date de naissance',
                'widget'    => 'single_text',
                'attr' => array('class' => 'datePicker'),
                'format' => 'dd/MM/yyyy', 
				'input'  => 'datetime',
                'required'  => true));
        
        $builder->add('contenuPage', 'textarea', array('label' => 'Présentation'));
        
        $builder->add('activiteNumerique', 'text', array('label' => 'Activité numérique (site, blog, ...)', 'required' => false));
        $builder->add('lieu', 'text', array('label' => 'Lieu'));
        $builder->add('statut', 'text', array('label' => 'Statut'));
        $builder->add('sujetRecherche', 'text', array('label' => 'Sujet de recherche'));
        $builder->add('structure', 'text', array('label' => 'Structure', 'required' => false));
        
        $builder->add('twitter', 'text', array('label' => 'Compte Twitter', 'required' => false));
        $builder->add('facebook', 'text', array('label' => 'Compte Facebook', 'required' => false));
        $builder->add('googlePlus', 'text', array('label' => 'Compte Google Plus', 'required' => false));
        $builder->add('hypothese', 'text', array('label' => 'Carnet hypothèse', 'required' => false));
        
    }

    public function getName()
    {
        return 'collectif_user_registration';
    }
}
