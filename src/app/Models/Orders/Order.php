<?php

namespace App\Models\Orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['user_id', 'comment'];

    public function products()
    {
        return $this->belongsToMany(Models\Products\Product::class, 'orders_products')->withPivot('quantity');
    }

    public function user()
    {
        return $this->belongsTo(Models\User::class);
    }
}
