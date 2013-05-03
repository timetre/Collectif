<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PartenaireForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	        
        $builder->add('nom');
		$builder->add('lien');
		$builder->add('description');
		$builder->add('file');
		$builder->add('ordre');
    }
	
	public function getName()
	{
		return 'partenaire';
	}
}