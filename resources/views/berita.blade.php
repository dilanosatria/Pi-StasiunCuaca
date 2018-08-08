@extends('layouts.master')
@extends('layouts.footer')
<!DOCTYPE html>
<html lang="en">

  <head>

    <title>PI - Stasiun Cuaca - Berita</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">
    <link href="css/berita-pengenalan.css" rel="stylesheet">

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
          <a class="btn btn-xl btn-outline-light js-scroll-trigger" href="/#komentar"><i class="far fa-comment-dots"></i> Berikan tanggapan anda!</a>
          <a class="btn btn-xl btn-outline-light js-scroll-trigger" href="/pengenalaniot"><i class="fas fa-plus"></i> Buat Stasiun Cuaca Anda!</a>
          <a class="btn btn-xl btn-outline-light js-scroll-trigger" href="/"><i class="fa fa-home"></i> Halaman Utama</a>
        </div>
      </div>
    </section>

    <!-- Berita -->
    <section class="portfolio" id="berita">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0 judulberita">Berita</h2>
        <h3 class="text-center subjudulberita"> Berita & Update website Stasiun Cuaca </h3>
        @if (count($berita) === 0)
        <h3 class="text-center"> Belum ada berita untuk saat ini... Stay Tuned! :D </h3>
        @endif
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
                        @if( ! empty($value->linkgambar))
                          <img class="img-fluid rounded mx-auto d-block" alt="Responsive image" src="/storage/{{ $value->linkgambar}}" width="300px" height="300px">
                          <br>
                        @endif
                        <p>{{ $value->kol_berita1 }}</p>
                        <p>{{ $value->kol_berita2 }}</p>
                        <p>{{ $value->kol_berita3 }}</p>
                        @if( ! empty($value->link))
                          <br>
                          <a href="{{ $value->link }}" target="_blank">{{ $value->link }}</a>
                        @endif
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

    <!-- Kembali Ke Atas -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

  </body>
</html>
