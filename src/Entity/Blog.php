<?php

namespace App\Entity;

use App\Repository\BlogRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BlogRepository::class)]
class Blog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    #[Assert\NotBlank(message: "Saisissez un titre")]
    #[Assert\Type(type: "string", message: "Veuillez saisir du text")]
    private $title;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank(message: "Saisissez un contenu")]
    #[Assert\Length(
              min : 5,
              minMessage : "Votre contenu doit faire minimum 5 caracteres",
         )]
    private $content;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $coverImage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCoverImage(): ?string
    {
        return $this->coverImage;
    }

    public function setCoverImage(?string $coverImage): self
    {
        $this->coverImage = $coverImage;

        return $this;
    }
}
