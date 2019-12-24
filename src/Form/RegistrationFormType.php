<?php

namespace App\Form;

use App\Entity\GgmContact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
            ])
/*
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter nos conditions.',
                    ]),
                ],
            ])
*/
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('nom', TextType::class, [
            ])
            ->add('prenom', TextType::class, [
            ])
            ->add('societe', TextType::class, [
            ])
            ->add('lang', TextType::class, [
            ])
            ->add('telephone', TextType::class, [
            ])
            ->add('gsm', TextType::class, [
            ])
            ->add('siret', TextType::class, [
            ])
            ->add('type_societe', TextType::class, [
            ])
            ->add('cp', TextType::class, [
            ])
            ->add('ville', TextType::class, [
            ])
            ->add('pays', ChoiceType::class, [
                'choices' => [
                    'France' => 'fr',
                    'English' => 'en',
                    'Spanish' => 'es',
                    'Australie' => 'au',
                ],
                'preferred_choices' => ['fr', 'en'],
            ])
            ->add('newsletter', CheckboxType::class, [
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GgmContact::class,
        ]);
    }
}
