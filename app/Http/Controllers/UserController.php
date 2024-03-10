<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteFromCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Requests\UserIdRequest;
use App\Models\CartElement;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View {
        $user = \Auth::user();
        $orders = Order::all()->where('user_id', $user->id);

        return \view('user.dashboard', ['user' => $user, 'orders'=> $orders]);
    }

    public function cart(): View {
        $user = \Auth::user();
        $cart = ProductUtils::getCartOrCreate($user->id);
        $elements = CartElement::where(['cart_id' => $cart->id])->get();
        $products = Product::whereIn('id', $elements->pluck('product_id'))->get();

        return \view('user.cart', ['elements' => $elements, 'products' => $products]);
    }

    public function updateCart(UpdateCartRequest $req): RedirectResponse
    {
        $data = $req->validated();

        $user = \Auth::user();
        $cart = ProductUtils::getCartOrCreate($user->id);

        $element = CartElement::where(['cart_id' => $cart->id, 'product_id' => $data['product_id']])->first();
        if($element) {
           $element->update(['quantity' => isset($data['setQuantity']) && $data['setQuantity'] ? $data['quantity'] : $element->quantity+$data['quantity']]);
        } else {
            CartElement::create([
                'cart_id' => $cart->id,
                'product_id' => $data['product_id'],
                'quantity' => $data['quantity'],
            ]);
        }

        return isset($data['goto']) && $data['goto'] ? to_route('user.cart.index') : to_route('product.show', ['id' => $req->get('product_id')]);
    }



    public function deleteFromCart(DeleteFromCartRequest $req): RedirectResponse
    {
        $data = $req->validated();

        $user = \Auth::user();

        $cart = ProductUtils::getCartOrCreate($user->id);

        $element = CartElement::where([
           'cart_id' => $cart->id,
            'product_id' => $data['product_id'],
        ])->first();

        if($element === null) {
            return back()->withErrors([
                'error' => 'We do not found any of this article on your cart.'
            ])->setStatusCode(204);
        }

        $element->forceDelete();

        return to_route('user.cart.index')->setStatusCode(200);
    }

    public function edit(UserIdRequest $req) {
        $id = $req->validated()['id'];
        $user = \Auth::user();
        return \view('auth.edit', ['user' => User::find($id)->first(), 'adminPage' => ($user->isAdmin() && $id != $user->id)]);
    }
}
