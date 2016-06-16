<?php

namespace Craigslist\MainBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PostAdvertisement
 * @package Craigslist\MainBundle\Form
 */
class PostAdvertisement extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'attr' => [
                    'class' => 'form-control',
                ],
            ))
            ->add('description', TextType::class, array(
                'attr' => [
                    'class' => 'form-control',
                ],
            ))
            ->add('category', EntityType::class, array(
                'label' => ' ',
                'class' => 'CraigslistMainBundle:Category',
                'expanded' => false,
                'multiple' => false,
                'attr' => [
                    'class' => 'form-control input-sm pull-right',
                ],
            ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Craigslist\MainBundle\Entity\Advertisement',
            'allow_extra_fields' => true,
            'attr' => ['class' => 'form-horizontal', 'role' => 'form'],
        ));
    }
}
