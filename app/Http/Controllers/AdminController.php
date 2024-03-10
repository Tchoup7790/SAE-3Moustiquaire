<?php

namespace App\Http\Controllers;

use App\Models\OrderedItem;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(Request $req) : View {
        $page = $req->input('page');

        return view('admin.dashboard', [
            "page" => $page,
            "categories" => \App\Models\Category::all(),
            "products" => \App\Models\Product::all(),
            "users" => \App\Models\User::all(),
            "orders" => \App\Models\Order::all(),
            "addresses" => \App\Models\Address::all(),
            "payments" => \App\Models\Payment::all(),
            ]);
    }
}
