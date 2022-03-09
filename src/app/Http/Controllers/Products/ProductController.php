<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Models;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Models\Products\Product::where('is_active', true);

        if ($request->has('category') && is_numeric($request->category)) {
            $query->where('category_id', $request->category);
        }

        if ($request->has('search') && is_string($request->search)) {
            // $query->where('name', 'LIKE', $request->search);
            // $query->where('name', 'LIKE', $request->search . '%');
            // $query->where('name', 'LIKE', '%' . $request->search);
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        switch ($request->order_by) {
            case 'name-desc':
                $query->orderBy('name', 'desc');
                break;

            case 'price-asc':
                $query->orderBy('price');
                break;

            case 'price-desc':
                $query->orderBy('price', 'desc');
                break;
            
            default:
                $query->orderBy('name');
                break;
        }

        if ($request->order_by == 'price') {
            $query->orderBy('price');
        } else {
            $query->orderBy('name');
        }

        $products = $query->get();

        $categories = Models\Products\Category::isActive()->get();

        $view = view('products.index', compact('products', 'categories'));

        $view->with('category_id', $request->category);
        
        $view->with('ordering', [
            'name-asc'   => 'Name Accessing',
            'name-desc'  => 'Name Descending',
            'price-asc'  => 'Price Accessing',
            'price-desc' => 'Price Descending',
        ]);

        return $view;
    }

    public function show(Models\Products\Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function create()
    {
        $categories = Models\Products\Category::isActive()->get();

        return view('products.create', compact('categories'));
    }

    // public function store(Request $request)
    // {
    //     // $data = $request->only(
    //     //     'name',
    //     //     'description',
    //     //     'category_id',
    //     //     'identifier',
    //     //     'identifier_type_id',
    //     //     'price'
    //     // );

    //     // $product = Models\Products\Product::create($data);

    //     // dd($product);

    //     // -------------------------------------- //

    //     // $product = new Models\Products\Product;

    //     // $product->name        = $request->name;
    //     // $product->description = $request->description;
    //     // $product->category_id = $request->category_id;
    //     // $product->is_active   = true;
    //     // $product->identifier  = Str::uuid();

    //     // $product->save();

    //     // -------------------------------------- //

    //     $data = $request->only(
    //         'name',
    //         'description',
    //         'category_id'
    //     );
        
    //     $product = new Models\Products\Product($data);

    //     // $product->fill($data);

    //     $product->is_active  = true;
    //     $product->identifier = Str::uuid();

    //     $product->save();

    //     dd($product);
    // }
    
    public function store(Requests\Products\CreateProductRequest $request)
    {
        // $rules = [
        //     'name' => ['required', 'max:50'],
        //     'description' => 'required|string',
        //     'category_id' => ['required', 'exists:App\Models\Products\Category,id']
        // ];

        // $validator = Validator::make($request->all(), $rules);
 
        // if ($validator->fails()) {
        //     return redirect()->route('products.create')->withErrors($validator)->withInput();
        // }

        // $validated = $request->validate($rules);

        // $product = Models\Products\Product::create($validated);

        $product = Models\Products\Product::create($request->validated());

        return redirect()->route('products.show', $product->id);
    }

    public function edit(Models\Products\Product $product)
    {
        $categories = Models\Products\Category::isActive()->get();

        return view('products.edit', compact('categories', 'product'));
    }

    public function update(Requests\Products\UpdateProductRequest $request, Models\Products\Product $product)
    {
        $product->fill($request->validated());

        $product->save();

        return redirect()->route('products.show', $product->id);
    }
}
