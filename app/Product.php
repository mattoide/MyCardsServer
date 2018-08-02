<?php

namespace MyCardsServer;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'description', 'quantity', 'link','user', 'image' => "null"
    ];

    protected $attributes = [
         'image' => "null"
    ];

   /* protected $hidden = [
        'user',
    ];*/
}
