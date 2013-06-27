<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FeedType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', 'text', array(
            		'label' => 'Titre'
            	))
        ;
    }


    public function getName()
    {
        return 'collectif_adminbundle_feedtype';
    }
}
