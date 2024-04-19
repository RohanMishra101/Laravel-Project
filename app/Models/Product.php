<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'c_id',
        'p_name',
        'p_img',
        'p_description',
        'p_price',
        'p_stock'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'c_id');
    }
    public function store()
    {
        return $this->belongsTo(Store::class); // Ensure that Store is correctly namespaced
    }
}
