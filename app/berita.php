<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    protected $fillable = ['perihal','kol_berita1','kol_berita2','kol_berita3','link','linkgambar','status'];
}
