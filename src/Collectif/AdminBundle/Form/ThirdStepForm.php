<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ThirdStepForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	        
        $builder->add('sitePersonnel', 'text', array('label' => 'Site personnel', 'required' => false));
		
        $builder->add('activiteNumerique', 'text', array('label' => 'Carnet de recherche', 'required' => false));
       
        $builder->add('sujetRecherche', 'text', array('label' => 'Sujet de recherche', 'required' => false));
		
		$builder->add('twitter', 'text', array('label' => 'Page Twitter', 'required' => false));
		
		$builder->add('facebook', 'text', array('label' => 'Page Facebook', 'required' => false));
		
    }
	
	public function getName()
	{
		return 'membre3';
	}
}