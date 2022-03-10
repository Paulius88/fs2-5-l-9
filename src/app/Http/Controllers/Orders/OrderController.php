<?php

namespace App\Http\Controllers\Orders;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Models;

use App\Http\Controllers\Controller;


class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Models\Orders\Order::latest()->with('products')->latest()->paginate(5);

        // foreach($orders as $order) {
        //     $products = DB::table('orders_products')->where('order_id', $order->id)->pluck('product_id');

        //     $products = Models\Products\Product::whereIn('id', $products)->get();

        //     $order->products = $products;
        // }

        return view('orders.index', compact('orders'));
    }

    public function save(Requests\Orders\SaveOrderRequest $request, Models\Orders\Order $order = NULL)
    {
        if (!$order) {
            $order = new Models\Orders\Order;
        }

        $order->fill($request->validated());

        $order->save();

        // DB::table('orders_products')->insert([
        //     'order_id' => $order->id,
        //     'product_id' => $request->product_id
        // ]);

        // DB::table('orders_products')->insert([
        //     'order_id' => $order->id,
        //     'product_id' => Models\Products\Product::inRandomOrder()->value('id')
        // ]);
        
        $product = Models\Products\Product::findOrFail($request->product_id);

        // $product->name = 'updated on order';
        // $order->products()->save($product);
        
        $order->products()->attach($product);

        // $order->products()->sync($product);

        return response()->json('viskas ok');
    }
}
