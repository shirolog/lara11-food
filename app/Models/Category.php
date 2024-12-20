<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [

        'name'
    ];

    //productsとのリレーション関係
    public function products(){

        return $this->hasMany(Product::class);
    }

    //cartsとのリレーション関係

    public function carts(){

        return $this->hasMany(Cart::class);
    }
}
