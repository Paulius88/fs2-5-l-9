<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;

use App\Models;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Models\Products\Product::where('is_active', true);

        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        $products = $query->get();

        $categories = Models\Products\Category::get();

        $view = view('products.index', compact('products', 'categories'));

        return $view;
    }

    public function show(Models\Products\Product $product)
    {
        return view('products.show', compact('product'));
    }
}
