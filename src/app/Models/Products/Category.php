<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'product_categories';

    public function scopeIsActive($query)
    {
        $query->where('is_active', TRUE);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
