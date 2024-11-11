<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// MODELOS
use App\Models\Product;

class Provider extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        "name",
        'contact',
        'phone',
        'email',
        'address',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
