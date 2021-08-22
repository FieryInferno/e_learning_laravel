@extends('template_admin')
@section('konten')
  <div class="content-wrapper">
    <h3> <b>Dashboard</b> <small class="text-muted"></small></h3>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <center>
              <h2>Selamat datang di <strong> {{ $nama_aplikasi }}</strong> <br>{{ $nama_sekolah }}</h2>
            </center>
          </div>
        </div> 
      </div>
    </div>
  </div>
@endsection