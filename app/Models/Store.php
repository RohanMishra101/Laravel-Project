<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'store_name',
        'description',
        'img',
        'contact_no',
        'address',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
        // Ensure that Product is correctly namespaced
    }

}
