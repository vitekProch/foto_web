<?php

namespace App\Entity;

use App\Repository\PeopleReviewsRepository;
use Doctrine\Entity;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeopleReviewsRepository::class)]
class PeopleReviews
{
    const UPLOAD_IMAGE_DIRECTORY = 'uploads/reviews';
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $reviewPath = null;

    #[ORM\Column(length: 255)]
    private ?string $reviewAlt = null;

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

    public function getReviewPath(): ?string
    {
        return $this->reviewPath;
    }

    public function setReviewPath(string $reviewPath): static
    {
        $this->reviewPath = $reviewPath;

        return $this;
    }

    public function getReviewAlt(): ?string
    {
        return $this->reviewAlt;
    }

    public function setReviewAlt(string $reviewAlt): static
    {
        $this->reviewAlt = $reviewAlt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }
    public function setReviewPathFile($reviewAlt): static
    {
        return $this->setReviewPath($reviewAlt[0]);
    }

    public function getReviewPathFile(): ?string
    {
        return $this->getReviewPath();
    }

    public function upload($file, $uniqueImageName)
    {

        $file->move(
            self::UPLOAD_IMAGE_DIRECTORY,
            $uniqueImageName
        );

    }
    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
