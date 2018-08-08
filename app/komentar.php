<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
	public $incrementing = false;
    protected $fillable = ['id','nama','email','komentar'];
}
