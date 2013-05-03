<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ParametersForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	        
    	$builder->add('nomSite');
		$builder->add('proprietaireSite');
		$builder->add('adresseSite');
		$builder->add('mailSite');
		$builder->add('telephoneSite');
		$builder->add('faxSite');
		//$builder->add('logoSite');
		$builder->add('lienFacebook');
		$builder->add('lienTwitter');
		$builder->add('contactInfos');
    }
	
	public function getName()
	{
		return 'parameters';
	}
}