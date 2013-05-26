<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MembreRegisterForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	        
    	$builder->add('username', 'text', array('label' => 'Login'));
        $builder->add('plainPassword', 'repeated', array(
        		'label' => 'Mot de passe',
        		'type' => 'password',
        		'required'  => true, 
        		'options' => array('translation_domain' => 'FOSUserBundle'),
        		'first_options' => array('label' => 'form.password'),
        		'second_options' => array('label' => 'form.password_confirmation')));
		$builder->add('nom', 'text', array('label' => 'Nom'));
        $builder->add('prenom', 'text', array('label' => 'Prénom'));
		$builder->add('email', 'text', array('label' => 'Email', 'required' => true));
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
		return 'membre';
	}
}