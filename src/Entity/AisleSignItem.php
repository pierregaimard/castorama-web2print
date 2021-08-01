<?php

namespace App\Entity;

use App\Repository\AilseSignItemRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AilseSignItemRepository::class)
 */
class AisleSignItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $label;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $pictoImage;

    /**
     * @ORM\ManyToOne(targetEntity=AisleSignItemCategory::class, inversedBy="items")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getPictoImage(): ?string
    {
        return $this->pictoImage;
    }

    public function setPictoImage(string $pictoImage): self
    {
        $this->pictoImage = $pictoImage;

        return $this;
    }

    public function getCategory(): ?AisleSignItemCategory
    {
        return $this->category;
    }

    public function setCategory(?AisleSignItemCategory $category): self
    {
        $this->category = $category;

        return $this;
    }
}
