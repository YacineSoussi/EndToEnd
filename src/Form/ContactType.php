<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\Email;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length(['min' => 3]),
                    new Email()
                ],
                'attr' => [
                    'required' => false,
                    'placeholder' => 'Entrez votre email.'
                ]
                
            ])
            ->add('subject', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length(['max' => 100]),
                ],
                'attr' => [
                    'required' => false,
                    'placeholder' => 'Entrez le sujet de votre demande.'
                ]
            ])
            ->add('content', TextareaType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length(['min' => 5]),
                ],
                'attr' => [
                    'required' => false,
                    'rows' => 3,
                    'placeholder' => 'Entrez votre demande, nous vous repondrons dans les plus brefs delais.'
                ]
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
