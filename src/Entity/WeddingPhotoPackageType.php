<?php

namespace App\Entity;

use App\Repository\WeddingPhotoPackageTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeddingPhotoPackageTypeRepository::class)]
class WeddingPhotoPackageType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $weddingPhotoPackageName = null;

    #[ORM\OneToMany(mappedBy: 'weddingPhotoPackageType', targetEntity: WeddingPhotoPackages::class, cascade: ["persist"])]
    private Collection $weddingPhotoPackages;

    public function __construct()
    {
        $this->weddingPhotoPackages = new ArrayCollection();
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
     * @return Collection<int, WeddingPhotoPackages>
     */
    public function getWeddingPhotoPackages(): Collection
    {
        return $this->weddingPhotoPackages;
    }

    public function addWeddingPhotoPackage(WeddingPhotoPackages $weddingPhotoPackage): static
    {
        if (!$this->weddingPhotoPackages->contains($weddingPhotoPackage)) {
            $this->weddingPhotoPackages->add($weddingPhotoPackage);
            $weddingPhotoPackage->setWeddingPhotoPackageType($this);
        }

        return $this;
    }

    public function removeWeddingPhotoPackage(WeddingPhotoPackages $weddingPhotoPackage): static
    {
        if ($this->weddingPhotoPackages->removeElement($weddingPhotoPackage)) {
            // set the owning side to null (unless already changed)
            if ($weddingPhotoPackage->getWeddingPhotoPackageType() === $this) {
                $weddingPhotoPackage->setWeddingPhotoPackageType(null);
            }
        }

        return $this;
    }
}
