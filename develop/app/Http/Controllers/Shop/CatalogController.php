<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\View;

class CatalogController extends Controller
{
    public function index(Request $request)
    {

        SEOMeta::setTitle('Каталог');
        $frd = $request->all();
        $categories = Category::pluck('name', 'id');
        $products = Product::query()
            ->withCount(['cartItems as count_in_cart' => function (Builder $query){
                    $query->where('cart_id', app()['cart']->getCart()->getKey());
            }])
            ->with(['category'])
            ->filter($frd)
            ->paginate(12);
        return view('catalogs.index', compact('products', 'categories', 'frd'));
    }
}
