@extends('adminlte::page')

@section('content')
<style>
thead{
  /*background-image: linear-gradient(to right, #395d92, #0088bf, #00b2ba, #00d580, #a8eb12);*/
  background-image: linear-gradient(to right, #395d92, #0083b5, #00a7ac, #00c47b, #a4d635);
  color:white;
}
</style>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tabel Pengaturan Kota Lokasi IoT</h3>
      <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modaltambah"><i class="fa fa-plus"></i> Tambah Listing Kota</button>
      @if (count($sortingkota) === 0)
        <br>
        <h3 style="padding-bottom: 35px;"> Belum ada Kota. </h3>
      @endif
    </div>
  </div>

  <div class="table-responsive">
    <div class="box-body">
          <table class="table table-striped table-hover" id="Komentar-table">
            <thead>
              <th>No</th>
              <th>ID</th>
              <th>Kota</th>
              <th>Waktu Dibuat</th>
              <th>Waktu Diubah</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              <?php $no =1;?>
              @foreach($sortingkota->sortByDesc('created_at') as $key=> $value)
                <tr>
                  <th>{{ $no++ }}</th>
                  <td>{{ $value->id }}</td>
                  <td>{{ $value->kota }}</td>
                  <td>{{ $value->created_at }}</td>
                  <th>{{ $value->updated_at }}</th>
                  <td style="word-wrap: break-word;min-width: 100px;max-width: 60px;">
                    <a class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus listing kota {{ $value->kota }}? Mengubah atau menghapus item ini diharuskan untuk mengubah record tabel stasiun')" href="/delete/kota/{{ $value->id }}"><i class="fa fa-trash"></i></a>
                    <a class="btn btn-warning" 
                        data-id="{{ $value->id }}"
                        data-kota="{{ $value->kota }}"
                        data-toggle="modal" data-target="#modalubah"><i class="fa fa-edit"></i> Ubah</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
  </div>
  <!-- Modal Tambah -->
    <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3 class="text-center" style="padding-bottom: 10px;"> Tambah Listing Kota </h3>
            <form method="post" action="kota/store">
              @csrf
                <div class="control-group">
                  <div class="form-row">
                  <div class="form-group col-md-12">
                      <label>Nama Kota</label>
                      <input class="form-control" id="kota" type="text" name="kota" placeholder="co: Depok" maxlength="30">
                  </div>
                </div>
                </div>
              <br>
              <br>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-xl" data-dismiss="modal">Tutup</button>
              <button type="submit" name="submit" class="btn btn-primary" id="sendMessageButton">Tambah</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  <!-- Modal Ubah -->
    <div class="modal fade" id="modalubah" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3 class="text-center" style="padding-bottom: 10px;"> Ubah Listing Kota </h3>
            <form method="post" action="{{ route('kota.update') }}">
              {{method_field('patch')}}
              @csrf
                <p style="color:red;">Yakin ingin mengubah listing kota ini? Mengubah atau menghapus item ini diharuskan untuk mengubah record tabel stasiun</p>
                <div class="control-group">
                  <input class="hidden" id="id" type="text" name="id">
                  <div class="form-row">
                  <div class="form-group col-md-12">
                      <label>Nama Kota</label>
                      <input class="form-control" id="kota" type="text" name="kota" placeholder="co: Depok" maxlength="30">
                  </div>
                </div>
                </div>
              <br>
              <br>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-xl" data-dismiss="modal">Tutup</button>
              <button type="submit" name="submit" class="btn btn-primary" id="sendMessageButton">Ubah</button>
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
        $('#modalubah').on('show.bs.modal', function (event){
            console.log('modal terbuka');

            var button =$(event.relatedTarget)
            
            var id = button.data('id')
            var kota = button.data('kota')
            
            var modal = $(this)

            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #kota').val(kota)
        })
    </script>
@endsection