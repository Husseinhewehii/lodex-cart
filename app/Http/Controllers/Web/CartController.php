<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\BaseController;
use App\Models\BranchProduct;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CartController extends BaseController
{
    public function index()
    {
        return view('web.cart.index');
    }

    public function addToCart($id)
    {
        $product = BranchProduct::find($id);

        if(!$product) {
            return response(['success' => true], Response::HTTP_NOT_FOUND);
        }
        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                $id => [
                    "id" => $product->id,
                    "name" => $product->product->name,
                    "quantity" => 1,
                    "price" => $product->finalPriceAfterDiscount,
                    "image" => count($product->product->images) ? asset($product->product->images[0]->image) : null
                ]
            ];
            session()->put('cart', $cart);

            return response(['success' => true, 'product' => $cart[$id]], Response::HTTP_OK);
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return response(['success' => true, 'product' => $cart[$id]], Response::HTTP_OK);
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id" => $product->id,
            "name" => $product->product->name,
            "quantity" => 1,
            "price" => $product->finalPriceAfterDiscount,
            "image" => count($product->product->images) ? asset($product->product->images[0]->image) : null
        ];
        session()->put('cart', $cart);

        return response(['success' => true, 'product' => $cart[$id]], Response::HTTP_OK);
    }

    public function updateCart(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            return response(['success' => true], Response::HTTP_OK);
        }
    }

    public function removeFromCart(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            return response(['success' => true], Response::HTTP_OK);
        }
    }
}
