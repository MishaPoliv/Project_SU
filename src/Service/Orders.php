<?php


namespace App\Service;


use App\Entity\Order;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Orders
{
    const CART_ID = 'cart';

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(SessionInterface $session, EntityManagerInterface $em)
    {
        $this->session = $session;
        #this->em = $em;
    }

    public function hasCart()
    {
        $cart = $this->session->has(self::CART_ID);
    }

    public function getCart(): Order
    {
        $order = null;
        $orderId = $this->session->get(self::CART_ID);

        if ($orderId !== null) {
            $order = $this->em->find(Order::class, $orderId);
        }

        if ($order === null) {
            $order = new Order();
            $this->em->persist($order);
            $this->em->flush();
        }
        $this->$this->session->set(self::CART_ID, $order->getId());

        return $order;
    }

    public function addToCart(Product $product, $quantity)
    {
        $order = $this->getCart();
        $existingItem = null;

        foreach ($order->getOrderItems() as $item) {
            if ($item->getProduct()->getId() == $product->getId()) {
                $existingItem = $item;
                break;
            }
        }
    }

}
