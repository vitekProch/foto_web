<?php

namespace App\Entity;

use App\Repository\WeddingPhotoPackageItemsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeddingPhotoPackageItemsRepository::class)]
class WeddingPhotoPackageItems
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $weddingPhotoPackageItemName = null;

    #[ORM\ManyToOne(inversedBy: 'weddingPhotoPackageItems')]
    private ?WeddingPhotoPackages $weddingPhotoPackages = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeddingPhotoPackageItemName(): ?string
    {
        return $this->weddingPhotoPackageItemName;
    }

    public function setWeddingPhotoPackageItemName(string $weddingPhotoPackageItemName): static
    {
        $this->weddingPhotoPackageItemName = $weddingPhotoPackageItemName;

        return $this;
    }

    public function getWeddingPhotoPackages(): ?WeddingPhotoPackages
    {
        return $this->weddingPhotoPackages;
    }

    public function setWeddingPhotoPackages(?WeddingPhotoPackages $weddingPhotoPackages): static
    {
        $this->weddingPhotoPackages = $weddingPhotoPackages;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getWeddingPhotoPackageItemName();
    }
}
