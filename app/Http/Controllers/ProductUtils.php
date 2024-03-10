<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartElement;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductUtils
{
    public static function getCartOrCreate(int $user_id): Cart
    {
        $cart = Cart::where(['user_id' => $user_id])->first();
        if (!$cart) {
            // User does not have a cart, start creating one
            $cart = Cart::create([
                'user_id' => $user_id,
            ]);
        }
        return $cart;
    }

    public static function getCartOrNull(int $user_id): Cart|null
    {
        return Cart::where(['user_id' => $user_id])->first();
    }

    public static function getCartElements(int $cart_id): \Illuminate\Database\Eloquent\Collection|array
    {
        return \App\Models\CartElement::where(['cart_id' => $cart_id])->get();
    }

    public static function checkDisponibilities(Collection $elements): int|null {
        foreach($elements as $element) {
            $p = Product::find($element->product_id);
            $q = $p->quantity-$element->quantity;
            if($q < 0) {
                return $element->id;
            }
        }
        return null;
    }

    public static function createOrderedItemsFromCartElements(Collection $elements, int $order_id): bool|null
    {
        $products = Product::whereIn('id', $elements->pluck('product_id'));

        foreach($elements as $element) {
            $p = $products->find($element->product_id);
            $q = $p->quantity-$element->quantity;
            if($q < 0) {
                return false;
            }

            $p->update(['quantity' => $q]);

            \App\Models\OrderedItem::create([
                'product_id' => $element->product_id,
                'order_id' => $order_id,
                'quantity' => $element->quantity,
                'price' => $p->price,
            ]);

            $element->forceDelete();
        }

        return true;
    }

    public static function calcTotalPrice(Collection $elements, Collection $products): float
    {
        $price = 0.0;
        foreach($elements as $element) {
            $price += $products->find($element->product_id)->price*$element->quantity;
        }
        return $price;
    }
}
