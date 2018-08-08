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
      <h3 class="card-title">Tabel Informasi Berita Non Aktif</h3>
      @if (count($beritalama) === 0)
        <br>
        <h3 style="padding-bottom: 35px;"> Belum ada berita non aktif. </h3>
      @endif
    </div>
  </div>

  <br>

  <div class="box-body">
    <?php $no =1;?>
    @foreach($beritalama->sortByDesc('updated_at') as $key=> $value)
    <div class="card">
      <div class="card-header">
        <div id="textbox">
          <p class="alignleft"><b>No/ID : </b> [{{ $no++ }}/{{ $value->id }}]</p>
          <p class="alignright"><b>Dibuat : </b>[{{ $value->created_at->format('D, d-M-Y, H:i') }}]
          <b> Di-nonaktifkan : </b>[{{ $value->updated_at->format('D, d-M-Y, H:i') }}]</p>
        </div>
        <div style="clear: both;"></div>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><b>Perihal </b><p>{{ $value->perihal }}</p></li>
        <li class="list-group-item"><b>Kolom Berita 1 </b><p>{{ $value->kol_berita1 }}</p></li>
        <li class="list-group-item"><b>Kolom Berita 2 </b><p>{{ $value->kol_berita2 }}</p></li>
        <li class="list-group-item"><b>Kolom Berita 3 </b><p>{{ $value->kol_berita3 }}</p></li>
        <li class="list-group-item"><b>Link </b><p>{{ $value->link }}</p></li>
        <li class="list-group-item"><b>Gambar </b><p>{{ $value->linkgambar }}</p></li>
        <li class="list-group-item"><b>Status </b><p style="color:red;">{{ $value->status }}</p></li>
      </ul>
      <div class="card-footer text-muted text-right">
        <a class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus berita tentang {{ $value->perihal }}?')" href="/delete/beritanonaktif/{{ $value->id }}"><i class="fa fa-trash"></i> Hapus Permanen Berita</a>
        <a class="btn btn-primary" 
          data-no="{{ $no-1 }}/{{ $value->id }}"
          data-id="{{ $value->id }}"
          data-perihal="{{ $value->perihal }}"
          data-berita1="{{ $value->kol_berita1 }}"
          data-berita2="{{ $value->kol_berita2 }}"
          data-berita3="{{ $value->kol_berita3 }}"
          data-link="{{ $value->link }}"
          data-gambar="{{ $value->linkgambar }}"
          data-status="{{ $value->status }}"
          data-toggle="modal" data-target="#modalberitaaktif"><i class="fa fa-check"></i> Aktifkan Berita</a>
      </div>
      <br>
    </div>
    @endforeach
    {!! $beritalama->links(); !!}
  </div>

<!-- Modal aktifkankembali -->
    <div class="modal fade" id="modalberitaaktif" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3 class="text-center"> Aktifkan Berita Kembali? </h3>
            <p class="text-center" style="padding-bottom: 10px;" id="editno"></p>
            <form method="post" action="{{route('berita.aktif')}}">
              {{method_field('patch')}}
              @csrf
                <div class="control-group">
                  <input class="hidden" id="editid" type="text" name="id">
                  <input class="hidden" id="editperihal" type="text" name="perihal">
                  <textarea class="hidden" rows="5" id="editkol_berita1" type="text" name="kol_berita1"></textarea>
                  <textarea class="hidden" rows="5" id="editkol_berita2" type="text" name="kol_berita2"></textarea>
                  <textarea class="hidden" rows="5" id="editkol_berita3" type="text" name="kol_berita3"></textarea>
                  <input class="hidden" id="editlink" type="text" name="link">
                  <input class="hidden" id="editlinkgambar" type="text" name="linkgambar">
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
        $('#modalberitaaktif').on('show.bs.modal', function (event){
            console.log('modal terbuka');

            var button =$(event.relatedTarget)
            
            var id = button.data('id')
            var no = button.data('no')
            var perihal = button.data('perihal')
            var berita1 = button.data('berita1')
            var berita2 = button.data('berita2')
            var berita3 = button.data('berita3')
            var link = button.data('link')
            var gambar = button.data('gambar')
            var status = button.data('status')
            
            var modal = $(this)

            modal.find('.modal-body #editid').val(id)
            modal.find('.modal-body #editno').text('No/ID : ['+no+']')
            modal.find('.modal-body #editperihal').val(perihal)
            modal.find('.modal-body #editkol_berita1').val(berita1)
            modal.find('.modal-body #editkol_berita2').val(berita2)
            modal.find('.modal-body #editkol_berita3').val(berita3)
            modal.find('.modal-body #editlink').val(link)
            modal.find('.modal-body #editlinkgambar').val(gambar)
            modal.find('.modal-body #editstatus').val(status)
        })
    </script>
@endsection