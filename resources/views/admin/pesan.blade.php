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
      <h3 class="card-title">Tabel Pesan</h3>
      @if (count($pesan) === 0)
        <br>
        <h3 style="padding-bottom: 35px;"> Belum ada pesan. </h3>
      @endif
    </div>
  </div>

  <div class="table-responsive">
    <div class="box-body">
          <table class="table table-striped table-hover" id="Pesan-table">
            <thead>
              <th>No</th>
              <th>ID</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Pesan</th>
              <th>Waktu Dibuat</th>
              <!--<th>Waktu Diubah</th>-->
              <th>Aksi</th>
            </thead>
            <tbody>
              <?php $no =1;?>
              @foreach($pesan->sortByDesc('updated_at') as $key=> $value)
                <tr>
                  <th>{{ $no++ }}</th>
                  <td>{{ $value->id }}</td>
                  <td style="word-wrap: break-word;min-width: 100px;max-width: 100px;">{{ $value->nama }}</td>
                  <td style="word-wrap: break-word;min-width: 150px;max-width: 150px;">{{ $value->email }}</td>
                  <td style="word-wrap: break-word;min-width: 160px;max-width: 550px;">{{ $value->pesan }}</td>
                  <td style="word-wrap: break-word;min-width: 100px;max-width: 100px;">{{ $value->created_at }}</td>
                  <!--<th style="word-wrap: break-word;min-width: 100px;max-width: 100px;">{{ $value->updated_at }}</th>-->
                  <td style="word-wrap: break-word;min-width: 30px;max-width: 30px;">
                    <a class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus pesan oleh {{ $value->nama }}?')" href="/delete/pesan/{{ $value->id }}"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {!! $pesan->links(); !!}
    </div>
  </div>
@endsection

@section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
@endsection