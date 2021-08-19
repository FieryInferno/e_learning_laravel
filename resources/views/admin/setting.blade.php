@extends('template_admin')
@section('konten')
  <div class="content-wrapper">
    <h4> <b>Aplikasi</b> <small class="text-muted">/Setting</small></h4>
    <hr>
    <div class="row">
      <div class="col-md-5">
        <div class="card">
          <div class="card-body">
            @if (session('sukses'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('sukses') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            <form action="/admin/setting/ubah" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id_sekolah" value="{{ $id_sekolah }}">
              <div class="form-group">
                <label for="logo">Logo</label>
                <p class="text-center">
                  <img src="{{ asset('images/' . $logo) }}" class="img-thumbnail" width="50%">
                </p>
                <input type="file" id="logo" name="logo"> 
                <p class="text-danger">
                  Ukuran Logo maksimal <em><b>54 x 45</b></em> pixel
                </p>    
                <label for="textlogo">Nama Aplikasi</label>
                <input type="text" name="nama_aplikasi" id="nama_aplikasi" class="form-control" value="{{ $nama_aplikasi }}" required>         
              </div>
              <div class="form-group">
                <label for="nama">Nama Sekolah</label>
                <input type="text" id="nama_sekolah" name="nama_sekolah" class="form-control" value="{{ $nama_sekolah }}" required>
              </div>
              <div class="form-group">
                <label for="kepsek">Nama Kepala Sekolah</label>
                <input type="text" id="nama_kepsek" name="nama_kepsek" class="form-control" value="{{ $nama_kepsek }}" required>
              </div>
              <div class="form-group">
                <label for="copyright">Copyright</label>
                <input type="text" id="copyright" name="copyright" class="form-control" value="{{ $copyright }}" required>
              </div>
              <div class="form-group">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal">
                  <i class="fa fa-pencil"></i> Perbaharui
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Setting</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Anda yakin akan mengubah setting dari aplikasi?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-light">Perbarui</button>
                      </div>
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