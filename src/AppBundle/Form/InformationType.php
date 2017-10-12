<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InformationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('employerId')
            ->add('informationIm')
            ->add('informationCorp')
            ->add('informationGrade')
            ->add('informationIndice')
            ->add('informationEmploiOccuper')
            ->add('informationFormation')
            ->add('informationFonction')
            ->add('informationStatut')
            ->add('informationTitreHonorifique')
            ->add('informationQualiteDiplome')
            ->add('informationClasse')
            ->add('informationEchelon')
            ->add('informationCategorie')
            ->add('informationDateEffet')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Information'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_information';
    }


}
