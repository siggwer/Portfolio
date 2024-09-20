<?php

declare(strict_types=1);

namespace App\UI\Form;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use App\Domain\Dto\ContactDto;

class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'name',
                TextType::class,
                [
                'label' => 'votre nom :',
                'attr' => array(
                   'placeholder' => 'Votre nom ',
                ),
                ]
            )
            ->add(
                'email',
                EmailType::class,
                [
                'label' => 'votre email :',
                'attr' => array(
                   'placeholder' => 'Votre email ',
                ),
                ]
            )
            ->add(
                'subject',
                TextType::class,
                [
                'label' => 'Sujet :',
                'attr' => array(
                   'placeholder' => 'Indiquez un sujet ',
                ),
                ]
            )
            ->add(
                'message',
                TextareaType::class,
                [
                'label' => 'votre message :',
                'attr' => array(
                   'placeholder' => 'Ecrivez votre message',
                ),
                ]
            );
    }

    /**
     * @param OptionsResolver $resolver
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
                'data_class' => ContactDTO::class,
            ]
        );
    }
}
