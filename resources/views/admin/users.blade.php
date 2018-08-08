@extends('adminlte::page')

@section('content')
<style>
thead{
  /*background-image: linear-gradient(to right, #395d92, #0088bf, #00b2ba, #00d580, #a8eb12);*/
  background-image: linear-gradient(to right, #395d92, #0083b5, #00a7ac, #00c47b, #a4d635);
  color:white;
  /*background-color:#34495E;
  color:#DDDD55;*/
}
</style>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tabel Admin</h3>
    </div>
  </div>

<div class="table-responsive">
  <div class="box-body">
        <table class="table table-striped table-hover" id="pengguna-table">
          <thead>
            <th>No</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Waktu Dibuat</th>
            <th>Waktu Diubah</th>
            <th>Aksi</th>
          </thead>
          <tbody>
            <?php $no =1;?>
            @foreach ($user as $value)
              <tr>
                <th>{{ $no++ }}</th>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->created_at }}</td>
                <td>{{ $value->updated_at }}</td>
                <td>
                  @if (($value->name) !== "masteradminstasiuncuaca")
                    <a class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus user {{ $value->name }}?')" href="/delete/akun/{{ $value->id }}"><i class="fa fa-trash"></i></a>
                  @endif
                </th>
              </tr>
            @endforeach
          </tbody>
        </table>
  </div>
</div>
@endsection

@section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
