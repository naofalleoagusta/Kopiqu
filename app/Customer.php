<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //created_at & updated_at not exist
    public $timestamps = false;
}
