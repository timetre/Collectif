<?php

namespace Collectif\GalleryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AlbumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('actif', 'checkbox', array('required' => false, 'label' => 'Actif'))
            ->add('titre', 'text', array('required' => false, 'label' => 'Titre'))
            ->add('description', 'textarea', array(
                'label' => 'Description',
                'required'  => false,
                'attr' => array(
                        'class' => 'ckeditor'
                )))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Collectif\GalleryBundle\Entity\Album'
        ));
    }

    public function getName()
    {
        return 'collectif_gallerybundle_albumtype';
    }
}
