<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $DateCreation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $StatusId;

    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $StatusPayment;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $UserId;

    /**
     * @ORM\Column(type="integer")
     */
    private $OrderPrice;

    /**
         * @var OrderItem[]
         *
         * @ORM\OneToMany(targetEntity="App\Entity\OrderItem", mappedBy="orderItem")
         */
    private $orderItems;

    public function __construct()
    {
        $this->StatusPayment = 'new';
        $this->StatusId = false;
        $this->orderItems = new ArrayCollection();
    }


    public function getId()
    {
        return $this->id;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->DateCreation;
    }

    public function setData(\DateTimeInterface $DateCreation): self
    {
            $this->DateCreation = $DateCreation;

            return $this;
    }

    public function getStatusId(): ?string
    {
        return $this->StatusId;
    }

    public function setStatusId(string $StatusId): self
    {
        $this->StatusId = $StatusId;

        return $this;
    }

    public function getStatusPayment(): ?bool
    {
        return $this->StatusPayment;
    }

    public function setStatusPayment(bool $StatusPayment): self
    {
        $this->StatusPayment = $StatusPayment;

        return $this;
    }

    public function getUserId(): ?string
    {
        return $this->UserId;
    }

    public function setUserId(string $UserId): self
    {
        $this->UserId = $UserId;

        return $this;
    }

    public function getOrderPrice(): ?int
    {
        return $this->OrderPrice;
    }

    public function setOrderPrice(int $OrderPrice): self
    {
        $this->OrderPrice = $OrderPrice;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->DateCreation;
    }

    public function setDateCreation(\DateTimeInterface $DateCreation): self
    {
        $this->DateCreation = $DateCreation;

        return $this;
    }

    /**
     * @return Collection|OrderItem[]
     */
    public function getOrderItems(): Collection
    {
        return $this->orderItems;
    }

    public function addOrderItem(OrderItem $orderItem): self
    {
        if (!$this->orderItems->contains($orderItem)) {
            $this->orderItems[] = $orderItem;
            $orderItem->setOrderItem($this);
        }

        return $this;
    }

    public function removeOrderItem(OrderItem $orderItem): self
    {
        if ($this->orderItems->contains($orderItem)) {
            $this->orderItems->removeElement($orderItem);
            // set the owning side to null (unless already changed)
            if ($orderItem->getOrderItem() === $this) {
                $orderItem->setOrderItem(null);
            }
        }

        return $this;
    }

}
