<?php

namespace App\Entity;

use App\Repository\WeddingPackageItemsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeddingPackageItemsRepository::class)]
class WeddingPackageItems
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $itemName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItemName(): ?string
    {
        return $this->itemName;
    }

    public function setItemName(string $itemName): static
    {
        $this->itemName = $itemName;

        return $this;
    }
}
