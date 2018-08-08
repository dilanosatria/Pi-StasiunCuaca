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
      <h3 class="card-title">Tabel Berkas Peta Stasiun Cuaca</h3>
      <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modaluploadpeta"><i class="fa fa-map-marker"></i> Unggah Berkas Peta</button>
      <a class="btn btn-warning btn-lg" href="{{ asset('pages/peta/MapsTemplate.html') }}" download="{{ asset('pages/peta/MapsTemplate.html') }}"><i class="fa fa-download"></i> Unduh Berkas Template Peta</a>
      @if (count($filepeta) === 0)
        <br>
        <h3 style="padding-bottom: 35px;"> Belum ada peta. </h3>
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
              @foreach($filepeta->sortByDesc('created_at') as $key=> $value)
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
          {!! $filepeta->links(); !!}
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tabel Berkas Gauge Stasiun Cuaca</h3>
      <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modaluploadgauge"><i class="fa fa-dashboard"></i> Unggah Berkas Gauge</button>
      <button class="btn btn-warning btn-lg" data-toggle="modal" data-target="#modaldownloadtemplate"><i class="fa fa-download"></i> Unduh Berkas Template Gauge</button>
      @if (count($filegauge) === 0)
        <h3 style="padding-bottom: 35px;"> Belum ada gauge. </h3>
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
              @foreach($filegauge->sortByDesc('created_at') as $key=> $value)
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
          {!! $filegauge->links(); !!}
    </div>
  </div>

  <!-- Modal Upload Peta -->
    <div class="modal fade" id="modaluploadpeta" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3 class="text-center" style="padding-bottom: 10px;"> Tambah Berkas Peta Stasiun Cuaca</h3>

            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

              <form action="{{ route('peta.upload') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                <div class="form-group {{ !$errors->has('nama_file') ?: 'has-error' }}">
                  <label>Nama Berkas</label>
                    <input type="text" name="nama_file" class="form-control" placeholder="Maps[Nama].html" maxlength="50">
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

  <!-- Modal Upload Gauge -->
    <div class="modal fade" id="modaluploadgauge" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3 class="text-center" style="padding-bottom: 10px;"> Tambah Berkas Gauge Stasiun Cuaca</h3>

            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

              <form action="{{ route('gauge.upload') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                <div class="form-group {{ !$errors->has('nama_file') ?: 'has-error' }}">
                  <label>Nama Berkas</label>
                    <input type="text" name="nama_file" class="form-control" placeholder="Gauges[temp/humidity/pressure/light/rain/dew][Nama].html" maxlength="50">
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

  <!-- Modal Download Template Gauge -->
    <div class="modal fade" id="modaldownloadtemplate" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">
            <h3 class="text-center" style="padding-bottom: 10px;"> Unduh Template Gauge</h3>
            <div class="btn-group" role="group" aria-label="Basic example" style="padding-bottom: 20px;">
                <a class="btn btn-warning" href="{{ asset('pages/templategauge/Templatetemp.html') }}" download="{{ asset('pages/templategauge/Templatetemp.html') }}"><i class="fa fa-download"></i> Gauge Temp</a>
                <a class="btn btn-warning" href="{{ asset('pages/templategauge/TemplateGaugehumidity.html') }}" download="{{ asset('pages/templategauge/TemplateGaugehumidity.html') }}"><i class="fa fa-download"></i> Gauge Humidity</a>
                <a class="btn btn-warning" href="{{ asset('pages/templategauge/TemplateGaugelight.html') }}" download="{{ asset('pages/templategauge/TemplateGaugelight.html') }}"><i class="fa fa-download"></i> Gauge Light</a>
                <a class="btn btn-warning" href="{{ asset('pages/templategauge/TemplateGaugepressure.html') }}" download="{{ asset('pages/templategauge/TemplateGaugepressure.html') }}"><i class="fa fa-download"></i> Gauge Pressure</a>
                <a class="btn btn-warning" href="{{ asset('pages/templategauge/TemplateGaugerain.html') }}" download="{{ asset('pages/templategauge/TemplateGaugerain.html') }}"><i class="fa fa-download"></i> Gauge Rain</a>
                <a class="btn btn-warning" href="{{ asset('pages/templategauge/TemplateGaugedew.html') }}" download="{{ asset('pages/templategauge/TemplateGaugedew.html') }}"><i class="fa fa-download"></i> Gauge Dew</a>
            </div>
              <br>
            <div class="btn-group" role="group" aria-label="Basic example" style="padding-bottom: 20px;">
                <a class="btn btn-warning" href="{{ asset('pages/css/custommeter.css') }}" download="{{ asset('pages/css/custommeter.css') }}"><i class="fa fa-download"></i> CSS Gauge</a>
                <a class="btn btn-warning" href="{{ asset('pages/js/custommeterloader.js') }}" download="{{ asset('pages/js/custommeterloader.js') }}"><i class="fa fa-download"></i> JS Gauge</a>
            </div>
              <br>
          </div>
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-xl" data-dismiss="modal">Tutup</button>
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