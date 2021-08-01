<?php

namespace App\Entity;

use App\Repository\SectorSignRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectorSignRepository::class)
 */
class SectorSign extends OrderSign
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=SectorSignItem::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $frontItem;

    /**
     * @ORM\ManyToOne(targetEntity=SectorSignItem::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $backItem;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFrontItem(): ?SectorSignItem
    {
        return $this->frontItem;
    }

    public function setFrontItem(?SectorSignItem $frontItem): self
    {
        $this->frontItem = $frontItem;

        return $this;
    }

    public function getBackItem(): ?SectorSignItem
    {
        return $this->backItem;
    }

    public function setBackItem(?SectorSignItem $backItem): self
    {
        $this->backItem = $backItem;

        return $this;
    }
}
