<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SousForumRssType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', 'text', array('label' => 'Titre'))
            /*->add('isRss', 'checkbox', array('label' => 'Flux rss ?', 'required'  => false))*/
            ->add('urlFlux', 'text', array('label' => 'URL du flux à suivre', 'required'  => false))
            ->add('description', 'textarea', array(
            		'label' => 'Description',
            		'required'  => false,
            		'attr' => array(
            				'class' => 'ckeditor'
            		)
            ))
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
        return 'collectif_adminbundle_sousforumtype';
    }
}
