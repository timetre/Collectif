<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MembreCompteForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	        
    	$builder->add('email', 'text', array('label' => 'Email'));
    	
    	$builder->add('plainPassword', 'repeated', array(
    			'label' => 'Mot de passe',
    			'type' => 'password',
    			'required'  => false,
    			'options' => array('translation_domain' => 'FOSUserBundle'),
    			'first_options' => array('label' => 'form.password'),
    			'second_options' => array('label' => 'form.password_confirmation')));
    	
    	$builder->add('nom', 'text', array('label' => 'Nom'));
    	
    	$builder->add('prenom', 'text', array('label' => 'Prénom'));
    	
    	$builder->add('telephone', 'text', array('label' => 'Téléphone', 'required' => false));
    	
    	$builder->add('lieu', 'text', array('label' => 'Lieu', 'required' => false));
    	
    	$builder->add('statut', 'text', array('label' => 'Statut', 'required' => false));

    }
    
	public function getName()
	{
		return 'membre';
	}
}