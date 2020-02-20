<?php

namespace App\Form;

use App\Entity\GgmContact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GgmContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('nom')
            ->add('prenom')
            ->add('societe')
            ->add('typeSociete')
            ->add('fonction')
            ->add('siret')
            ->add('telephone')
            ->add('gsm')
            ->add('rue1')
            ->add('cp')
            ->add('ville')
            ->add('pays')
            //->add('pass')
            ->add('lang')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GgmContact::class,
        ]);
    }
}
