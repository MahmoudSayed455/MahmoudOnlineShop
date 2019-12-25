<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $primaryKey='id';
    protected $fillable=
        [
        'product_name',
        'product_code',
        'product_price',
        'product_info',
        'image',
        'sp1_price',
         'stock',
         'category_id'
        ];

}
