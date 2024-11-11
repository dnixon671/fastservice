<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// MODELOS
use App\Models\Product;

class Subcategory extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
