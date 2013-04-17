<?php

namespace Collectif\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class ProfileFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('username', 'text', array(
    			'disabled' => true, 
    			'attr' => array('class' => 'test')));
        $builder->add('plainPassword', 'repeated', array(
        		'type' => 'password',
        		'required'  => false, 
        		'options' => array('translation_domain' => 'FOSUserBundle'),
        		'first_options' => array('label' => 'form.password'),
        		'second_options' => array('label' => 'form.password_confirmation'),
        ));
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
        return 'collectif_user_profile';
    }
}
