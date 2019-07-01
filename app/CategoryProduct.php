<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    //
    public $timestamps = false;
    protected $table = 'product_has_category';
}
