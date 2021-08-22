@extends('template_admin')
@section('konten')
  <div class="content-wrapper">
    <h3> <b>Profile</b> <small class="text-muted"></small></h3>
    <hr>
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <p class="card-description text-center">
              <img src="{{ asset('images/' . auth()->user()->foto ) }}" width="25%">
            </p>
            <form class="forms-sample" method="post" action="" enctype="multipart/form-data">
              <input type="hidden"  name="id_user" value="{{ auth()->user()->id_user }}">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" value="{{ auth()->user()->nama_lengkap }}" required>
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="{{ auth()->user()->username }}" required>
              </div>
              <div class="form-group">
                <label>Password Lama</label>
                <input type="password" name="pass1" class="form-control">
              </div>
              <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="password" class="form-control">
              </div>
              <div class="form-group">
                <label>Foto</label>
                <input id="file" type="file" name="foto" class="form-control">                      
              </div>
              <button type="submit" name="update" class="btn btn-info mr-2">Update</button>
              <a href="javascript:history.back()" class="btn btn-light">Batal</a>
            </form>
          </div>
        </div> 
      </div>
    </div>
  </div>
@endsection