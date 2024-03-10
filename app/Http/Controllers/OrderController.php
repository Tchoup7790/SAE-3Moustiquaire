<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\PaymentRequest;
use App\Models\Address;
use App\Models\CartElement;
use App\Models\Order;
use App\Models\OrderedItem;
use App\Models\Payment;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View | RedirectResponse{
        $user = \Auth::user();
        $cart = ProductUtils::getCartOrNull($user->id);
        $elements = CartElement::where(['cart_id' => $cart->id])->get();
        if($elements->count() == 0) {
            return to_route('index');
        }
        if ($address = Address::where(['user_id' => $user->id])->first()) {
                $user->address_id = $address->id;
            }

        $products = Product::whereIn('id', $elements->pluck('product_id'))->get();

        return \view('order.index', ['user' => $user, 'address' => Address::where(['user_id' => $user->id])->get()->first(), 'payment' => Payment::where(['user_id' => $user->id])->get()->first(), 'elements' => $elements, 'products' => $products]); // TODO : Change view to open checkout view, default : index
    }

    public function proceed(OrderRequest $req): RedirectResponse {
        $data = $req->validated();
        $user = \Auth::user();
        $cart = ProductUtils::getCartOrNull($user->id);

        if($cart === null) {
            return to_route('index')->setStatusCode(404);
        }

        $elements = ProductUtils::getCartElements($cart->id);
        $dispo = ProductUtils::checkDisponibilities($elements);
        if ($dispo !== null) {
            return to_route('user.cart')->withErrors(['id' => $dispo]);
        }

        $order = Order::create([
            'user_id' => $user->id,
            'address_id' => $data['address_id'],
            'payment_id' => $data['payment_id'],
            'order_status' => 'Shipped',
            'price' => ProductUtils::calcTotalPrice($elements, Product::whereIn('id', $elements->pluck('product_id'))->get()),
        ]);

        ProductUtils::createOrderedItemsFromCartElements($elements, $order->id);

        return to_route('index'); // TODO : Change view to open ??? view, default : index
    }

    public function setAddress(AddressRequest $req): RedirectResponse {
        $data = $req->validated();
        $user = \Auth::user();
        $addr = Address::where(['user_id' => $user->id])->first();

        if($addr) {
            $addr->update($data);
        } else {
            Address::create(['user_id' => $user->id] + $data);
        }

        return back();
    }

    public function setPayment(PaymentRequest $req): RedirectResponse {
        $data = $req->validated();
        $user = \Auth::user();
        $pay = Payment::where(['user_id' => $user->id])->first();

        if($pay) {
            $pay->update($data);
        } else {
            Payment::create(['user_id' => $user->id] + $data);
        }

        return back();
    }
}
