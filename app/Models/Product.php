<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [

        'name',
        'category_id',
        'price',
        'image',
    ];

    //categoryとのリレーション関係

    public function category(){

        return $this->belongsTo(Category::class);
    }

    //cartsとのリレーション関係
    public function carts(){

        return $this->hasMany(Cart::class, 'pid');
    }
}
