<?php

namespace Collectif\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	parent::buildForm($builder, $options);
        $builder->add('nom');
        $builder->add('prenom');
        $builder->add('dateNaissance', 'date', array(
                'widget'    => 'single_text',
                'attr' => array('class' => 'datePicker'),
                'format' => 'dd/MM/yyyy', 
				'input'  => 'datetime',
                'required'  => true));
        
    }

    public function getName()
    {
        return 'collectif_user_registration';
    }
}
