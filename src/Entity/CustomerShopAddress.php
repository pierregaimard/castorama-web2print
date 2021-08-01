<?php

namespace App\Entity;

use App\Repository\CustomerShopAddressRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerShopAddressRepository::class)
 */
class CustomerShopAddress
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="integer")
     */
    private $postalCode;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $city;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $deliveryInfo;

    /**
     * @ORM\OneToOne(targetEntity=CustomerShop::class, inversedBy="Address", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $customerShop;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postalCode;
    }

    public function setPostalCode(int $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getDeliveryInfo(): ?string
    {
        return $this->deliveryInfo;
    }

    public function setDeliveryInfo(?string $deliveryInfo): self
    {
        $this->deliveryInfo = $deliveryInfo;

        return $this;
    }

    public function getCustomerShop(): ?CustomerShop
    {
        return $this->customerShop;
    }

    public function setCustomerShop(CustomerShop $customerShop): self
    {
        $this->customerShop = $customerShop;

        return $this;
    }
}
