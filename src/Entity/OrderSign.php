<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass()
 */
abstract class OrderSign
{
    /**
     * @ORM\Column(type="smallint")
     */
    protected int $quantity;

    /**
     * @ORM\ManyToOne(targetEntity=OrderSignStatus::class)
     * @ORM\JoinColumn(nullable=false)
     */
    protected OrderSignStatus $status;

    /**
     * @ORM\ManyToOne(targetEntity=Order::class, inversedBy="items")
     * @ORM\JoinColumn(nullable=false)
     */
    private $shopOrder;

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return OrderSignStatus
     */
    public function getStatus(): OrderSignStatus
    {
        return $this->status;
    }

    /**
     * @param OrderSignStatus $status
     */
    public function setStatus(OrderSignStatus $status): void
    {
        $this->status = $status;
    }

    public function getShopOrder(): ?Order
    {
        return $this->shopOrder;
    }

    public function setShopOrder(?Order $shopOrder): self
    {
        $this->shopOrder = $shopOrder;

        return $this;
    }
}
