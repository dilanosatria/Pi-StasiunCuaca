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
      <h3 class="card-title">Tabel Komentar</h3>
      @if (count($komentar) === 0)
        <br>
        <h3 style="padding-bottom: 35px;"> Belum ada komentar. </h3>
      @endif
    </div>
  </div>

  <div class="table-responsive">
    <div class="box-body">
          <table class="table table-striped table-hover" id="Komentar-table">
            <thead>
              <th>No</th>
              <th>ID</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Komentar</th>
              <th>Waktu Dibuat</th>
              <!--<th>Waktu Diubah</th>-->
              <th>Aksi</th>
            </thead>
            <tbody>
              <?php $no =1;?>
              @foreach($komentar->sortByDesc('created_at') as $key=> $value)
                <tr>
                  <th>{{ $no++ }}</th>
                  <td>{{ $value->id }}</td>
                  <td style="word-wrap: break-word;min-width: 100px;max-width: 100px;">{{ $value->nama }}</td>
                  <td style="word-wrap: break-word;min-width: 150px;max-width: 150px;">{{ $value->email }}</td>
                  <td style="word-wrap: break-word;min-width: 160px;max-width: 550px;">{{ $value->komentar }}</td>
                  <td style="word-wrap: break-word;min-width: 100px;max-width: 100px;">{{ $value->created_at }}</td>
                  <!--<th style="word-wrap: break-word;min-width: 100px;max-width: 100px;">{{ $value->updated_at }}</th>-->
                  <td style="word-wrap: break-word;min-width: 100px;max-width: 60px;">
                    <a class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus komentar oleh {{ $value->nama }}?')" href="/delete/komentar/{{ $value->id }}"><i class="fa fa-trash"></i></a>
                    <a class="btn btn-warning" 
                        data-id="{{ $value->id }}"
                        data-nama="{{ $value->nama }}"
                        data-email="{{ $value->email }}"
                        data-komentar="{{ $value->komentar }}"
                        data-komentarsensor="~Maaf komentar anda kami sensor dikarenakan komentar anda melanggar kode etik website. Terima kasih~"
                        data-toggle="modal" data-target="#modalsensorkomentar"><i class="fa fa-edit"></i> Sensor</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {!! $komentar->links(); !!}
    </div>
  </div>

  <!-- Modal Edit -->
    <div class="modal fade" id="modalsensorkomentar" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3 class="text-center" style="padding-bottom: 10px;"> Sensor Komentar </h3>
            <form method="post" action="{{ route('komentar.update') }}">
              {{method_field('patch')}}
              @csrf
                <div class="control-group">
                  <input class="hidden" id="id" type="text" name="id">
                  <input class="hidden" id="nama" type="text" name="nama">
                  <input class="hidden" id="email" type="text" name="email">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                      <br>
                      <p class="text-center" id="namateks"></p>
                      <p class="text-center" id="komentarteks"></p>
                      <br>
                      <label>Sensor : </label>
                      <textarea class="form-control" id="komentarsensor" rows="5" name="komentar" placeholder="Komentar" maxlength="2000"></textarea>
                  </div>
                </div>
              <br>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-xl" data-dismiss="modal">Tutup</button>
              <button type="submit" name="submit" class="btn btn-primary" id="sendMessageButton">Sensor</button>
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
        $('#modalsensorkomentar').on('show.bs.modal', function (event){
            console.log('modal terbuka');

            var button =$(event.relatedTarget)
            
            var id = button.data('id')
            var nama = button.data('nama')
            var email = button.data('email')
            var komentarasli = button.data('komentar')
            var komentarsensor = button.data('komentarsensor')
            
            var modal = $(this)

            modal.find('.modal-body #namateks').text('Nama : '+nama)
            modal.find('.modal-body #komentarteks').text('Komentar Asli : '+komentarasli)

            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #nama').val(nama)
            modal.find('.modal-body #email').val(email)
            modal.find('.modal-body #komentar').val(komentarasli)
            modal.find('.modal-body #komentarsensor').val(komentarsensor)

        })
    </script>
@endsection