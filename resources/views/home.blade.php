@extends('adminlte::page')

@section('content')
<style>
.bg-gambarjumbotron{
    background: url('/img/7.gif') no-repeat center center fixed;
    -webkit-background-size: cover; 
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    -webkit-filter: grayscale(50%); /* Safari 6.0 - 9.0 */
    filter: grayscale(50%);
}

.content{
    padding:0px;
}
.content-header{
    padding:0px;
}
</style>
<div class="jumbotron jumbotron-fluid bg-gambarjumbotron" style="padding-top: 5%; padding-bottom: 39%; margin-bottom: 0px;">
  <div class="container">
    <h1 class="display-4" style="color:white;">Dashboard Stasiun Cuaca</h1>
    <p class="lead"  style="color:white;">Selamat Datang!</p>
    <a class="btn btn-primary btn-lg" href="/admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
  </div>
</div>

<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@endsection
