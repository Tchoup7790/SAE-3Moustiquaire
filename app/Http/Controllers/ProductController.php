<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\FilteredProductsRequest;
use App\Http\Requests\ModifyProductRequest;
use App\Http\Requests\ProductIdRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(FilteredProductsRequest $req): View {
        $data = $req->validated();
        $productsQuery = Product::query();
        $categoryQuery = Category::query();
        $nameTab = "All products";

        if ($req->filled('price') && $req->filled('category')) {
            $productsQuery->whereIn('category_id', $data['category'])->where('price', '<=', $data['price']);
            $nameTab = "Products in ".$categoryQuery->whereIn('id', $data['category'])->get()->implode('name', ', ')." & "."Price limit ".$data['price'];
            if (count($req['category']) == 3){
                $nameTab = "Price limit ".$data['price'];
            }
        }else{
            if ($req->filled('category')) {
                $productsQuery->whereIn('category_id', $data['category']);
                $nameTab = "Products in ".$categoryQuery->whereIn('id', $data['category'])->get()->implode('name', ', ');
                if (count($req['category']) == 3){
                    $nameTab = "All products";
                }
            }

            if ($req->filled('price')) {
                $productsQuery->where('price', '<=', $data['price']);
                $nameTab = "Price limit ".$data['price'];
            }

            if ($req->filled('search')) {
                $productsQuery->where('name', 'like', '%'.$data['search'].'%');
                $nameTab = "Search ".$data['search'];
            }
        }
        return view('product.catalogue', ['products' => $productsQuery->paginate(10), 'categories' => Category::all(), 'nameTab' => $nameTab]);
    }

    public function show(ProductIdRequest $req): View
    {
        $id = $req->validated()['id'];
        $p = Product::findOr($id, fn () => to_route('product.cat'));
        return \view('product.show', ['product' => $p]);
    }

    public function create(): View {
        $product = new Product();
        $product->name = "Name";
        $product->description = "Description";
        return \view('product.create', ['product'=>$product,'categories'=>Category::select(['id', 'name'])->get()]);
    }

    public function add(CreateProductRequest $req): RedirectResponse
    {
        $p = new Product();
        $p = $this->productAttribution($req, $p); // Initialise values
        $isAdded = $p->save(); // Add product
        if(!$isAdded) {
            // Failed to add product
            return back()->withErrors([
                'added' => 'Ajout du produit impossible.',
            ]);
        }
        return to_route('admin.index');
    }

    public function modify(ProductIdRequest $req): View {
        $id = $req->validated()['id'];
        $p = Product::findOr($id, fn () => to_route('admin.index'));
        return \view('product.edit', ['product'=>$p,'categories'=>Category::select(['id', 'name'])->get()]);
    }

    public function update(ModifyProductRequest $req): RedirectResponse {
        // Try to find the product, go back with error if product not found
        $p = Product::findOr($req->get('id'), fn () =>
            back()->withErrors([
                'id' => 'L\'identifiant de produit fournis, n\'existe pas.',
            ])->onlyInput('id')
        );
        $p = $this->productAttribution($req, $p); // Update values
        $isUpdated = $p->save(); // Update product
        if(!$isUpdated) {
            // Failed to update product
            return back()->withErrors([
                'updated' => 'Modification du produit impossible.',
            ]);
        }
        return to_route('admin.index');
    }

    public function delete(ProductIdRequest $req): RedirectResponse
    {
        $id = $req->validated()['id'];
        Product::find($id)->delete();
        return to_route('admin.index')->setStatusCode(200);
    }

    private function productAttribution(FormRequest $req, Product $p): Product {
        $data = $req->validated();

        /** @var UploadedFile $image */
        $image = $req->validated('image');
        if ($image) {
            Storage::disk('products')->delete($p->image);
            $imgPath = $image->store('images', 'products');
            $p->image = $imgPath;
        }
        /** @var UploadedFile $thumbnail */
        $image = $req->validated('thumbnail');
        if ($image) {
            Storage::disk('products')->delete($p->thumbnail);
            $tnPath = $image->store('thumbnails', 'products');
            $p->thumbnail = $tnPath;
        }

        $p->name = $data['name'];
        $p->description = $data['description'];
        $p->price = $data['price'];
        $p->quantity = $data['quantity'];
        $p->category_id = $data['category_id'];
        return $p;
    }
}
