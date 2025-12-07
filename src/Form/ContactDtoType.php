<?php

namespace App\Form;

use App\Dto\ContactDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactDtoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullname', TextType::class, [
                'label' => 'Prénom(s) et Nom',
                'attr' => [
                    'autofocus' => 'autofocus',
                ],
                'constraints' => [
                    new NotBlank(message: 'Ce champ est obligatoire'),
                ],
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new Email(),
                    new NotBlank(message: 'Ce champ est obligatoire'),
                    new Length(min: 2, minMessage: 'Minimum {{ limit }} caractères'),
                ],
            ])
            ->add('subject', TextType::class, [
                'label' => 'Objet',
                'attr' => [
                    'autofocus' => 'autofocus',
                    'placeholder' => 'ex: Demande de partenariat',
                ],
                'constraints' => [
                    new NotBlank(message: 'Ce champ est obligatoire'),
                    new Length(min: 5, minMessage: 'Minimum {{ limit }} caractères'),
                ],
            ])
            ->add('message', TextareaType::class, [
                'attr' => ['rows' => 10],
                'constraints' => [
                    new NotBlank(message: 'Ce champ est obligatoire'),
                    new Length(min: 10, minMessage: 'Votre message doit avoir au moins {{ limit }} caractères'),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactDto::class,
        ]);
    }
}
