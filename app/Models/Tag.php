<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// MODELOS
use App\Models\Product;

class Tag extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        "name",
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_tag');
    }
}
