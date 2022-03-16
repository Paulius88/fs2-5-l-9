<?php

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models;

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

        return response()->json(compact('products'));
    }
}
