<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';

    // public $timestamps = false;

    protected $guarded = [
        'is_active'
    ];

    protected $fillable = [
        'name',
        'description',
        'category_id',
    ];

    protected $appends = ['url'];

    public function getUrlAttribute()
    {
        return route('products.show', $this->id);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Models\Orders\Order::class, 'orders_products');
    }
}
