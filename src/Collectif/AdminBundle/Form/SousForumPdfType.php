<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SousForumPdfType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', 'text', array('label' => 'Titre'))

            ->add('forum','entity', array(
            		'label' => 'Forum parent',
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
        return 'collectif_adminbundle_sousforumpdftype';
    }
}
