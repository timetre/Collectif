<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PublicationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('resume', 'textarea', array(
					'label' => 'Description',
					'attr' => array(
							'class' => 'tinymce',
							'data-theme' => 'advanced' // simple, medium, advanced, bbcode
					)
			))
            ->add('contenu', 'textarea', array(
					'label' => 'Description',
					'attr' => array(
							'class' => 'tinymce',
							'data-theme' => 'advanced' // simple, medium, advanced, bbcode
					)
			))
            ->add('actif')
            ->add('membre')
			->add('membre','entity', array(
	            'class' => 'Collectif\UserBundle\Entity\User',
	            'property' => 'fullName',
	            'multiple' => false,
	            'required' => true
            ));
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Collectif\AdminBundle\Entity\Publication'
        ));
    }

    public function getName()
    {
        return 'collectif_adminbundle_publicationtype';
    }
}
