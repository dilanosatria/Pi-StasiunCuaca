@extends('layouts.master')
@extends('layouts.footer')
<!DOCTYPE html>
<html lang="en">

  <head>
    <title>PI - Stasiun Cuaca IoT</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">
    <link href="css/sidebar.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <link href="css/weather-icons.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

  <!-- Sidebar -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3> </h3>
      </div>
      <div class="sidebar-header">
        <h3> </h3>
      </div>
      <div id="dismiss">
        <i class="fa fa-arrow-left fa-2x faa-parent animated-hover faa-horizontal"></i>
      </div>
      <ul class="list-unstyled components">
        <br>
        <p class="textsidebar">Lokasi Stasiun Cuaca</p>
        <li>
          @foreach($menu as $item)
          <a href="#pageSubmenu{{$item->kota}}" data-toggle="collapse" aria-expanded="false">{{$item->kota}}</a>
          @if ($item->stasiun->count())
          <ul class="collapse list-unstyled" id="pageSubmenu{{$item->kota}}">
            @foreach($item->stasiun as $value)
            <li><a id="{{ $value->id }}" class="collapse list-unstyled js-scroll-trigger" 
                data-id="{{ $value->id }}"
                data-kota="{{ $value->kota }}"
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
                data-kunciapi="{{ $value->kunci_api_publik }}"
                data-channel="{{ $value->channel_ts }}"
                data-toggle="modal" href="#page-top" data-target="#test" onclick="showdata(); dodata('{{ $value->id }}');doupdatedata('{{ $value->id }}')">{{ $value->nama }}</a>
          </li>
          @endforeach
          </ul>
          @endif
          @endforeach
        </li>
      </ul>
      <ul class="list-unstyled components">
        <p class="textsidebar2">Navigasi Halaman</p>
        <li><a href="/berita">Berita <span class="badge badge-light">{{ $beritacount }}</span></a></li>
        <li><a href="/pengenalaniot">Apa itu Stasiun Cuaca IoT?</span></a></li>
      </ul>
      <ul class="list-unstyled CTAs">
        <li><a href="#page-top" class="download" onclick="doPageReset()"><i class="fas fa-undo"></i> Reset Data</a></li>
        <br>
      </ul>
    </nav>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><i class="fa fa-globe"></i> Stasiun Cuaca</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase bg-outline-white text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  Menu
                  <i class="fa fa-bars"></i>
                </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#page-top">Peta</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Data</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Tentang</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Kontak</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" id="sidebarCollapse" onclick="dohidedata();" href="#"><i class="fas fa-align-left"></i> Navigasi</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Bagian Informasi & Peta -->
    <div id="wrapper">
    <div id="google_map">
      <object class="peta" standby="loading data" id="headermaps" title="loading" type="text/html" data="pages/peta/MapsEmpty.html"></object>
    </div>

    <div id="over_map">
      <button id="tombolcollapse" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#infocolapse" aria-expanded="false" aria-controls="infocolapse"><i class="fas fa-info"></i>
 Informasi Cuaca</button>
      <br>
      <br>
      <div class="row kartuinformasi">
        <div class="col">
          <div class="collapse multi-collapse" id="infocolapse">
            <div class="card card-body kartuinformasi-body">
              <div class="card kartuinformasi-card">
              <img id="gambariot" class="img-fluid rounded mx-auto d-block" alt="Responsive image" src="img/Pilih.gif" width="300px" height="300px">
              <div class="card-body">
                <h5 id="lokasi" class="card-title">Data Stasiun Cuaca</h5>
                <p id="intro" class="card-text text-dark">Silahkan memilih stasiun cuaca terlebih dahulu melalui menu navigasi.</p>
                <div class="collapse multi-collapse" id="infocolapse2">
                <p class="card-text text-dark"><i class="wi wi-thermometer biru"></i> Temperatur: <a id="data-1" class="card-text text-dark">-<a class="card-text text-dark">&deg;C</a></a></p>
                <p class="card-text text-dark"><i class="wi wi-humidity biru"></i> Kelembaban: <a id="data-2" class="card-text text-dark">-<a class="card-text text-dark">%</a></a></p>
                <p class="card-text text-dark"><i class="wi wi-barometer biru"></i> Tekanan Atm: <a id="data-3" class="card-text text-dark">-<a class="card-text text%-dark"> hPa</a></a></p>
                <p class="card-text text-dark"><i class="wi wi-day-sunny biru"></i> Intensitas Cahaya: <a id="data-4" class="card-text text-dark">-<a class="card-text text-dark"> lx</a></a></p>
                <p class="card-text text-dark"><i class="wi wi-umbrella biru"></i> Intensitas Hujan: <a id="data-5" class="card-text text-dark">-<a class="card-text text-dark"> mm*10</a></a></p>
                <p class="card-text text-dark"><i class="wi wi-smog biru"></i> Titik Embun: <a id="data-6" class="card-text text-dark">-<a class="card-text text-dark">&deg;C</a></a></p>
                <h6 class="card-text text-secondary"><i class="far fa-clock biru"></i> Pembaruan Terakhir</h6>
                <a id="tanggal" class="card-text text-secondary">- <a id="jam" class="card-text text-secondary">-</a></a>
              </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <!-- Bagian Gauge Meter -->
    <section class="portfolio" id="portfolio">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0 judulbagian">Data Cuaca</h2>
        <h3 id="juduldata" class="text-center judul-gaugemeter-sub"> Silahkan pilih lokasi stasiun cuaca! </h3>
        <h6 class="text-center judul-gaugemeter-sub-sub"> Pilih parameter dibawah untuk melihat histori cuaca</h6>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <h4 class="text-center judul-gauge"><i class="wi wi-thermometer biru"></i> Temperatur </h4>
            <a class="portfolio-item d-block mx-auto" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modaltemperatur">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fa fa-search fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid">
              <object class="pesankesalahan-gauge" standby="loading data" id="gauges1" title="loading" type="text/html" data="pages/GaugetempEmpty.html">Kesalahan: temp.html tidak ditemukan.</object>
              </a>  
          </div>
          <div class="col-md-6 col-lg-4">
            <h4 class="text-center judul-gauge"><i class="wi wi-humidity biru"></i> Kelembaban </h4>
            <a class="portfolio-item d-block mx-auto" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modalkelembaban">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fa fa-search fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid">              
              <object class="pesankesalahan-gauge" standby="loading data" id="gauges2" title="loading" type="text/html" data="pages/GaugehumidityEmpty.html">Kesalahan: humidity.html tidak ditemukan.
              </object>
              </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <h4 class="text-center judul-gauge"><i class="wi wi-barometer biru"></i> Tekanan Atmosfer </h4>
            <a class="portfolio-item d-block mx-auto" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modaltekanan">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fa fa-search fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid">
              <object class="pesankesalahan-gauge" standby="loading data" id="gauges3" title="loading" type="text/html" data="pages/GaugepressureEmpty.html">Kesalahan: pressure.html tidak ditemukan.
              </object>
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <h4 class="text-center judul-gauge"><i class="wi wi-day-sunny biru"></i> Intensitas Cahaya </h4>
            <a class="portfolio-item d-block mx-auto" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modalcahaya">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fa fa-search fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid">
              <object class="pesankesalahan-gauge" standby="loading data" id="gauges4" title="loading" type="text/html" data="pages/GaugelightEmpty.html">Kesalahan: light.html tidak ditemukan.
              </object>
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <h4 class="text-center judul-gauge"><i class="wi wi-umbrella biru"></i> Intensitas Hujan </h4>
            <a class="portfolio-item d-block mx-auto" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modalhujan">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fa fa-search fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid">
              <object class="pesankesalahan-gauge" standby="loading data" id="gauges5" title="loading" type="text/html" data="pages/GaugerainEmpty.html">Kesalahan: rain.html tidak ditemukan.
              </object>
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <h4 class="text-center judul-gauge"><i class="wi wi-smog biru"></i> Titik Embun </h4>
            <a class="portfolio-item d-block mx-auto" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#modalembun">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fa fa-search fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid">
              <object class="pesankesalahan-gauge" standby="loading data" id="gauges6" title="loading" type="text/html" data="pages/GaugedewEmpty.html">Kesalahan: dew.html tidak ditemukan.
              </object>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Bagian Komentar -->
    <section class="bg-gambar text-white mb-0 bagian" id="about">
      <div class="container">
        <br>
        <h2 class="text-center text-uppercase text-white judultentang">Apa Ini?</h2>
        <div class="row">
          <div class="text-center ml-auto">
            <p class="lead">Website ini memberikan layanan informasi seputar keadaan cuaca pada suatu lokasi, data keadaan cuaca berasal dari pemantauan oleh perangkat Internet of Things (IoT) dengan sensor - sensor yang menangkap data cuaca seperti intensitas cahaya, intensitas hujan, suhu, tekanan atmosfir dan lain sebagainya.</p>
          </div>
          <br>
          <div class="text-center ml-auto">
            <p class="lead">Komentar, saran ataupun tanggapan anda terhadap website ini akan sangat membantu dalam pengembangan kedepannya. Selain itu apabila anda ingin menciptakan stasiun cuaca anda sendiri dengan perangkat IoT dan berminat untuk menambahkan perangkat anda pada website ini maka tinggalkan komentar dan kami akan memberikan petunjuk untuk uerangkat IoT anda.</p>
          </div>
          <br>
          <div class="text-center ml-auto">
            <p class="lead">Ingin mengetahui cara kerja Stasiun Cuaca berbasis IoT? Anda ingin mengembangkan Stasiun Cuaca anda sendiri? Klik tombol tautan dibawah.</p>
          </div>
          <br>
        </div>
        <div class="text-center mt-4">
          <a class="btn btn-xl btn-outline-light js-scroll-trigger" href="#contact"><i class="far fa-comment-dots"></i> Berikan tanggapan anda!</a>
          <a class="btn btn-xl btn-outline-light js-scroll-trigger" href="/pengenalaniot"><i class="fas fa-plus"></i> Buat Stasiun Cuaca Anda!</a>
          <a class="btn btn-xl btn-outline-light js-scroll-trigger" href="/berita"><i class="far fa-newspaper"></i> Berita<span class="badge badge-pill badge-primary hitungberita"> {{ $beritacount }}</span></a>
        </div>
      </div>
    </section>

    <section id="komentar">
    </section>

    <!-- Bagian Komentarn -->
    <section id="contact" class="bagian">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0 judulbagian">Komentar</h2>
        <h3 class="text-center judul-komentar-sub"> Apakah anda memiliki komentar untuk kami? </h3>
        <div class="row">
          <div class="col-md-12">
            <h3 class="comment-title"><span class="far fa-comment-dots"></span> Komentar <span class="badge badge-biru">{{ $komentarcount }}</span></h3>
            <br>
            @if (count($komentar) === 0)
            <h3 class="judul-komentar-sub"> Belum ada komentar :( Berikan komentar anda! </h3>
            @endif
            @foreach($komentar->sortByDesc('created_at') as $key=> $value)
            <div class="comment bg-komentar">
              <div class="row">
                <div class="col-md-12">
                  <div class="chip">
                    <img src="{{ 'https://www.gravatar.com/avatar/'. md5(strtolower(trim($value->email))) . '?s=50&d=identicon' }}" alt="Person" width="200" height="200">
                      {{ $value->nama }}
                  </div>
                  <div class="author-name bg-komentar-nama">
                    <a class="author-time text-dark"> {{ $value->updated_at->diffForHumans() }}</a>
                  </div>
                  <br>
                  <div class="comment-content">
                    <div class="card-block bg-komentar-pesan">
                      {{ $value->komentar }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <div>
              <br>
              <div>
                {!! $komentar->fragment('komentar')->links(); !!}
              </div>
            </div>
            </div>
          </div>
          <div class="text-center mt-4">
            <button class="btn btn-primary btn-xl" data-toggle="modal" data-target="#modalkomentar"><i class="far fa-comment-dots"></i> Tambahkan Komentar</button>
            <button class="btn btn-primary btn-xl" data-toggle="modal" data-target="#modalpesan"><i class="far fa-envelope"></i> Kirim Pesan</button>
        </div>
        </div>
      </section>

    <!-- Footer -->
    @section('footer')
    @parent
    @endsection

    <!-- Kembali Ke Atas -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

    <!-- Modal Pesan -->
    <div class="modal fade" id="modalpesan" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center biru" id="ModalLongTitle">Pesan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3 class="text-center intromodal"> Apakah anda memiliki pesan untuk kami? </h3>
            <form action="storepesan" method="post" name="kirimpesan">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  {{ csrf_field() }}
                  <label>Nama</label>
                  <input class="form-control" id="nama" type="text" name="nama" placeholder="Nama Anda" required="required" ata-validation-required-message="Tolong Masukkan Nama Anda." maxlength="30">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Alamat Email</label>
                  <input class="form-control" id="email" type="email" name="email" placeholder="Alamat Email Anda" required="required" data-validation-required-message="Tolong Masukkan Alamat Email Anda." maxlength="30">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Pesan</label>
                  <textarea class="form-control" id="pesan" rows="5" name="pesan" placeholder="Pesan" required="required" data-validation-required-message="Tolong Masukkan Pesan Anda." maxlength="2000"></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Pendeteksi Robot</label>
                  <div class="col-md-12 pull-center">
                    {!! app('captcha')->display() !!}
                    @if ($errors->has('g-recaptcha-response'))
                      <span class="help-block">
                        <br>
                        <strong class="kesalahancaptcha">Kesalahan! Pastikan Anda Bukan Robot... Bidip Bidip</strong>
                      </span>
                    @endif
                    </div>
              </div>
              <p class="text-center text-dark"> Pesanmu akan dikirimkan kepada admin dan tidak akan ditampilkan di halaman website ini.</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-xl" data-dismiss="modal">Tutup</button>
              <button type="submit" name="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Kirim <i class="fa fa-send-o"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Komentar -->
    <div class="modal fade" id="modalkomentar" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center biru" id="ModalLongTitle">Komentar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3 class="text-center intromodal"> Berikan tanggapanmu mengenai website ini. </h3>
            <form action="storekomentar" method="post" name="kirimkomentar">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  {{ csrf_field() }}
                  <label>Nama</label>
                  <input class="form-control" id="nama" type="text" name="nama" placeholder="Nama Anda" required="required" ata-validation-required-message="Tolong Masukkan Nama Anda." maxlength="30">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Alamat Email</label>
                  <input class="form-control" id="email" type="email" name="email" placeholder="Alamat Email Anda" required="required" data-validation-required-message="Tolong Masukkan Alamat Email Anda." maxlength="30">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Komentar</label>
                  <textarea class="form-control" id="komentar" rows="5" name="komentar" placeholder="Komentar" required="required" data-validation-required-message="Tolong Masukkan Komentar Anda." maxlength="2000"></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Pendeteksi Robot</label>
                  <div class="col-md-12 pull-center">
                    {!! app('captcha')->display() !!}
                    @if ($errors->has('g-recaptcha-response'))
                      <span class="help-block">
                        <br>
                        <strong class="kesalahancaptcha">Kesalahan! Pastikan Anda Bukan Robot... Bidip Bidip</strong>
                      </span>
                    @endif
                    </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-xl" data-dismiss="modal">Tutup</button>
              <button onclick="return confirm('Komentar anda sudah benar? untuk saat ini kami masih dalam tahap pengembangan dan belum memiliki fitur ubah komentar atau hapus komentar oleh pengguna, apabila anda ingin menghapus komentar anda, silahkan kirim pesan kepada kami melalui tombol pesan. Mohon maaf atas ketidaknyamanannya, terima kasih.')" type="submit" name="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Kirim <i class="fa fa-send-o"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Temperatur -->
    <div class="modal fade" id="modaltemperatur" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="ModalLongTitle">Data Scope : Temperatur</h5>
             <button type="button" class="close d-none d-md-block close-button d-none portfolio-modal-dismiss" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
          <div class="modal-body">
            <h3 class="text-center intromodal"> Data Temperatur </h3>
            <iframe class="iframecuaca" width="450" height="260" id="iframetemp" src="https://thingspeak.com/channels/475668/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Silahkan+Pilih+Lokasi+Stasiun+Cuaca%21&type=line&xaxis=Waktu&yaxis=Temperatur"></iframe>
              <p class="mb-5 text-dark text-center">Grafik ini menggambarkan keadaan data temperatur (dalam derajat celcius) dengan rentang waktu 3 hari ke belakang sejak saat ini.</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-xl portfolio-modal-dismiss" data-dismiss="modal">Tutup <i class="fa fa-close"></i></button>
          </div>       
            </div>
          </div>
        </div>

    <!-- Modal Kelembaban Udara -->
    <div class="modal fade" id="modalkelembaban" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="ModalLongTitle">Data Scope : Tingkat Kelembaban Udara</h5>
             <button type="button" class="close d-none d-md-block close-button d-none portfolio-modal-dismiss" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
          <div class="modal-body">
            <h3 class="text-center intromodal"> Data Kelembaban Udara </h3>
            <iframe class="iframecuaca" width="450" height="260" id="iframekelembaban" src="https://thingspeak.com/channels/475668/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Silahkan+Pilih+Lokasi+Stasiun+Cuaca%21&type=line&xaxis=Waktu&yaxis=Kelembaban"></iframe>
              <p class="mb-5 text-dark text-center">Grafik ini menggambarkan keadaan data kelembaban udara (dalam persentase) dengan rentang waktu 3 hari ke belakang sejak saat ini.</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-xl portfolio-modal-dismiss" data-dismiss="modal">Tutup <i class="fa fa-close"></i></button>
          </div>       
            </div>
          </div>
        </div>

    <!-- Modal Tekanan Atmosfer -->
    <div class="modal fade" id="modaltekanan" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="ModalLongTitle">Data Scope : Tingkat Tekanan Atmosfer</h5>
             <button type="button" class="close d-none d-md-block close-button d-none portfolio-modal-dismiss" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
          <div class="modal-body">
            <h3 class="text-center intromodal"> Data Tekanan Atmosfer </h3>
            <iframe class="iframecuaca" width="450" height="260" id="iframetekanan" src="https://thingspeak.com/channels/475668/charts/4?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Silahkan+Pilih+Lokasi+Stasiun+Cuaca%21&type=line&xaxis=Waktu&yaxis=Tekanan+Atmosfer"></iframe>
              <p class="mb-5 text-dark text-center">Grafik ini menggambarkan keadaan data tekanan atmosfer (dalam hPa) dengan rentang waktu 3 hari ke belakang sejak saat ini.</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-xl portfolio-modal-dismiss" data-dismiss="modal">Tutup <i class="fa fa-close"></i></button>
          </div>       
            </div>
          </div>
        </div>

    <!-- Modal Cahaya -->
    <div class="modal fade" id="modalcahaya" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="ModalLongTitle">Data Scope : Tingkat Intensitas Cahaya</h5>
             <button type="button" class="close d-none d-md-block close-button d-none portfolio-modal-dismiss" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
          <div class="modal-body">
            <h3 class="text-center intromodal"> Data Intensitas Cahaya </h3>
            <iframe class="iframecuaca" width="450" height="260" id="iframecahaya" src="https://thingspeak.com/channels/475668/charts/6?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Silahkan+Pilih+Lokasi+Stasiun+Cuaca%21&type=line&xaxis=Waktu&yaxis=Intensitas+Cahaya"></iframe>
              <p class="mb-5 text-dark text-center">Grafik ini menggambarkan keadaan data intensitas cahaya Matahari (dalam lux) dengan rentang waktu 3 hari ke belakang sejak saat ini.</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-xl portfolio-modal-dismiss" data-dismiss="modal">Tutup <i class="fa fa-close"></i></button>
          </div>       
            </div>
          </div>
        </div>

    <!-- Modal Hujan -->
    <div class="modal fade" id="modalhujan" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="ModalLongTitle">Data Scope : Curah Hujan</h5>
             <button type="button" class="close d-none d-md-block close-button d-none portfolio-modal-dismiss" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
          <div class="modal-body">
            <h3 class="text-center intromodal"> Data Curah Hujan </h3>
            <iframe class="iframecuaca" width="450" height="260" id="iframehujan" src="https://thingspeak.com/channels/475668/charts/7?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Silahkan+Pilih+Lokasi+Stasiun+Cuaca%21&type=line&xaxis=Waktu&yaxis=Intensitas+Hujan"></iframe>
              <p class="mb-5 text-dark text-center">Grafik ini menggambarkan keadaan data curah hujan (dalam 10milimeter/jam) dengan rentang waktu 3 hari ke belakang sejak saat ini.</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-xl portfolio-modal-dismiss" data-dismiss="modal">Tutup <i class="fa fa-close"></i></button>
          </div>       
            </div>
          </div>
        </div>

    <!-- Modal Embun -->
    <div class="modal fade" id="modalembun" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="ModalLongTitle">Data Scope : Titik Embun</h5>
             <button type="button" class="close d-none d-md-block close-button d-none portfolio-modal-dismiss" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
          <div class="modal-body">
            <h3 class="text-center intromodal"> Data Titik Embun </h3>
            <iframe class="iframecuaca" width="450" height="260" id="iframeembun" src="https://thingspeak.com/channels/475668/charts/3?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Silahkan+Pilih+Lokasi+Stasiun+Cuaca%21&type=line&xaxis=Waktu&yaxis=Titik+Embun"></iframe>
              <p class="mb-5 text-dark text-center">Grafik ini menggambarkan keadaan data titik embun (dalam derajat celcius) dengan rentang waktu 3 hari ke belakang sejak saat ini.</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-xl portfolio-modal-dismiss" data-dismiss="modal">Tutup <i class="fa fa-close"></i></button>
          </div>       
            </div>
          </div>
        </div>

    <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://www.google.com/jsapi'></script>   
    <script src="js/sweetalert.js"></script>
    @include('Alerts::alerts')
  </body>
</html>
