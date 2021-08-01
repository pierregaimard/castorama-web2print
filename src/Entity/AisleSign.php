<?php

namespace App\Entity;

use App\Repository\AilseSignRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AilseSignRepository::class)
 */
class AisleSign extends OrderSign
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $aisle;

    /**
     * @ORM\ManyToOne(targetEntity=AisleSignItem::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $itemOne;

    /**
     * @ORM\ManyToOne(targetEntity=AisleSignItem::class)
     */
    private $itemTwo;

    /**
     * @ORM\ManyToOne(targetEntity=AisleSignItem::class)
     */
    private $itemThree;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAisle(): ?int
    {
        return $this->aisle;
    }

    public function setAisle(int $aisle): self
    {
        $this->aisle = $aisle;

        return $this;
    }

    public function getItemOne(): ?AisleSignItem
    {
        return $this->itemOne;
    }

    public function setItemOne(?AisleSignItem $itemOne): self
    {
        $this->itemOne = $itemOne;

        return $this;
    }

    public function getItemTwo(): ?AisleSignItem
    {
        return $this->itemTwo;
    }

    public function setItemTwo(?AisleSignItem $itemTwo): self
    {
        $this->itemTwo = $itemTwo;

        return $this;
    }

    public function getItemThree(): ?AisleSignItem
    {
        return $this->itemThree;
    }

    public function setItemThree(?AisleSignItem $itemThree): self
    {
        $this->itemThree = $itemThree;

        return $this;
    }
}
