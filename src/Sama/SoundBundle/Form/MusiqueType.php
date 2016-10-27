<?php

namespace Sama\SoundBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MusiqueType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('auteur')
            ->add('album')
            ->add('photo')
            ->add('sortie')
            ->add('useruser')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sama\SoundBundle\Entity\Musique'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sama_soundbundle_musique';
    }
}
