<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MembreForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	        
    	$builder->add('username', 'text', array(
    			'label' => 'Login',
    			'disabled' => true, 
    			'attr' => array('class' => 'test')));
        $builder->add('nom', 'text', array('label' => 'Nom'));
        $builder->add('prenom', 'text', array('label' => 'Prénom'));
		$builder->add('email', 'text', array('label' => 'Email'));
		$builder->add('dateNaissance', 'date', array(
				'label' => 'Date de naissance',
                'widget'    => 'single_text',
                'attr' => array('class' => 'datePicker'),
                'format' => 'dd/MM/yyyy', 
				'input'  => 'datetime',
                'required'  => true));
		$builder->add('membreBureau', 'checkbox', array('required' => false, 'label' => 'Membre du bureau ?'));
		$builder->add('fonctionBureau', 'text', array('label' => 'Fonction au sein du bureau', 'required' => false));
		$builder->add('contenuPage', 'textarea', array(
				'label' => 'Contenu de la page',
				'attr' => array(
						'class' => 'tinymce',
						'data-theme' => 'advanced' // simple, medium, advanced, bbcode
				)
		));
		$builder->add('enabled', 'checkbox', array('required' => false, 'label' => 'Actif'));
		$builder->add('file', 'file', array(
				'required'  => false,
				'label' => 'Image de profil'
            ));

		$builder->add('domaine','entity', array(
	            'class' => 'Collectif\AdminBundle\Entity\Domaine',
	            'property' => 'nom',
	            'multiple' => false,
	            'required' => true,
				'label' => 'Domaine'
            ));
		
		$builder->add('activiteNumerique', 'text', array('label' => 'Activité numérique (site, blog, ...)', 'required' => false));
		$builder->add('lieu', 'text', array('label' => 'Lieu'));
		$builder->add('statut', 'text', array('label' => 'Statut'));
		$builder->add('sujetRecherche', 'text', array('label' => 'Sujet de recherche'));
		$builder->add('structure', 'text', array('label' => 'Structure', 'required' => false));
		
		$builder->add('twitter', 'text', array('label' => 'Compte Twitter', 'required' => false));
		$builder->add('facebook', 'text', array('label' => 'Compte Facebook', 'required' => false));
		$builder->add('googlePlus', 'text', array('label' => 'Compte Google Plus', 'required' => false));
		$builder->add('hypothese', 'text', array('label' => 'Carnet hypothèse', 'required' => false));    }
	
	public function getName()
	{
		return 'membre';
	}
}