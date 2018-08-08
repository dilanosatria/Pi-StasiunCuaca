<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stasiun extends Model
{
    protected $fillable = ['kota','sortingkota_id','lokasi','nama','id_peta','id_gambar','gauge_temp','gauge_kelembaban','gauge_tekanan','gauge_cahaya','gauge_hujan','gauge_embun','iframe_temp','iframe_kelembaban','iframe_tekanan','iframe_cahaya','iframe_hujan','iframe_embun','channel_ts','kunci_api_publik','field_temp','field_kelembaban','field_tekanan','field_cahaya','field_hujan','field_embun','status'];

    public function sortingkota()
    {
        return $this->belongsTo(sortingkota::class);
    }
}
