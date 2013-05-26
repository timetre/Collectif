<?php

namespace Collectif\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PublicationOwnForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', 'text', array('label' => 'Titre'))
            ->add('resume', 'textarea', array(
            		'label' => 'Résumé',
            		'required'  => false,
            		'attr' => array(
            				'class' => 'ckeditor'
            		)
            ))
		    ->add('contenu', 'textarea', array(
		    		'label' => 'Contenu',
		    		'required'  => false,
		    		'attr' => array(
		    				'class' => 'ckeditor'
		    		)
		    ))
	    	->add('datePublication', 'date', array(
	    			'label' => 'Date de publication',
	    			'widget'    => 'single_text',
	    			'attr' => array('class' => 'datePicker'),
	    			'format' => 'dd/MM/yyyy',
	    			'input'  => 'datetime',
	    			'required'  => true))
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
