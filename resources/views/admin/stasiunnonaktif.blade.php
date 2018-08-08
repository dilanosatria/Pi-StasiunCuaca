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
      <h3 class="card-title">Tabel Informasi IoT Stasiun Cuaca Non Aktif</h3>
      @if (count($stasiunnonaktif) === 0)
        <br>
        <h3 style="padding-bottom: 35px;"> Belum ada stasiun cuaca non aktif. </h3>
      @endif
    </div>
  </div>

  <br>

  <div class="box-body">
    <?php $no =1;?>
    @foreach($stasiunnonaktif->sortByDesc('updated_at') as $key=> $value)
    <div class="card">
      <div class="card-header">
        <div id="textbox">
          <p class="alignleft"><b>No/ID : </b> [{{ $no++ }}/{{ $value->id }}]</p>
          <p class="alignright"><b>Dinonaktifkan : </b>[{{ $value->created_at->format('D, d-M-Y, H:i') }}]
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
        <li class="list-group-item"><b>Status </b><p style="color:red;">{{ $value->status }}</p></li>
      </ul>
      <div class="card-footer text-muted text-right">
        <a class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus stasiun cuaca {{ $value->nama }}?')" href="/delete/stasiunnonaktif/{{ $value->id }}"><i class="fa fa-trash"></i> Hapus Permanen Stasiun Cuaca</a>
        <a class="btn btn-primary" 
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
          data-toggle="modal" data-target="#modalstasiunaktif"><i class="fa fa-check"></i> Aktifkan Stasiun Cuaca</a>
      </div>
      <br>
    </div>
    @endforeach
    {!! $stasiunnonaktif->links(); !!}
  </div>

  <!-- Modal Aktifkan kembali -->
    <div class="modal fade" id="modalstasiunaktif" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3 class="text-center"> Aktifkan Stasiun Cuaca Ini? </h3>
            <p class="text-center" style="padding-bottom: 10px;" id="aktifeditno"></p>
            <form method="post" action="{{route('stasiun.aktif')}}">
              {{method_field('patch')}}
              @csrf
                <div class="control-group">
                  <input class="hidden" id="aktifid" type="text" name="id">
                  <input class="hidden" id="aktifnama" type="text" name="nama" required="required" maxlength="30">
                  <input class="hidden" id="aktifkota" type="text" name="kota" required="required" maxlength="30">
                  <input class="hidden" id="aktifsortingkota_id" type="text" name="sortingkota_id" required="required" maxlength="2">
                  <input class="hidden" id="aktiflokasi" type="text" name="lokasi" required="required" maxlength="30">
                  <input class="hidden" id="aktifgauge_temp" type="text" name="gauge_temp" required="required" maxlength="35">
                  <input class="hidden" id="aktifgauge_kelembaban" type="text" name="gauge_kelembaban" required="required" maxlength="35">
                  <input class="hidden" id="aktifgauge_tekanan" type="text" name="gauge_tekanan" required="required" maxlength="35">
                  <input class="hidden" id="aktifgauge_cahaya" type="text" name="gauge_cahaya" required="required" maxlength="35">
                  <input class="hidden" id="aktifgauge_hujan" type="text" name="gauge_hujan" required="required" maxlength="35">
                  <input class="hidden" id="aktifgauge_embun" type="text" name="gauge_embun" required="required" maxlength="35">
                  <input class="hidden" id="aktifid_peta" type="text" name="id_peta" required="required" maxlength="30">
                  <input class="hidden" id="aktifid_gambar" type="text" name="id_gambar" required="required" maxlength="100">
                  <input class="hidden" id="aktififrame_temp" type="text" name="iframe_temp" required="required" maxlength="250">
                  <input class="hidden" id="aktififrame_kelembaban" type="text" name="iframe_kelembaban" required="required" maxlength="250">
                  <input class="hidden" id="aktififrame_tekanan" type="text" name="iframe_tekanan" required="required" maxlength="250">
                  <input class="hidden" id="aktififrame_cahaya" type="text" name="iframe_cahaya" required="required" maxlength="250">
                  <input class="hidden" id="aktififrame_hujan" type="text" name="iframe_hujan" required="required" maxlength="250">
                  <input class="hidden" id="aktififrame_embun" type="text" name="iframe_embun" required="required" maxlength="250">
                  <input class="hidden" id="aktifchannel_ts" type="text" name="channel_ts" required="required" maxlength="10">
                  <input class="hidden" id="aktifkunci_api_publik" type="text" name="kunci_api_publik" maxlength="20">
                  <input class="hidden" id="aktiffield_temp" type="text" name="field_temp" required="required" maxlength="1">
                  <input class="hidden" id="aktiffield_kelembaban" type="text" name="field_kelembaban" required="required" maxlength="1">
                  <input class="hidden" id="aktiffield_tekanan" type="text" name="field_tekanan" required="required" maxlength="1">
                  <input class="hidden" id="aktiffield_cahaya" type="text" name="field_cahaya" required="required" maxlength="1">
                  <input class="hidden" id="aktiffield_hujan" type="text" name="field_hujan" required="required" maxlength="1">
                  <input class="hidden" id="aktiffield_embun" type="text" name="field_embun" required="required" maxlength="1">
                  <input class="hidden" type="text" name="status" value="Aktif">
                </div>
              </div>
              <br>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-xl" data-dismiss="modal">Tutup</button>
              <input type="submit" name="submit" class="btn btn-primary btn-xl" value="Aktifkan">
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
        $('#modalstasiunaktif').on('show.bs.modal', function (event){
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

            modal.find('.modal-body #aktifid').val(id)
            modal.find('.modal-body #aktifeditno').text('No/ID : ['+no+']')
            modal.find('.modal-body #aktifkota').val(kota)
            modal.find('.modal-body #aktifsortingkota_id').val(id_kota)
            modal.find('.modal-body #aktiflokasi').val(lokasi)
            modal.find('.modal-body #aktifnama').val(nama)
            modal.find('.modal-body #aktifid_peta').val(id_peta)
            modal.find('.modal-body #aktifid_gambar').val(id_gambar)
            modal.find('.modal-body #aktifgauge_temp').val(gauge_temp)
            modal.find('.modal-body #aktifgauge_kelembaban').val(gauge_kelembaban)
            modal.find('.modal-body #aktifgauge_tekanan').val(gauge_tekanan)
            modal.find('.modal-body #aktifgauge_cahaya').val(gauge_cahaya)
            modal.find('.modal-body #aktifgauge_hujan').val(gauge_hujan)
            modal.find('.modal-body #aktifgauge_embun').val(gauge_embun)
            modal.find('.modal-body #aktififrame_temp').val(iframe_temp)
            modal.find('.modal-body #aktififrame_kelembaban').val(iframe_kelembaban)
            modal.find('.modal-body #aktififrame_tekanan').val(iframe_tekanan)
            modal.find('.modal-body #aktififrame_cahaya').val(iframe_cahaya)
            modal.find('.modal-body #aktififrame_hujan').val(iframe_hujan)
            modal.find('.modal-body #aktififrame_embun').val(iframe_embun)
            modal.find('.modal-body #aktiffield_temp').val(field_temp)
            modal.find('.modal-body #aktiffield_kelembaban').val(field_kelembaban)
            modal.find('.modal-body #aktiffield_tekanan').val(field_tekanan)
            modal.find('.modal-body #aktiffield_cahaya').val(field_cahaya)
            modal.find('.modal-body #aktiffield_hujan').val(field_hujan)
            modal.find('.modal-body #aktiffield_embun').val(field_embun)
            modal.find('.modal-body #aktifchannel_ts').val(channel_ts)
            modal.find('.modal-body #aktifkunci_api_publik').val(kunci_api_publik)
        })
  </script>
@endsection