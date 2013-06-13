<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MonCvForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', 'text', array('label' => 'Titre du CV'))
            ->add('langue', 'choice', array(
            		'label' => 'Langue', 
            		'choices'   => array(
            				'FR'   => 'Français',
            				'EN' => 'English',
            				//'SP'   => 'Spanish',
            				//'DE'   => 'Deutsch'
            		),
            		'multiple'  => false 
            ))
            ->add('file', 'file', array('label' => 'Cv'));
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Collectif\AdminBundle\Entity\MonCv'
        ));
    }

    public function getName()
    {
        return 'collectif_adminbundle_moncvtype';
    }
}
