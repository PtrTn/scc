<?php

declare(strict_types=1);

namespace App\FormType;

use App\Entity\ParticipationRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ParticipationRequestFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'firstName',
                TextType::class,
                [
                    'label' => 'Voornaam',
                    'required' => true,
                    'attr' => [
                        'placeholder' => 'Vul hier uw voornaam in'
                    ]
                ]
            )
            ->add(
                'lastName',
                TextType::class,
                [
                    'label' => 'Achternaam',
                    'required' => true,
                    'attr' => [
                        'placeholder' => 'Vul hier uw achternaam in'
                    ]
                ]
            )
            ->add(
                'participationDate',
                DateType::class,
                [
                    'label' => 'Datum',
                    'widget' => 'single_text',
                    'html5' => false,
                    'attr' => [
                        'class' => 'datepicker',
                        'placeholder' => 'Kies de gewenste datum'
                    ],
                ]
            )
            ->add(
                'phoneNumber',
                NumberType::class,
                [
                    'label' => '(Mobiel) nummer',
                    'required' => false,
                    'attr' => [
                        'placeholder' => 'Vul hier uw (mobiele) nummer in'
                    ]
                ]
            )
            ->add(
                'email',
                EmailType::class,
                [
                    'label' => 'E-mailadres',
                    'required' => true,
                    'attr' => [
                        'placeholder' => 'Vul hier uw E-mailadres in'
                    ]
                ]
            )
            ->add(
                'message',
                TextareaType::class,
                [
                    'label' => 'Opmerking',
                    'attr' => [
                        'placeholder' => 'Vul hier uw opmerking in'
                    ],
                    'required' => false,
                ]
            )
            ->add(
                'submit',
                SubmitType::class,
                [
                    'label' => 'Ik doe mee',
                    'attr' => [
                        'class' => 'button button--red hvr-float-shadow'
                    ]
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ParticipationRequest::class,
        ]);
    }
}
