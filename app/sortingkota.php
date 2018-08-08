<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sortingkota extends Model
{
    protected $fillable = ['kota'];

    public function stasiun()
    {
        // return $this->hasMany(stasiun::class)->where('status','LIKE',"Aktif");
        return $this->hasMany(stasiun::class)->where('status','LIKE',"Aktif");
    }  

}
