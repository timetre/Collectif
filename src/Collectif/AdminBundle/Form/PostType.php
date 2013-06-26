<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contenu', 'textarea', array(
            		'label' => 'Poster un commentaire',
            		'attr' => array(
						'class' => 'full-width'
					)
            	))
            /*->add('dateCreation', 'text', array('label' => 'Date de création'))
            ->add('membre', 'text', array('label' => 'Membre'))
            ->add('sousForum','entity', array(
            		'class' => 'Collectif\AdminBundle\Entity\SousForum',
            		'label' => 'Sous forum',
            		'property' => 'titre',
            		'multiple' => false,
            		'required' => true
            ))*/
        ;
    }


    public function getName()
    {
        return 'collectif_adminbundle_posttype';
    }
}
