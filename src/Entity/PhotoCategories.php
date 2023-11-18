<?php

namespace App\Entity;

use App\Repository\PhotoCategoriesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotoCategoriesRepository::class)]
class PhotoCategories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $categoryName = null;

    #[ORM\Column(length: 255)]
    private ?string $categoryPhotoName = null;

    #[ORM\Column]
    private \DateTimeImmutable $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    public function setCategoryName(string $categoryName): static
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    public function getCategoryPhotoName(): ?string
    {
        return $this->categoryPhotoName;
    }
    public function getCategoryPhotoPath(): ?string
    {
        return '/uploads/categories/' . $this->categoryPhotoName;
    }
    public function setCategoryPhotoName(string $categoryPhotoName): static
    {
        $this->categoryPhotoName = $categoryPhotoName;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
