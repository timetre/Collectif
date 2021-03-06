<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MembreFormAdd extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	        
    	//$builder->add('username', 'text', array('label' => 'Login'));
    	$builder->add('enabled', 'checkbox', array('required' => false, 'label' => 'Membre actif ?'));
    	$builder->add('email', 'text', array('label' => 'Email'));
        $builder->add('plainPassword', 'repeated', array(
        		'label' => 'Mot de passe',
        		'type' => 'password',
        		'required'  => true, 
        		'options' => array('translation_domain' => 'FOSUserBundle'),
        		'first_options' => array('label' => 'form.password'),
        		'second_options' => array('label' => 'form.password_confirmation')));
		$builder->add('nom', 'text', array('label' => 'Nom'));
        $builder->add('prenom', 'text', array('label' => 'Prénom'));
		
        $builder->add('ordreBureau', 'text', array('label' => 'Ordre du bureau', 'required' => false));	

		$builder->add('membreBureau', 'checkbox', array('required' => false, 'label' => 'Membre du bureau ?'));
		
		$builder->add('fonctionBureau', 'text', array('required' => false, 'label' => 'Fonction au sein du bureau'));
		
		$builder->add('contenuPage', 'textarea', array(
				'label' => 'Présentation',
				'required'  => false,
				'attr' => array(
						'class' => 'ckeditor'
				)
		));
		
		$builder->add('file', 'file', array(
				'required'  => false,
				'label' => 'Image de profil'
            ));

		$builder->add('domaine','entity', array(
				'label' => 'Domaine',
	            'class' => 'Collectif\AdminBundle\Entity\Domaine',
	            'property' => 'nom',
	            'multiple' => false,
	            'required' => true
            ));
        
		
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