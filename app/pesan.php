<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pesan extends Model
{
    public $incrementing = false;
    protected $fillable = ['id','nama','email','pesan'];
}
