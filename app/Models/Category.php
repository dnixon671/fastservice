<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Subcategory;
class Category extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    public function subcateogies()
    {
        return $this->hasMany(Subcategory::class);
    }
}
