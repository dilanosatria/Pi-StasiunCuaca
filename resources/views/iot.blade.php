@extends('layouts.master')
@extends('layouts.footer')
<!DOCTYPE html>
<html lang="en">

  <head>
    <title>PI - Stasiun Cuaca - Apa Itu IOT?</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">
    <link href="css/berita-pengenalan.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">

    <!-- Berita-->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  </head>

  <body id="page-top">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/#page-top"><i class="fa fa-globe"></i> Stasiun Cuaca</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase bg-outline-white text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  Menu
                  <i class="fa fa-bars"></i>
                </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Tentang</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#berita">Berita <span class="badge badge-pill badge-primary beritacountnavbar"> {{ $beritacount }}</span></a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/#page-top"><i class="fa fa-home"></i> Halaman Utama</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- About Section -->
    <section class="bg-gambar text-white mb-0" id="about">
      <div class="container">
        <br>
        <h2 class="text-center text-uppercase text-white judultentang">Apa itu stasiun cuaca berbasis IoT?</h2>
        <div class="row">
          <div class="text-center ml-auto">
            <p class="lead">Website ini memberikan layanan informasi seputar keadaan cuaca pada suatu lokasi, data keadaan cuaca berasal dari pemantauan oleh perangkat Internet of Things (IoT) dengan sensor - sensor yang menangkap data cuaca seperti intensitas cahaya, intensitas hujan, suhu, tekanan atmosfir dan lain sebagainya.</p>
          </div>
          <br>
          <div class="text-center ml-auto">
            <p class="lead">Komentar, saran ataupun tanggapan anda terhadap website ini akan sangat membantu dalam pengembangan kedepannya. Selain itu apabila anda ingin menciptakan stasiun cuaca anda sendiri dengan perangkat IoT dan berminat untuk menambahkan perangkat anda pada website ini maka tinggalkan komentar dan kami akan memberikan petunjuk untuk uerangkat IoT anda.</p>
          </div>
          <br>
        </div>
        <div class="text-center mt-4">
          <a class="btn btn-xl btn-outline-light hoverputih" href="/" data-toggle="modal" data-target="#modalpesan">
            <i class="far fa-comment-dots"></i>
            Punya Pertanyaan Tentang IoT?
          </a>
          <a class="btn btn-xl btn-outline-light js-scroll-trigger" href="/">
            <i class="fa fa-home"></i>
            Halaman Utama
          </a>
        </div>
      </div>
    </section>

    <!-- Berita -->
    <section class="portfolio" id="berita">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0 judulberita">Buat IoT-mu Sendiri!</h2>
        <h3 id="juduldata" class="text-center subjudulberita"> Ikuti langkah-langkah dibawah jika ingin membuat stasiun cuaca berbasis IoT anda sendiri. </h3>
        <div class="row">
          @foreach($berita->sortByDesc('updated_at') as $key=> $value)
            <div class="col-md-12">
              <div class="bd-example" data-example-id="">
                <div id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="card">
                    <div class="card-header" role="tab" id="heading{{ $key }}">
                      <div class="mb-0">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $key }}" aria-expanded="false" aria-controls="collapse{{ $key }}" class="collapsed">
                          <i class="far fa-newspaper" aria-hidden="true"></i>
                            <h3>{{ $value->perihal }}</h3>
                            <p>{{ $value->updated_at->format('D, d-M-Y') }}</p>
                        </a>
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                      </div>
                    </div>

                    <div id="collapse{{ $key }}" class="collapse" role="tabpanel" aria-labelledby="heading{{ $key }}" aria-expanded="false" style="">
                      <div class="card-block">
                        <p>{{ $value->kol_berita1 }}</p>
                        <p>{{ $value->kol_berita2 }}</p>
                        <p>{{ $value->kol_berita3 }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>


    <!-- Footer -->
    @section('footer')
    @parent
    @endsection

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
            <h3 class="text-center intromodal"> Tanyakan pertanyaan seputar stasiun cuaca IoT dinisi. </h3>
            <br>
            <p class="text-center"> Anda dapat menanyakan tentang pembuatan stasiun cuaca berbasis IoT atau jika anda telah berhasil membuat stasiun cuaca berbasis IoT anda sendiri anda dapat mendaftarkan stasiun cuaca anda pada website ini dengan menghubungi admin lewat kolom pesan dibawah. </p>
            <form action="storepesaniot" method="post" name="kirimpesan">
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
              <p class="text-center text-dark"> Pesanmu akan dikirimkan kepada admin dan secepatnya akan dibalas melalui email mu.</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-xl" data-dismiss="modal">Tutup</button>
              <button type="submit" name="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Kirim <i class="fa fa-send-o"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Kembali Ke Atas -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

    <script src="js/sweetalert.js"></script>
    @include('Alerts::alerts')

  </body>
</html>
