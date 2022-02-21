<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = [
            [
                'product' => [
                    'name' => 'iPhone',
                ],

                'price' => 450
            ],

            [
                'product' => [
                    'name' => 'Samsung',
                ],

                'price' => 450

            ]
        ];

        return view('orders.index', compact('orders'));
    }
}
