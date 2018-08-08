<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStasiunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stasiun', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kota',30);
            $table->integer('listingkota_id',2);
            $table->string('lokasi',30);
            $table->string('nama',30);
            $table->string('id_peta',30);
            $table->string('id_gambar',1000);
            $table->string('gauge_temp',35);
            $table->string('gauge_kelembaban',35);
            $table->string('gauge_tekanan',35);
            $table->string('gauge_cahaya',35);
            $table->string('gauge_hujan',35);
            $table->string('gauge_embun',35);
            $table->string('iframe_temp',250);
            $table->string('iframe_kelembaban',250);
            $table->string('iframe_tekanan',250);
            $table->string('iframe_cahaya',250);
            $table->string('iframe_hujan',250);
            $table->string('iframe_embun',250);
            $table->integer('field_temp',1);
            $table->integer('field_kelembaban',1);
            $table->integer('field_tekanan',1);
            $table->integer('field_cahaya',1);
            $table->integer('field_hujan',1);
            $table->integer('field_embun',1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stasiun');
    }
}