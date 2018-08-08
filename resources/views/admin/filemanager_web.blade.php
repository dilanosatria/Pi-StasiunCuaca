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
      <h3 class="card-title">Tabel Berkas Gambar</h3>
      <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modaluploadgambar"><i class="fa fa-image"></i> Unggah Berkas Gambar</button>
      @if (count($filegambar) === 0)
        <br>
        <h3 style="padding-bottom: 35px;"> Belum ada gambar. </h3>
      @endif
    </div>
  </div>

  <div class="table-responsive">
    <div class="box-body">
          <table class="table table-striped table-hover">
            <thead>
              <th>No</th>
              <th>ID</th>
              <th>Nama Berkas</th>
              <th>Berkas</th>
              <th>Jenis Berkas</th>
              <th>Waktu Diunggah</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              <?php $no =1;?>
              @foreach($filegambar->sortByDesc('created_at') as $key=> $value)
                <tr>
                  <th>{{ $no++ }}</th>
                  <td>{{ $value->id }}</td>
                  <td>{{ $value->nama_file }}</td>
                  <td>{{ $value->direktori_file }}</td>
                  <td>{{ $value->jenis_file }}</td>
                  <td>{{ $value->created_at->diffForHumans() }}</td>
                  <td>
                  <a class="btn btn-primary" href="/storage/{{ $value->direktori_file }}" target="_blank"><i class="fa fa-search-plus"></i> Lihat</a>
                  <a class="btn btn-info" href="/storage/{{ $value->direktori_file }}" download="/storage/{{ $value->direktori_file }}"><i class="fa fa-download"></i> Unduh</a>
                  <a class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus berkas {{ $value->nama_file }}?')" href="/delete/file/{{ $value->id }}"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {!! $filegambar->links(); !!}
    </div>
  </div>

  <!-- Modal Upload Gambar -->
    <div class="modal fade" id="modaluploadgambar" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3 class="text-center" style="padding-bottom: 10px;"> Unggah Berkas Gambar</h3>

            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

              <form action="{{ route('gambar.upload') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                <div class="form-group {{ !$errors->has('nama_file') ?: 'has-error' }}">
                  <label>Nama Berkas</label>
                    <input type="text" name="nama_file" class="form-control" placeholder="[Nama_Gambar].[Ekstensi_Gambar]" maxlength="50">
                      <span class="help-block text-danger">{{ $errors->first('nama_file') }}</span>
                      <a>Isi untuk mengubah nama file atau biarkan kosong untuk menggunakan nama asli file</a>
                </div>
                <div class="form-group {{ !$errors->has('direktori_file') ?: 'has-error' }}">
                  <label>Berkas</label>
                    <input type="file" name="direktori_file">
                      <span class="help-block text-danger">{{ $errors->first('direktori_file') }}</span>
                </div>
              <br>
          </div>
          <div class="modal-footer">
              <div class="form-actions">
                <button type="button" class="btn btn-secondary btn-xl" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Unggah</button>
                </div>
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
  </script>
@endsection