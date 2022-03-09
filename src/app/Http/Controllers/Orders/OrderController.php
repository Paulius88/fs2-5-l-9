<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = [
           
        ];

        return view('orders.index', compact('orders'));
    }

    public function save()
    {
        // code...
    }
}
