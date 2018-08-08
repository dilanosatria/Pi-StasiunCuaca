<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class file extends Model
{
    protected $fillable = ['nama_file','direktori_file','jenis_file'];
}
