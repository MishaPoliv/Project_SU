<?php

namespace App\Controller;

use App\Entity\Product;
use App\Service\Orders;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OrderController extends Controller
{
    /**
     * @Route("/cart/add/{id}/{quantity}", name="order_add_to_cart")
     */
    public function addToCart(
        Orders $orders,
        Request $request,
        Product $product,
        $quantity = 1)
    {
        $orders->addToCart($product, $quantity);


        return $this->redirect($request->headers->get('referer', '/'));

    }

    /**
    * @param Orders $orders
    * @return \Symfony\Component\HttpFoundation\Response
    *
    * @Route("/cart", name="show_cart")
    */
    public function cart(Orders $orders)
    {
        $cart = $orders->getCart();

        return $this->render('order/cart.html.twig',[
                'cart' => $cart]);
    }

}
