<?php 

namespace App\EasyAdmin\Fields;

use App\Form\WeddingPhotoPackagesType;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

final class CustomCollectionField implements FieldInterface
{
    use FieldTrait;

    public static function new(string $propertyName, ?string $label = null): self
    {
        return (new self())
            ->setProperty($propertyName)
            ->setLabel($label)
            ->setTemplateName('admin/fields/custom_collection.html.twig')
            ->setCustomOptions([
                'entry_type' => CollectionType::class, // Nastavíme typ položek v kolekci na váš formulář
                'entry_options' => [], // Možné další možnosti
            ]);
    }
}
