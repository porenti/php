<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        SEOMeta::setTitle('Товары');
        $frd = $request->all();
        $categories = Category::pluck('name', 'id');
        $products = Product::query()
            ->with(['category'])
            ->filter($frd)
            ->paginate(12);
        return view('products.index', compact('products', 'categories', 'frd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('name', 'id')->get();
        SEOMeta::setTitle('Создание товара');
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $frd = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
        ]);
        $product = new Product();
        $product->setName($frd['name']);
        $product->setDescription($frd['description']);
        $product->setPrice((float)$frd['price']);
        $product->setCategoryId($frd['category_id']);
        if (isset($frd['priceWithDiscount'])) {
            $product->setPriceWithDiscount($frd['price_with_discount']);
        } else {
            $product->setPriceWithDiscount(null);
        }
        $product->setQuantity($frd['quantity']);
        $product->save();
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $product->putImage($avatar, $product);
        }
        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        SEOMeta::setTitle('Просмотр - ' . $product->getName());

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        SEOMeta::setTitle('Редактирование - ' . $product->getName());
        $categories = Category::select('name', 'id')->get();
        $image = $product->getImages()->last();
        return view('products.edit', compact('image', 'product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $frd = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'priceWithDiscount' => 'required',
            'quantity' => 'required',
        ]);
        $product->setName($frd['name']);
        $product->setDescription($frd['description']);
        $product->setPrice((float)$frd['price']);
        $product->setCategoryId($frd['category_id']);
        $product->setQuantity($frd['quantity']);
        $product->setPriceWithDiscount($frd['priceWithDiscount']);
        $product->save();
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $product->putImage($avatar, $product);
        }
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->softDelete();
        return redirect()->route('products.index');
    }
}
