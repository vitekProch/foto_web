<?php

namespace App\Entity;

use App\Repository\WeddingPhotoPackagesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeddingPhotoPackagesRepository::class)]
class WeddingPhotoPackages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $weddingPhotoPackageName = null;

    #[ORM\OneToMany(mappedBy: 'weddingPhotoPackages', targetEntity: WeddingPhotoPackageItems::class, cascade: ["persist"])]
    private Collection $weddingPhotoPackageItems;

    #[ORM\Column]
    private ?int $WeddingPhotoPackagePrice = null;

    #[ORM\ManyToOne(inversedBy: 'weddingPhotoPackages')]
    private ?WeddingPhotoPackageType $weddingPhotoPackageType = null;

    public function __construct()
    {
        $this->weddingPhotoPackageItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeddingPhotoPackageName(): ?string
    {
        return $this->weddingPhotoPackageName;
    }

    public function setWeddingPhotoPackageName(string $weddingPhotoPackageName): static
    {
        $this->weddingPhotoPackageName = $weddingPhotoPackageName;

        return $this;
    }

    /**
     * @return Collection<int, WeddingPhotoPackageItems>
     */
    public function getWeddingPhotoPackageItems(): Collection
    {
        return $this->weddingPhotoPackageItems;
    }

    public function addWeddingPhotoPackageItem(WeddingPhotoPackageItems $weddingPhotoPackageItem): static
    {
        if (!$this->weddingPhotoPackageItems->contains($weddingPhotoPackageItem)) {
            $this->weddingPhotoPackageItems->add($weddingPhotoPackageItem);
            $weddingPhotoPackageItem->setWeddingPhotoPackages($this);
        }

        return $this;
    }

    public function removeWeddingPhotoPackageItem(WeddingPhotoPackageItems $weddingPhotoPackageItem): static
    {
        if ($this->weddingPhotoPackageItems->removeElement($weddingPhotoPackageItem)) {
            // set the owning side to null (unless already changed)
            if ($weddingPhotoPackageItem->getWeddingPhotoPackages() === $this) {
                $weddingPhotoPackageItem->setWeddingPhotoPackages(null);
            }
        }

        return $this;
    }

    public function getWeddingPhotoPackagePrice(): ?int
    {
        return $this->WeddingPhotoPackagePrice;
    }

    public function setWeddingPhotoPackagePrice(int $WeddingPhotoPackagePrice): static
    {
        $this->WeddingPhotoPackagePrice = $WeddingPhotoPackagePrice;

        return $this;
    }

    public function getWeddingPhotoPackageType(): ?WeddingPhotoPackageType
    {
        return $this->weddingPhotoPackageType;
    }

    public function setWeddingPhotoPackageType(?WeddingPhotoPackageType $weddingPhotoPackageType): static
    {
        $this->weddingPhotoPackageType = $weddingPhotoPackageType;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getWeddingPhotoPackageName();
    }
}
