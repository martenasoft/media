<?php

namespace MartenaSoft\Media\Form;

use MartenaSoft\Media\Entity\MediaConfig;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediaConfigFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("name")
            ->add('sdnUrl')
            ->add('sdnUrlForDev')
            ->add('rootDir')
            ->add('siteDir')
            ->add('realSizeDirName')
            ->add('bigSizeDirName')
            ->add('middleSizeDirName')
            ->add('smallSizeDirName')
            ->add('bigSizeWidth')
            ->add('bigSizeHeight')
            ->add('middleSizeWidth')
            ->add('middleSizeHeight')
            ->add('smallSizeWidth')
            ->add('smallSizeHeight')
            ->add('realSizeWatermarkDirName')
            ->add('bigSizeWatermarkDirName')
            ->add('middleSizeWatermarkDirName')
            ->add('smallSizeWatermarkDirName')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => MediaConfig::class
            ]
        );
    }
}