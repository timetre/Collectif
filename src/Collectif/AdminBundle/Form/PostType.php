<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('contenu')
            ->add('dateCreation')
            ->add('membre')
            ->add('sousForum','entity', array(
            		'class' => 'Collectif\AdminBundle\Entity\SousForum',
            		'property' => 'titre',
            		'multiple' => false,
            		'required' => true
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Collectif\AdminBundle\Entity\Post'
        ));
    }

    public function getName()
    {
        return 'collectif_adminbundle_posttype';
    }
}