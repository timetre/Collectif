<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FirstStepForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	        
    	$builder->add('email', 'text', array('label' => 'Email *', 'required' => true));
    	
        $builder->add('plainPassword', 'repeated', array(
        		'type' => 'password',
        		'required'  => true, 
        		'options' => array('translation_domain' => 'FOSUserBundle'),
        		'first_options' => array('label' => 'Mot de passe *'),
        		'second_options' => array('label' => 'Confirmation *')));
        
		$builder->add('nom', 'text', array('label' => 'Nom *'));
		
        $builder->add('prenom', 'text', array('label' => 'Prénom *'));
        
        $builder->add('pageStructure', 'text', array('label' => 'Page de la structure', 'required' => false));
		
        $builder->add('lieu', 'text', array('label' => "Lieu (usage réservé à l'administration, ne sera pas mis en ligne)", 'required' => false));
		
        $builder->add('statut', 'text', array('label' => 'Statut (doctorant / docteur / postdoc / maître de conférence / etc.) ', 'required' => false));
        
		$builder->add('sujetRecherche', 'text', array('label' => 'Sujet de recherche', 'required' => false));
		
    }
	
	public function getName()
	{
		return 'membre1ststep';
	}
}