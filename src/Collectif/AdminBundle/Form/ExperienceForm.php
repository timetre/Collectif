<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ExperienceForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', 'text', array('label' => 'Intitulé du poste'))
            ->add('lieu', 'text', array('label' => 'Lieu'))
            ->add('entreprise', 'text', array('label' => 'Entreprise'))
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
            ->add('description', 'textarea', array(
            		'label' => 'Description',
            		'required'  => false,
            		'attr' => array(
            				'class' => 'ckeditor'
            		)
            ))
            ->add('ordre', 'text', array('label' => 'Ordre'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Collectif\AdminBundle\Entity\Experience'
        ));
    }

    public function getName()
    {
        return 'collectif_adminbundle_experiencetype';
    }
}
