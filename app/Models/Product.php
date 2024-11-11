<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// MODELS
use App\Models\Subcategory;
use App\Models\Provider;
use App\Models\Tag;
class Product extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'subcategory_id',
        'provider_id',
        'img_url',
        'um',
        'operation'

    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Product::class, 'product_tag');
    }
}
