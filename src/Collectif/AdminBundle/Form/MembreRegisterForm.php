<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MembreRegisterForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	        
    	//$builder->add('username', 'text', array('label' => 'Login'));
    	$builder->add('email', 'text', array('label' => 'Email *', 'required' => true));
    	
        $builder->add('plainPassword', 'repeated', array(
        		'type' => 'password',
        		'required'  => true, 
        		'options' => array('translation_domain' => 'FOSUserBundle'),
        		'first_options' => array('label' => 'Mot de passe *'),
        		'second_options' => array('label' => 'Confirmation *')));
        
		$builder->add('nom', 'text', array('label' => 'Nom *'));
		
        $builder->add('prenom', 'text', array('label' => 'Prénom *'));
        
        $builder->add('sitePersonnel', 'text', array('label' => 'Site personnel', 'required' => false));
		
        $builder->add('activiteNumerique', 'text', array('label' => 'Carnet de recherche', 'required' => false));
        
        $builder->add('pageStructure', 'text', array('label' => 'Page de la structure', 'required' => false));
		
        $builder->add('lieu', 'text', array('label' => 'Lieu', 'required' => false));
		
        $builder->add('statut', 'text', array('label' => 'Statut', 'required' => false));
        
		$builder->add('sujetRecherche', 'text', array('label' => 'Sujet de recherche', 'required' => false));
		
		$builder->add('twitter', 'text', array('label' => 'Page Twitter', 'required' => false));
		
		$builder->add('facebook', 'text', array('label' => 'Page Facebook', 'required' => false));
		
		
    }
	
	public function getName()
	{
		return 'membre';
	}
}