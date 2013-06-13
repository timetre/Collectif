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
        		'label' => 'Login',
    			'disabled' => true, 
    			'attr' => array('class' => 'test')));
        $builder->add('plainPassword', 'repeated', array(
        		'type' => 'password',
        		'label' => 'Mot de passe',
        		'required'  => false, 
        		'options' => array('translation_domain' => 'FOSUserBundle'),
        		'first_options' => array('label' => 'form.password'),
        		'second_options' => array('label' => 'form.password_confirmation'),
        ));
        $builder->add('nom', 'text', array('label' => 'Nom'));
        $builder->add('prenom', 'text', array('label' => 'Prénom'));
		$builder->add('email', 'text', array('label' => 'Email'));
		$builder->add('telephone', 'text', array('label' => 'Téléphone', 'required' => false));
    }

    public function getName()
    {
        return 'collectif_user_profile';
    }
}
