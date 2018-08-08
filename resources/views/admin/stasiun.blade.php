@extends('adminlte::page')

@section('content')
<style>
.alignleft {
  float: left;
}
.alignright {
  float: right;
}
li{
  word-wrap:break-word;
}
</style>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tabel Informasi IoT Stasiun Cuaca</h3>
      <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalstasiun"><i class="fa fa-plus"></i> Tambah Stasiun Cuaca</button>
      @if (count($stasiun) === 0)
        <br>
        <h3 style="padding-bottom: 35px;"> Belum ada stasiun cuaca. </h3>
      @endif
    </div>
  </div>

  <br>

  <div class="box-body">
    <?php $no =1;?>
    @foreach($stasiun->sortByDesc('updated_at') as $key=> $value)
    <div class="card">
      <div class="card-header">
        <div id="textbox">
          <p class="alignleft"><b>No/ID : </b> [{{ $no++ }}/{{ $value->id }}]</p>
          <p class="alignright"><b>Ditambahkan : </b>[{{ $value->created_at->format('D, d-M-Y, H:i') }}]
          <b> Diubah : </b>[{{ $value->updated_at->format('D, d-M-Y, H:i') }}]</p>
        </div>
        <div style="clear: both;"></div>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><b>Kota / ID Kota</b><p>{{ $value->kota }} / {{ $value->sortingkota_id}}</p></li>
        <li class="list-group-item"><b>Lokasi Stasiun </b><p>{{ $value->lokasi }}</p></li>
        <li class="list-group-item"><b>Nama Stasiun </b><p>{{ $value->nama }}</p></li>
        <li class="list-group-item"><b>Id Peta </b><p>{{ $value->id_peta }}</p></li>
        <li class="list-group-item"><b>Id Gambar </b><p>{{ $value->id_gambar }}</p></li>
        <li class="list-group-item"><b>Channel ID | Kunci API | Field Temp | Field Kelembaban | Field Tekanan | Field Cahaya | Field Hujan | Field Embun </b><p>{{ $value->channel_ts }} | {{ $value->kunci_api_publik }} | {{ $value->field_temp }} | {{ $value->field_kelembaban }} | {{ $value->field_tekanan }} | {{ $value->field_cahaya }} | {{ $value->field_hujan }} | {{ $value->field_embun }}</p></li>
        <li class="list-group-item"><b>Gauge Temperatur </b><p>{{ $value->gauge_temp }}</p></li>
        <li class="list-group-item"><b>Gauge Kelembaban </b><p>{{ $value->gauge_kelembaban }}</p></li>
        <li class="list-group-item"><b>Gauge Tekanan Atmosfer </b><p>{{ $value->gauge_tekanan }}</p></li>
        <li class="list-group-item"><b>Gauge Intensitas Cahaya </b><p>{{ $value->gauge_cahaya }}</p></li>
        <li class="list-group-item"><b>Gauge Curah Hujan </b><p>{{ $value->gauge_hujan }}</p></li>
        <li class="list-group-item"><b>Gauge Titik Embun </b><p>{{ $value->gauge_embun }}</p></li>
        <li class="list-group-item"><b>iFrame Temperatur </b><p>{{ $value->iframe_temp }}</p></li>
        <li class="list-group-item"><b>iFrame Kelembaban </b><p>{{ $value->iframe_kelembaban }}</p></li>
        <li class="list-group-item"><b>iFrame Tekanan Atmosfer </b><p>{{ $value->iframe_tekanan }}</p></li>
        <li class="list-group-item"><b>iFrame Intensitas Cahaya </b><p>{{ $value->iframe_cahaya }}</p></li>
        <li class="list-group-item"><b>iFrame Curah Hujan </b><p>{{ $value->iframe_hujan }}</p></li>
        <li class="list-group-item"><b>iFrame Titik Embun </b><p>{{ $value->iframe_embun }}</p></li>
        <li class="list-group-item"><b>Status </b><p style="color:blue;">{{ $value->status }}</p></li>
      </ul>
      <div class="card-footer text-muted text-right">
        <a class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus stasiun cuaca {{ $value->nama }}?')" href="/delete/stasiun/{{ $value->id }}"><i class="fa fa-trash"></i> Hapus Stasiun Cuaca</a>
        <a class="btn btn-warning" data-no="{{ $no-1 }}/{{ $value->id }}"
          data-id="{{ $value->id }}"
          data-kota="{{ $value->kota }}"
          data-id_kota="{{ $value->sortingkota_id }}"
          data-lokasi="{{ $value->lokasi }}"
          data-nama="{{ $value->nama }}"
          data-id_peta="{{ $value->id_peta }}"
          data-id_gambar="{{ $value->id_gambar }}"
          data-gauge_temp="{{ $value->gauge_temp }}"
          data-gauge_kelembaban="{{ $value->gauge_kelembaban }}"
          data-gauge_tekanan="{{ $value->gauge_tekanan }}"
          data-gauge_cahaya="{{ $value->gauge_cahaya }}"
          data-gauge_hujan="{{ $value->gauge_hujan }}"
          data-gauge_embun="{{ $value->gauge_embun }}"
          data-iframe_temp="{{ $value->iframe_temp }}"
          data-iframe_kelembaban="{{ $value->iframe_kelembaban }}"
          data-iframe_tekanan="{{ $value->iframe_tekanan }}"
          data-iframe_cahaya="{{ $value->iframe_cahaya }}"
          data-iframe_hujan="{{ $value->iframe_hujan }}"
          data-iframe_embun="{{ $value->iframe_embun }}"
          data-field_temp="{{ $value->field_temp }}"
          data-field_kelembaban="{{ $value->field_kelembaban }}"
          data-field_tekanan="{{ $value->field_tekanan }}"
          data-field_cahaya="{{ $value->field_cahaya }}"
          data-field_hujan="{{ $value->field_hujan }}"
          data-field_embun="{{ $value->field_embun }}"
          data-channel_ts="{{ $value->channel_ts }}"
          data-kunci_api_publik="{{ $value->kunci_api_publik }}"
          data-toggle="modal" data-target="#modalstasiunhapus"><i class="fa fa-times"></i> Nonaktifkan Stasiun</a>
        <a class="btn btn-info" 
          data-no="{{ $no-1 }}/{{ $value->id }}"
          data-id="{{ $value->id }}"
          data-kota="{{ $value->kota }}"
          data-id_kota="{{ $value->sortingkota_id }}"
          data-lokasi="{{ $value->lokasi }}"
          data-nama="{{ $value->nama }}"
          data-id_peta="{{ $value->id_peta }}"
          data-id_gambar="{{ $value->id_gambar }}"
          data-gauge_temp="{{ $value->gauge_temp }}"
          data-gauge_kelembaban="{{ $value->gauge_kelembaban }}"
          data-gauge_tekanan="{{ $value->gauge_tekanan }}"
          data-gauge_cahaya="{{ $value->gauge_cahaya }}"
          data-gauge_hujan="{{ $value->gauge_hujan }}"
          data-gauge_embun="{{ $value->gauge_embun }}"
          data-iframe_temp="{{ $value->iframe_temp }}"
          data-iframe_kelembaban="{{ $value->iframe_kelembaban }}"
          data-iframe_tekanan="{{ $value->iframe_tekanan }}"
          data-iframe_cahaya="{{ $value->iframe_cahaya }}"
          data-iframe_hujan="{{ $value->iframe_hujan }}"
          data-iframe_embun="{{ $value->iframe_embun }}"
          data-field_temp="{{ $value->field_temp }}"
          data-field_kelembaban="{{ $value->field_kelembaban }}"
          data-field_tekanan="{{ $value->field_tekanan }}"
          data-field_cahaya="{{ $value->field_cahaya }}"
          data-field_hujan="{{ $value->field_hujan }}"
          data-field_embun="{{ $value->field_embun }}"
          data-channel_ts="{{ $value->channel_ts }}"
          data-kunci_api_publik="{{ $value->kunci_api_publik }}"
          data-toggle="modal" data-target="#modalstasiunedit"><i class="fa fa-edit"></i> Ubah Data Stasiun</a>
      </div>
      <br>
    </div>
    @endforeach
    {!! $stasiun->links(); !!}
  </div>

  <!-- Modal Baru -->
    <div class="modal fade" id="modalstasiun" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3 class="text-center" style="padding-bottom: 10px;"> Tambah Stasiun Cuaca</h3>
            <form method="post" action="stasiun/store">
              @csrf
                <div class="form-row">
                  <div class="form-group col-md-3">
                      <label>Nama Stasiun Cuaca</label>
                      <input class="form-control" id="nama" type="text" name="nama" placeholder="Nama Stasiun" required="required" maxlength="30">                     
                  </div>
                  <div class="form-group col-md-3">
                      <label>Kota</label>
                      <input class="form-control" id="kota" type="text" name="kota" placeholder="Kota Pemantauan" required="required" maxlength="30">
                  </div>
                  <div class="form-group col-md-3">
                      <label>ID Kota (Samakan)</label>
                      <select class="form-control" id="sortingkota_id" type="text" name="sortingkota_id" required="required">
                        @foreach($sortingkota as $value)
                        <option value="{{$value->id}}">{{$value->kota}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group col-md-3">
                      <label>Lokasi Tepat</label>
                      <input class="form-control" id="lokasi" type="text" name="lokasi" placeholder="Lokasi Stasiun Cuaca" required="required" maxlength="30">
                  </div>
                  <div class="form-group col-md-6">
                      <label>ID Channel ThingSpeak</label>
                      <input class="form-control" id="channel_ts" type="text" name="channel_ts" placeholder="co: 463743" required="required" maxlength="10">
                  </div>
                  <div class="form-group col-md-6">
                      <label>Kunci API Baca ThingSpeak (optional)</label>
                      <input class="form-control" id="kunci_api_publik" type="text" name="kunci_api_publik" placeholder="co: B7028Y345YGDNHLT" maxlength="20">
                  </div>
                  <div class="form-group col-md-2">
                      <label>Field Temperatur</label>
                      <select class="form-control" id="field_temp" type="text" name="field_temp">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                      </select>
                  </div>
                  <div class="form-group col-md-2">
                      <label>Field Kelembaban</label>
                      <select class="form-control" id="field_kelembaban" type="text" name="field_kelembaban">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                      </select>
                  </div>
                 <div class="form-group col-md-2">
                      <label>Field Tekanan</label>
                      <select class="form-control" id="field_tekanan" type="text" name="field_tekanan">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                      </select>
                  </div>
                  <div class="form-group col-md-2">
                      <label>Field Cahaya</label>
                      <select class="form-control" id="field_cahaya" type="text" name="field_cahaya">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                      </select>
                  </div>
                  <div class="form-group col-md-2">
                      <label>Field Hujan</label>
                      <select class="form-control" id="field_hujan" type="text" name="field_hujan">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                      </select>
                  </div>
                  <div class="form-group col-md-2">
                      <label>Field Embun</label>
                      <select class="form-control" id="field_embun" type="text" name="field_embun">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                      <!-- <label>File Gauge Data Temperatur</label>
                      <input class="form-control" id="gauge_temp" type="text" name="gauge_temp" placeholder="Gaugetemp<nama>" required="required" maxlength="35"> -->
                      <label>File Gauge Data Temperatur</label>
                      <select class="form-control" id="gauge_temp" type="text" name="gauge_temp" required="required">
                        @foreach($gaugetemp as $value)
                          <option value="{{ $value->direktori_file }}">{{ $value->nama_file }}</option>
                        @endforeach      
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                      <!-- <label>File Gauge Data Kelembaban</label>
                      <input class="form-control" id="gauge_kelembaban" type="text" name="gauge_kelembaban" placeholder="Gaugehumidity<nama>" required="required" maxlength="35"> -->
                      <label>File Gauge Data Kelembaban</label>
                      <select class="form-control" id="gauge_kelembaban" type="text" name="gauge_kelembaban" required="required">
                        @foreach($gaugehum as $value)
                          <option value="{{ $value->direktori_file }}">{{ $value->nama_file }}</option>
                        @endforeach      
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                      <!-- <label>File Gauge Data Tekanan Atmosfer</label>
                      <input class="form-control" id="gauge_tekanan" type="text" name="gauge_tekanan" placeholder="Gaugepressure<nama>" required="required" maxlength="35"> -->
                      <label>File Gauge Data Tekanan Atmosfer</label>
                      <select class="form-control" id="gauge_tekanan" type="text" name="gauge_tekanan" required="required">
                        @foreach($gaugepress as $value)
                          <option value="{{ $value->direktori_file }}">{{ $value->nama_file }}</option>
                        @endforeach      
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                      <!-- <label>File Gauge Data Intensitas Cahaya</label>
                      <input class="form-control" id="gauge_cahaya" type="text" name="gauge_cahaya" placeholder="Gaugelight<nama>" required="required" maxlength="35"> -->
                      <label>File Gauge Data Intensitas Cahaya</label>
                      <select class="form-control" id="gauge_cahaya" type="text" name="gauge_cahaya" required="required">
                        @foreach($gaugelight as $value)
                          <option value="{{ $value->direktori_file }}">{{ $value->nama_file }}</option>
                        @endforeach      
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                      <!-- <label>File Gauge Data Curah Hujan</label>
                      <input class="form-control" id="gauge_hujan" type="text" name="gauge_hujan" placeholder="Gaugerain<nama>" required="required" maxlength="35"> -->
                      <label>File Gauge Data Curah Hujan</label>
                      <select class="form-control" id="gauge_hujan" type="text" name="gauge_hujan" required="required">
                        @foreach($gaugerain as $value)
                          <option value="{{ $value->direktori_file }}">{{ $value->nama_file }}</option>
                        @endforeach      
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                      <!-- <label>File Gauge Data Titik Embun</label>
                      <input class="form-control" id="gauge_embun" type="text" name="gauge_embun" placeholder="Gaugedew<nama>" required="required" maxlength="35"> -->
                      <label>File Gauge Data Titik Embun</label>
                      <select class="form-control" id="gauge_embun" type="text" name="gauge_embun" required="required">
                        @foreach($gaugedew as $value)
                          <option value="{{ $value->direktori_file }}">{{ $value->nama_file }}</option>
                        @endforeach      
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                  <label>File Peta</label>
                      <select class="form-control" id="id_peta" type="text" name="id_peta" required="required">
                        @foreach($filepeta as $value)
                          <option value="{{ $value->direktori_file }}">{{ $value->nama_file }}</option>
                        @endforeach      
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                  <label>File Gambar</label>
                      <select class="form-control" id="id_gambar" type="text" name="id_gambar" required="required">
                        <option value="">Pilih File Gambar</option>
                        @foreach($filegambar as $value)
                          <option value="{{ $value->direktori_file }}">{{ $value->nama_file }}</option>
                        @endforeach      
                      </select>
                  </div>
                </div>
                <div class="control-group">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                      <label>iFrame Data Temperatur</label>
                      <input class="form-control" id="iframe_temp" type="text" name="iframe_temp" placeholder="https://thingspeak.com/channels/..." required="required" maxlength="250">
                  </div>
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                      <label>iFrame Data Kelembaban</label>
                      <input class="form-control" id="iframe_kelembaban" type="text" name="iframe_kelembaban" placeholder="https://thingspeak.com/channels/..." required="required" maxlength="250">
                  </div>
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                      <label>iFrame Data Tekanan Atmosfer</label>
                      <input class="form-control" id="iframe_tekanan" type="text" name="iframe_tekanan" placeholder="https://thingspeak.com/channels/..." required="required" maxlength="250">
                  </div>
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                      <label>iFrame Data Intensitas Cahaya</label>
                      <input class="form-control" id="iframe_cahaya" type="text" name="iframe_cahaya" placeholder="https://thingspeak.com/channels/..." required="required" maxlength="250">
                  </div>
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                      <label>iFrame Data Curah Hujan</label>
                      <input class="form-control" id="iframe_hujan" type="text" name="iframe_hujan" placeholder="https://thingspeak.com/channels/..." required="required" maxlength="250">
                  </div>
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                      <label>iFrame Data Titik Embun</label>
                      <input class="form-control" id="iframe_embun" type="text" name="iframe_embun" placeholder="https://thingspeak.com/channels/..." required="required" maxlength="250">
                  </div>
                      <input class="hidden" type="text" name="status" value="Aktif">
                </div>
              <br>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-xl" data-dismiss="modal">Tutup</button>
              <input type="submit" name="submit" class="btn btn-primary btn-xl" value="Tambah">
            </form>
          </div>
        </div>
      </div>
    </div>

  <!-- Modal Edit -->
    <div class="modal fade" id="modalstasiunedit" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3 class="text-center"> Ubah Data Stasiun Cuaca </h3>
            <p class="text-center" style="padding-bottom: 10px;" id="editno"></p>
            <form method="post" action="{{route('stasiun.update')}}">
              {{method_field('patch')}}
              @csrf
                  <input class="hidden" id="id" type="text" name="id">
                  <div class="form-row">
                  <div class="form-group col-md-3">
                      <label>Nama Stasiun Cuaca</label>
                      <input class="form-control" id="nama" type="text" name="nama" placeholder="Nama Stasiun" required="required" maxlength="30">
                  </div>
                  <div class="form-group col-md-3">
                      <label>Kota</label>
                      <input class="form-control" id="kota" type="text" name="kota" placeholder="Kota Pemantauan" required="required" maxlength="30">
                  </div>
                  <div class="form-group col-md-3">
                      <label>ID Kota (Samakan)</label>
                      <select class="form-control" id="sortingkota_id" type="text" name="sortingkota_id" required="required">
                        @foreach($sortingkota as $value)
                        <option value="{{$value->id}}">{{$value->kota}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group col-md-3">
                      <label>Lokasi Tepat</label>
                      <input class="form-control" id="lokasi" type="text" name="lokasi" placeholder="Lokasi Stasiun Cuaca" required="required" maxlength="30">
                  </div>
                  <div class="form-group col-md-6">
                      <label>ID Channel ThingSpeak</label>
                      <input class="form-control" id="channel_ts" type="text" name="channel_ts" placeholder="co: 463743" required="required" maxlength="10">
                  </div>
                  <div class="form-group col-md-6">
                      <label>Kunci API Baca ThingSpeak (optional)</label>
                      <input class="form-control" id="kunci_api_publik" type="text" name="kunci_api_publik" placeholder="co: B7028Y345YGDNHLT" maxlength="20">
                  </div>
                  <div class="form-group col-md-2">
                      <label>Field Temperatur</label>
                      <select class="form-control" id="field_temp" type="text" name="field_temp">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                      </select>
                  </div>
                  <div class="form-group col-md-2">
                      <label>Field Kelembaban</label>
                      <select class="form-control" id="field_kelembaban" type="text" name="field_kelembaban">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                      </select>
                  </div>
                 <div class="form-group col-md-2">
                      <label>Field Tekanan</label>
                      <select class="form-control" id="field_tekanan" type="text" name="field_tekanan">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                      </select>
                  </div>
                  <div class="form-group col-md-2">
                      <label>Field Cahaya</label>
                      <select class="form-control" id="field_cahaya" type="text" name="field_cahaya">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                      </select>
                  </div>
                  <div class="form-group col-md-2">
                      <label>Field Hujan</label>
                      <select class="form-control" id="field_hujan" type="text" name="field_hujan">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                      </select>
                  </div>
                  <div class="form-group col-md-2">
                      <label>Field Embun</label>
                      <select class="form-control" id="field_embun" type="text" name="field_embun">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                      <!-- <label>File Gauge Data Temperatur</label>
                      <input class="form-control" id="gauge_temp" type="text" name="gauge_temp" placeholder="Gaugetemp<nama>" required="required" maxlength="35"> -->
                      <label>File Gauge Data Temperatur</label>
                      <select class="form-control" id="gauge_temp" type="text" name="gauge_temp" required="required">
                        @foreach($gaugetemp as $value)
                          <option value="{{ $value->direktori_file }}">{{ $value->nama_file }}</option>
                        @endforeach      
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                      <!-- <label>File Gauge Data Kelembaban</label>
                      <input class="form-control" id="gauge_kelembaban" type="text" name="gauge_kelembaban" placeholder="Gaugehumidity<nama>" required="required" maxlength="35"> -->
                      <label>File Gauge Data Kelembaban</label>
                      <select class="form-control" id="gauge_kelembaban" type="text" name="gauge_kelembaban" required="required">
                        @foreach($gaugehum as $value)
                          <option value="{{ $value->direktori_file }}">{{ $value->nama_file }}</option>
                        @endforeach      
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                      <!-- <label>File Gauge Data Tekanan Atmosfer</label>
                      <input class="form-control" id="gauge_tekanan" type="text" name="gauge_tekanan" placeholder="Gaugepressure<nama>" required="required" maxlength="35"> -->
                      <label>File Gauge Data Tekanan Atmosfer</label>
                      <select class="form-control" id="gauge_tekanan" type="text" name="gauge_tekanan" required="required">
                        @foreach($gaugepress as $value)
                          <option value="{{ $value->direktori_file }}">{{ $value->nama_file }}</option>
                        @endforeach      
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                      <!-- <label>File Gauge Data Intensitas Cahaya</label>
                      <input class="form-control" id="gauge_cahaya" type="text" name="gauge_cahaya" placeholder="Gaugelight<nama>" required="required" maxlength="35"> -->
                      <label>File Gauge Data Intensitas Cahaya</label>
                      <select class="form-control" id="gauge_cahaya" type="text" name="gauge_cahaya" required="required">
                        @foreach($gaugelight as $value)
                          <option value="{{ $value->direktori_file }}">{{ $value->nama_file }}</option>
                        @endforeach      
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                      <!-- <label>File Gauge Data Curah Hujan</label>
                      <input class="form-control" id="gauge_hujan" type="text" name="gauge_hujan" placeholder="Gaugerain<nama>" required="required" maxlength="35"> -->
                      <label>File Gauge Data Curah Hujan</label>
                      <select class="form-control" id="gauge_hujan" type="text" name="gauge_hujan" required="required">
                        @foreach($gaugerain as $value)
                          <option value="{{ $value->direktori_file }}">{{ $value->nama_file }}</option>
                        @endforeach      
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                      <!-- <label>File Gauge Data Titik Embun</label>
                      <input class="form-control" id="gauge_embun" type="text" name="gauge_embun" placeholder="Gaugedew<nama>" required="required" maxlength="35"> -->
                      <label>File Gauge Data Titik Embun</label>
                      <select class="form-control" id="gauge_embun" type="text" name="gauge_embun" required="required">
                        @foreach($gaugedew as $value)
                          <option value="{{ $value->direktori_file }}">{{ $value->nama_file }}</option>
                        @endforeach      
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                  <label>File Peta</label>
                      <select class="form-control" id="id_peta" type="text" name="id_peta" required="required">
                        @foreach($filepeta as $value)
                          <option value="{{ $value->direktori_file }}">{{ $value->nama_file }}</option>
                        @endforeach      
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                  <label>File Gambar</label>
                      <select class="form-control" id="id_gambar" type="text" name="id_gambar" required="required">
                        <option value="">Pilih File Gambar</option>
                        @foreach($filegambar as $value)
                          <option value="{{ $value->direktori_file }}">{{ $value->nama_file }}</option>
                        @endforeach      
                      </select>
                  </div>
                </div>
                <div class="control-group">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                      <label>iFrame Data Temperatur</label>
                      <input class="form-control" id="iframe_temp" type="text" name="iframe_temp" placeholder="https://thingspeak.com/channels/..." required="required" maxlength="250">
                  </div>
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                      <label>iFrame Data Kelembaban</label>
                      <input class="form-control" id="iframe_kelembaban" type="text" name="iframe_kelembaban" placeholder="https://thingspeak.com/channels/..." required="required" maxlength="250">
                  </div>
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                      <label>iFrame Data Tekanan Atmosfer</label>
                      <input class="form-control" id="iframe_tekanan" type="text" name="iframe_tekanan" placeholder="https://thingspeak.com/channels/..." required="required" maxlength="250">
                  </div>
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                      <label>iFrame Data Intensitas Cahaya</label>
                      <input class="form-control" id="iframe_cahaya" type="text" name="iframe_cahaya" placeholder="https://thingspeak.com/channels/..." required="required" maxlength="250">
                  </div>
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                      <label>iFrame Data Curah Hujan</label>
                      <input class="form-control" id="iframe_hujan" type="text" name="iframe_hujan" placeholder="https://thingspeak.com/channels/..." required="required" maxlength="250">
                  </div>
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                      <label>iFrame Data Titik Embun</label>
                      <input class="form-control" id="iframe_embun" type="text" name="iframe_embun" placeholder="https://thingspeak.com/channels/..." required="required" maxlength="250">
                  </div>
                      <input class="hidden" type="text" name="status" value="Aktif">
                </div>
              <br>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-xl" data-dismiss="modal">Tutup</button>
              <input type="submit" name="submit" class="btn btn-primary btn-xl" value="Simpan Perubahan">
            </form>
          </div>
        </div>
      </div>
    </div>

  <!-- Modal Non Aktif -->
    <div class="modal fade" id="modalstasiunhapus" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3 class="text-center"> Yakin Ingin Menonaktifkan Stasiun Cuaca Ini? </h3>
            <p class="text-center" style="padding-bottom: 10px;" id="nonaktifeditno"></p>
            <form method="post" action="{{route('stasiun.nonaktifkan')}}">
              {{method_field('patch')}}
              @csrf
                <div class="control-group">
                  <input class="hidden" id="nonaktifid" type="text" name="id">
                  <input class="hidden" id="nonaktifnama" type="text" name="nama" required="required" maxlength="30">
                  <input class="hidden" id="nonaktifkota" type="text" name="kota" required="required" maxlength="30">
                  <input class="hidden" id="nonaktifsortingkota_id" type="text" name="sortingkota_id" required="required" maxlength="2">
                  <input class="hidden" id="nonaktiflokasi" type="text" name="lokasi" required="required" maxlength="30">
                  <input class="hidden" id="nonaktifgauge_temp" type="text" name="gauge_temp" required="required" maxlength="35">
                  <input class="hidden" id="nonaktifgauge_kelembaban" type="text" name="gauge_kelembaban" required="required" maxlength="35">
                  <input class="hidden" id="nonaktifgauge_tekanan" type="text" name="gauge_tekanan" required="required" maxlength="35">
                  <input class="hidden" id="nonaktifgauge_cahaya" type="text" name="gauge_cahaya" required="required" maxlength="35">
                  <input class="hidden" id="nonaktifgauge_hujan" type="text" name="gauge_hujan" required="required" maxlength="35">
                  <input class="hidden" id="nonaktifgauge_embun" type="text" name="gauge_embun" required="required" maxlength="35">
                  <input class="hidden" id="nonaktifid_peta" type="text" name="id_peta" required="required" maxlength="30">
                  <input class="hidden" id="nonaktifid_gambar" type="text" name="id_gambar" required="required" maxlength="100">
                  <input class="hidden" id="nonaktififrame_temp" type="text" name="iframe_temp" required="required" maxlength="250">
                  <input class="hidden" id="nonaktififrame_kelembaban" type="text" name="iframe_kelembaban" required="required" maxlength="250">
                  <input class="hidden" id="nonaktififrame_tekanan" type="text" name="iframe_tekanan" required="required" maxlength="250">
                  <input class="hidden" id="nonaktififrame_cahaya" type="text" name="iframe_cahaya" required="required" maxlength="250">
                  <input class="hidden" id="nonaktififrame_hujan" type="text" name="iframe_hujan" required="required" maxlength="250">
                  <input class="hidden" id="nonaktififrame_embun" type="text" name="iframe_embun" required="required" maxlength="250">
                  <input class="hidden" id="nonaktifchannel_ts" type="text" name="channel_ts" required="required" maxlength="10">
                  <input class="hidden" id="nonaktifkunci_api_publik" type="text" name="kunci_api_publik" maxlength="20">
                  <input class="hidden" id="nonaktiffield_temp" type="text" name="field_temp" required="required" maxlength="1">
                  <input class="hidden" id="nonaktiffield_kelembaban" type="text" name="field_kelembaban" required="required" maxlength="1">
                  <input class="hidden" id="nonaktiffield_tekanan" type="text" name="field_tekanan" required="required" maxlength="1">
                  <input class="hidden" id="nonaktiffield_cahaya" type="text" name="field_cahaya" required="required" maxlength="1">
                  <input class="hidden" id="nonaktiffield_hujan" type="text" name="field_hujan" required="required" maxlength="1">
                  <input class="hidden" id="nonaktiffield_embun" type="text" name="field_embun" required="required" maxlength="1">
                  <input class="hidden" type="text" name="status" value="Tidak Aktif">
                </div>
              </div>
              <br>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-xl" data-dismiss="modal">Tutup</button>
              <input type="submit" name="submit" class="btn btn-primary btn-xl" value="Nonaktifkan">
            </form>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
  <script>
        $('#modalstasiunedit').on('show.bs.modal', function (event){
            console.log('modal terbuka');

            var button =$(event.relatedTarget)
            
            var id = button.data('id')
            var no = button.data('no')
            var kota = button.data('kota')
            var id_kota = button.data('id_kota')
            var lokasi = button.data('lokasi')
            var nama = button.data('nama')
            var id_peta = button.data('id_peta')
            var id_gambar = button.data('id_gambar')
            var gauge_temp = button.data('gauge_temp')
            var gauge_kelembaban = button.data('gauge_kelembaban')
            var gauge_tekanan = button.data('gauge_tekanan')
            var gauge_cahaya = button.data('gauge_cahaya')
            var gauge_hujan = button.data('gauge_hujan')
            var gauge_embun = button.data('gauge_embun')
            var iframe_temp = button.data('iframe_temp')
            var iframe_kelembaban = button.data('iframe_kelembaban')
            var iframe_tekanan = button.data('iframe_tekanan')
            var iframe_cahaya = button.data('iframe_cahaya')
            var iframe_hujan = button.data('iframe_hujan')
            var iframe_embun = button.data('iframe_embun')
            var field_temp = button.data('field_temp')
            var field_kelembaban = button.data('field_kelembaban')
            var field_tekanan = button.data('field_tekanan')
            var field_cahaya = button.data('field_cahaya')
            var field_hujan = button.data('field_hujan')
            var field_embun = button.data('field_embun')
            var channel_ts = button.data('channel_ts')
            var kunci_api_publik = button.data('kunci_api_publik')
            
            var modal = $(this)

            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #editno').text('No/ID : ['+no+']')
            modal.find('.modal-body #kota').val(kota)
            modal.find('.modal-body #sortingkota_id').val(id_kota)
            modal.find('.modal-body #lokasi').val(lokasi)
            modal.find('.modal-body #nama').val(nama)
            modal.find('.modal-body #id_peta').val(id_peta)
            modal.find('.modal-body #id_gambar').val(id_gambar)
            modal.find('.modal-body #gauge_temp').val(gauge_temp)
            modal.find('.modal-body #gauge_kelembaban').val(gauge_kelembaban)
            modal.find('.modal-body #gauge_tekanan').val(gauge_tekanan)
            modal.find('.modal-body #gauge_cahaya').val(gauge_cahaya)
            modal.find('.modal-body #gauge_hujan').val(gauge_hujan)
            modal.find('.modal-body #gauge_embun').val(gauge_embun)
            modal.find('.modal-body #iframe_temp').val(iframe_temp)
            modal.find('.modal-body #iframe_kelembaban').val(iframe_kelembaban)
            modal.find('.modal-body #iframe_tekanan').val(iframe_tekanan)
            modal.find('.modal-body #iframe_cahaya').val(iframe_cahaya)
            modal.find('.modal-body #iframe_hujan').val(iframe_hujan)
            modal.find('.modal-body #iframe_embun').val(iframe_embun)
            modal.find('.modal-body #field_temp').val(field_temp)
            modal.find('.modal-body #field_kelembaban').val(field_kelembaban)
            modal.find('.modal-body #field_tekanan').val(field_tekanan)
            modal.find('.modal-body #field_cahaya').val(field_cahaya)
            modal.find('.modal-body #field_hujan').val(field_hujan)
            modal.find('.modal-body #field_embun').val(field_embun)
            modal.find('.modal-body #channel_ts').val(channel_ts)
            modal.find('.modal-body #kunci_api_publik').val(kunci_api_publik)
        })
  </script>

  <script>
        $('#modalstasiunhapus').on('show.bs.modal', function (event){
            console.log('modal terbuka');

            var button =$(event.relatedTarget)
            
            var id = button.data('id')
            var no = button.data('no')
            var kota = button.data('kota')
            var id_kota = button.data('id_kota')
            var lokasi = button.data('lokasi')
            var nama = button.data('nama')
            var id_peta = button.data('id_peta')
            var id_gambar = button.data('id_gambar')
            var gauge_temp = button.data('gauge_temp')
            var gauge_kelembaban = button.data('gauge_kelembaban')
            var gauge_tekanan = button.data('gauge_tekanan')
            var gauge_cahaya = button.data('gauge_cahaya')
            var gauge_hujan = button.data('gauge_hujan')
            var gauge_embun = button.data('gauge_embun')
            var iframe_temp = button.data('iframe_temp')
            var iframe_kelembaban = button.data('iframe_kelembaban')
            var iframe_tekanan = button.data('iframe_tekanan')
            var iframe_cahaya = button.data('iframe_cahaya')
            var iframe_hujan = button.data('iframe_hujan')
            var iframe_embun = button.data('iframe_embun')
            var field_temp = button.data('field_temp')
            var field_kelembaban = button.data('field_kelembaban')
            var field_tekanan = button.data('field_tekanan')
            var field_cahaya = button.data('field_cahaya')
            var field_hujan = button.data('field_hujan')
            var field_embun = button.data('field_embun')
            var channel_ts = button.data('channel_ts')
            var kunci_api_publik = button.data('kunci_api_publik')
            
            var modal = $(this)

            modal.find('.modal-body #nonaktifid').val(id)
            modal.find('.modal-body #nonaktifeditno').text('No/ID : ['+no+']')
            modal.find('.modal-body #nonaktifkota').val(kota)
            modal.find('.modal-body #nonaktifsortingkota_id').val(id_kota)
            modal.find('.modal-body #nonaktiflokasi').val(lokasi)
            modal.find('.modal-body #nonaktifnama').val(nama)
            modal.find('.modal-body #nonaktifid_peta').val(id_peta)
            modal.find('.modal-body #nonaktifid_gambar').val(id_gambar)
            modal.find('.modal-body #nonaktifgauge_temp').val(gauge_temp)
            modal.find('.modal-body #nonaktifgauge_kelembaban').val(gauge_kelembaban)
            modal.find('.modal-body #nonaktifgauge_tekanan').val(gauge_tekanan)
            modal.find('.modal-body #nonaktifgauge_cahaya').val(gauge_cahaya)
            modal.find('.modal-body #nonaktifgauge_hujan').val(gauge_hujan)
            modal.find('.modal-body #nonaktifgauge_embun').val(gauge_embun)
            modal.find('.modal-body #nonaktififrame_temp').val(iframe_temp)
            modal.find('.modal-body #nonaktififrame_kelembaban').val(iframe_kelembaban)
            modal.find('.modal-body #nonaktififrame_tekanan').val(iframe_tekanan)
            modal.find('.modal-body #nonaktififrame_cahaya').val(iframe_cahaya)
            modal.find('.modal-body #nonaktififrame_hujan').val(iframe_hujan)
            modal.find('.modal-body #nonaktififrame_embun').val(iframe_embun)
            modal.find('.modal-body #nonaktiffield_temp').val(field_temp)
            modal.find('.modal-body #nonaktiffield_kelembaban').val(field_kelembaban)
            modal.find('.modal-body #nonaktiffield_tekanan').val(field_tekanan)
            modal.find('.modal-body #nonaktiffield_cahaya').val(field_cahaya)
            modal.find('.modal-body #nonaktiffield_hujan').val(field_hujan)
            modal.find('.modal-body #nonaktiffield_embun').val(field_embun)
            modal.find('.modal-body #nonaktifchannel_ts').val(channel_ts)
            modal.find('.modal-body #nonaktifkunci_api_publik').val(kunci_api_publik)
        })
  </script>
@endsection