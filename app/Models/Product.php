<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
        'published',
        'reference',
        'category_id',
    ];

    //PRODUCT RELATION (CATEGORY)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //PRODUCT RELATION (SIZES)
    public function sizes()
    {
        return $this->belongsToMany(Size::class)->withPivot('product_id', 'size_id');
    }

    //PRODUCT RELATION (PICTURE)
    public function picture()
    {
        return $this->hasOne(Picture::class);
    }
}
