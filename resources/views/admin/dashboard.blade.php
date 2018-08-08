@extends('adminlte::page')

@section('content')

  <style>
  .bg-danger{
    color: white;
    background-color: #DC3545;
  }
  .bg-info{
    color: white;
    background-color: #17A2B8;
  }
  .bg-warning{
    color: white;
    background-color: #FFC107;
  }
  .bg-success{
    color: white;
    background-color: #28A745;
  }
  .bg-dark{
    color:white;
    background-color:#6c757d;
  }
  </style>

  <div class="card">
    <div class="card-header">
      <h1 class="display-4">Dashboard Stasiun Cuaca</h1>
      <p class="lead">Selamat Datang!</p>
    </div>
  </div>

  <div class="box-body">
    
     <!-- Small Box (Stat card) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $admincount }}</h3>

                <p>Akun Admin</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="/admin/pengguna" class="small-box-footer">
                Manajemen Akun <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $beritacount }}</h3>

                <p>Berita</p>
              </div>
              <div class="icon">
                <i class="fa fa-newspaper-o"></i>
              </div>
              <a href="/admin/berita" class="small-box-footer">
                Menajemen Berita <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $pesancount }}</h3>

                <p>Pesan</p>
              </div>
              <div class="icon">
                <i class="fa fa-envelope"></i>
              </div>
              <a href="/admin/pesan" class="small-box-footer">
                Manajemen Pesan <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $komentarcount }}</h3>

                <p>Komentar</p>
              </div>
              <div class="icon">
                <i class="fa fa-comments"></i>
              </div>
              <a href="/admin/komentar" class="small-box-footer">
                Manajemen Komentar <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $stasiuncount}}</h3>

                <p>Stasiun Cuaca</p>
              </div>
              <div class="icon">
                <i class="fa fa-cog"></i>
              </div>
              <a href="/admin/komentar" class="small-box-footer">
                Manajemen Stasiun Cuaca <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>
</div>

<div class="card">
    <div class="card-header">
      <h3 class="card-title">Penyimpanan Berkas</h3>
    </div>
  </div>

  <div class="box-body">
    
     <!-- Small Box (Stat card) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>{{ $filepetacount }}</h3>

                <p>Berkas Peta</p>
              </div>
              <div class="icon">
                <i class="fa fa-map-marker text-white"></i>
              </div>
              <a href="/admin/stasiunfilemanager" class="small-box-footer">
                Manajemen File <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>{{ $filegaugecount }}</h3>

                <p>Berkas Gauge</p>
              </div>
              <div class="icon">
                <i class="fa fa-dashboard text-white"></i>
              </div>
              <a href="/admin/stasiunfilemanager" class="small-box-footer">
                Manajemen File <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>{{ $filegambarcount }}</h3>

                <p>Berkas Gambar</p>
              </div>
              <div class="icon">
                <i class="fa fa-image text-white"></i>
              </div>
              <a href="/admin/webfilemanager" class="small-box-footer">
                Manajemen File <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
</div>
</div>

@endsection

@section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
