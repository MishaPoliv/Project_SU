<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderItemRepository")
 */
class OrderItem
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Product;

    /**
     * @ORM\Column(type="integer")
     */
    private $Quantity;

    /**
     * @ORM\Column(type="integer")
     */
    private $PriceProduct;

    /**
     * @ORM\Column(type="integer")
     */
    private $PriceAllProduct;

    /**
         * @var Order
         *
         * @ORM\ManyToOne(targetEntity="App\Entity\Order", inversedBy="orderItems")
         * @ORM\JoinColumn(nullable=true)
         */
    private $orders;


    public function getId()
    {
        return $this->id;
    }

    public function getProduct(): ?string
    {
        return $this->Product;
    }

    public function setProduct(string $Product): self
    {
        $this->Product = $Product;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->Quantity;
    }

    public function setQuantity(int $Quantity): self
    {
        $this->Quantity = $Quantity;

        return $this;
    }

    public function getPriceProduct(): ?int
    {
        return $this->PriceProduct;
    }

    public function setPriceProduct(int $PriceProduct): self
    {
        $this->PriceProduct = $PriceProduct;

        return $this;
    }

    public function getPriceAllProduct(): ?int
    {
        return $this->PriceAllProduct;
    }

    public function setPriceAllProduct(int $PriceAllProduct): self
    {
        $this->PriceAllProduct = $PriceAllProduct;

        return $this;
    }

    public function getOrders(): ?Order
    {
        return $this->orders;
    }

    public function setOrders(?Order $orders): self
    {
        $this->orders = $orders;

        return $this;
    }

}
