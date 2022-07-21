<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;


class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'price',
        'image',
        'description',
        'is_active',
    ];

public function category()
{
return $this->belongsTo(Category::class);
}

}
