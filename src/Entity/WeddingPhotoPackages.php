<?php

namespace App\Entity;

use App\Repository\WeddingPhotoPackagesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeddingPhotoPackagesRepository::class)]
class WeddingPhotoPackages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $packageName = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $packageItems = [];

    #[ORM\Column]
    private ?float $packagePrice = null;

    private $myCustomField;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPackageName(): ?string
    {
        return $this->packageName;
    }

    public function setPackageName(string $packageName): static
    {
        $this->packageName = $packageName;

        return $this;
    }

    public function getPackageItems(): array
    {
        return $this->packageItems;
    }

    public function setPackageItems(array $packageItems): static
    {
        $this->packageItems = $packageItems;

        return $this;
    }

    public function getPackagePrice(): ?float
    {
        return $this->packagePrice;
    }

    public function setPackagePrice(float $packagePrice): static
    {
        $this->packagePrice = $packagePrice;

        return $this;
    }

    public function getMyCustomField()
    {
        return $this->myCustomField;
    }

    public function setMyCustomField($value)
    {
        $this->myCustomField = $value;
    }
}
