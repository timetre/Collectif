<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SousForumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('isRss')
            ->add('urlFlux')
            ->add('description')
            ->add('forum','entity', array(
            		'class' => 'Collectif\AdminBundle\Entity\Forum',
            		'property' => 'titre',
            		'multiple' => false,
            		'required' => true
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Collectif\AdminBundle\Entity\SousForum'
        ));
    }

    public function getName()
    {
        return 'collectif_adminbundle_sousforumtype';
    }
}
