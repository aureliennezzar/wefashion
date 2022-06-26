<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'product_id'
    ];
    //PICTURE RELATIONS
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
