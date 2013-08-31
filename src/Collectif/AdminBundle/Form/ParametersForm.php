<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ParametersForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	        
    	$builder->add('nomSite', 'text', array('label' => 'Nom du site'));
		$builder->add('proprietaireSite', 'text', array('label' => 'Propriétair du site'));
		$builder->add('adresseSite', 'text', array('label' => 'Adresse'));
		$builder->add('mailSite', 'text', array('label' => 'Email principal'));
		$builder->add('mailDebugger', 'text', array('label' => 'Email Débugger'));
		$builder->add('telephoneSite', 'text', array('label' => 'Tél.'));
		$builder->add('faxSite', 'text', array('label' => 'Fax'));
		//$builder->add('logoSite');
		$builder->add('lienFacebook', 'text', array('label' => 'Facebook'));
		$builder->add('lienTwitter', 'text', array('label' => 'Twitter'));
		$builder->add('contactInfos', 'text', array('label' => 'Adresse mail de contact'));
		$builder->add('debugger', 'checkbox', array('required' => false, 'label' => 'Activer le "Bug tracker"'));

		$builder->add('texteAccueil', 'textarea', array(
				'label' => 'Texte accueil',
				'required'  => false,
				'attr' => array(
						'class' => 'ckeditor'
				)
		));
    }
	
	public function getName()
	{
		return 'parameters';
	}
}