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
            <form class="forms-sample" method="post" action="/admin/profile/ubah" enctype="multipart/form-data">
              @csrf
              @if (session('sukses'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('sukses') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              <input type="hidden"  name="id_user" value="{{ auth()->user()->id_user }}">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" name="nama_lengkap" value="{{ auth()->user()->nama_lengkap }}" required>
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="{{ auth()->user()->username }}" required>
              </div>
              <div class="form-group">
                <label>Password Lama</label>
                <input type="password" name="password_lama" class="form-control">
              </div>
              <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="password_baru" class="form-control">
              </div>
              <div class="form-group">
                <label>Foto</label>
                <input id="file" type="file" name="foto" class="form-control">                      
              </div>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-info mr-2" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil"></i> Update</button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Anda yakin akan mengubah profile?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-info">Update</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div> 
      </div>
    </div>
  </div>
@endsection