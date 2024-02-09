<?php

namespace App\Form;

use App\Entity\WeddingPhotoPackages;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use \Symfony\Component\Form\Extension\Core\Type\CollectionType;

class WeddingPhotoPackagesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('weddingPhotoPackageName')
            ->add('WeddingPhotoPackagePrice')
            ->add('weddingPhotoPackageItems', CollectionType::class, [
                'entry_type' => WeddingPhotoPackagesItemsType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => WeddingPhotoPackages::class,
        ]);
    }
}
