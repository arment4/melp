<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    //
    public $incrementing = false;
    protected $keyType = "string";
    protected $guarded = [];
}
