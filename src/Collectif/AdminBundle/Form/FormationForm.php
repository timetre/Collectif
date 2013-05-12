<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FormationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ecole', 'text', array('label' => 'Ecole'))
            ->add('dateDebut', 'date', array(
            		'widget'    => 'single_text',
            		'label' => 'Date de début',
            		'attr' => array('class' => 'datePicker'),
            		'format' => 'dd/MM/yyyy',
            		'input'  => 'datetime',
            		'required'  => true))
           ->add('dateFin', 'date', array(
           			'widget'    => 'single_text',
           			'label' => 'Date de fin',
           			'attr' => array('class' => 'datePicker'),
           			'format' => 'dd/MM/yyyy',
           			'input'  => 'datetime',
           			'required'  => false))
            ->add('diplome', 'text', array('label' => 'Diplôme'))
            ->add('domaineEtude', 'text', array('label' => "Domaine d'étude"))
            ->add('resultat', 'text', array('label' => 'Résultats'))
            ->add('activites', 'textarea', array('label' => 'Activités et associations'))
            ->add('description', 'textarea', array('label' => 'Description'))
            ->add('ordre', 'text', array('label' => 'Ordre'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Collectif\AdminBundle\Entity\Formation'
        ));
    }

    public function getName()
    {
        return 'collectif_adminbundle_formationtype';
    }
}
