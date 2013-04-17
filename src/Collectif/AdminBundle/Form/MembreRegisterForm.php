<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MembreRegisterForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	        
    	$builder->add('username');
        $builder->add('plainPassword', 'repeated', array(
        		'type' => 'password',
        		'required'  => true, 
        		'options' => array('translation_domain' => 'FOSUserBundle'),
        		'first_options' => array('label' => 'form.password'),
        		'second_options' => array('label' => 'form.password_confirmation')));
		$builder->add('nom');
        $builder->add('prenom');
		$builder->add('email');
		$builder->add('dateNaissance', 'date', array(
                'widget'    => 'single_text',
                'attr' => array('class' => 'datePicker'),
                'format' => 'dd/MM/yyyy', 
				'input'  => 'datetime',
                'required'  => true));
    }
	
	public function getName()
	{
		return 'membre';
	}
}