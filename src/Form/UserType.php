<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Имя',
                'constraints' => [
                    new NotBlank(['message' => 'Имя не должно быть пустым'])
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'constraints' => [
                    new NotBlank(['message' => 'Email не должен быть пустым']),
                    new Email(['message' => 'Некорректный email адрес'])
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Пароль',
                'constraints' => [
                    new NotBlank(['message' => 'Пароль не должен быть пустым']),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Пароль должен содержать не менее 6 символов'
                    ])
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Зарегистрироваться'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

