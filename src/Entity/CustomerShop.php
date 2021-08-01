<?php

namespace App\Entity;

use App\Repository\CustomerShopRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerShopRepository::class)
 */
class CustomerShop
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $code;

    /**
     * @ORM\OneToOne(targetEntity=CustomerShopAddress::class, mappedBy="customerShop", cascade={"persist", "remove"})
     */
    private $Address;

    /**
     * @ORM\OneToMany(targetEntity=Order::class, mappedBy="shop")
     */
    private $orders;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="customerShop", cascade={"persist", "remove"})
     */
    private $user;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getAddress(): ?CustomerShopAddress
    {
        return $this->Address;
    }

    public function setAddress(CustomerShopAddress $Address): self
    {
        // set the owning side of the relation if necessary
        if ($Address->getCustomerShop() !== $this) {
            $Address->setCustomerShop($this);
        }

        $this->Address = $Address;

        return $this;
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->setShop($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getShop() === $this) {
                $order->setShop(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setCustomerShop(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getCustomerShop() !== $this) {
            $user->setCustomerShop($this);
        }

        $this->user = $user;

        return $this;
    }
}
