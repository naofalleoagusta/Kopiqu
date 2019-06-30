<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //created_at & updated_at not exist
    public $timestamps = false;
    
}
