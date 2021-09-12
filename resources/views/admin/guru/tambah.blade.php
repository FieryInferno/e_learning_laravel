@extends('template_admin')
@section('konten')
  <div class="content-wrapper">
    <h3> <b>Tambah Guru</b> <small class="text-muted"></small></h3>
    <hr>
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tambah Guru</h4>
            <p class="card-description"></p>
            <hr>
            <form class="forms-sample" action="/admin/guru/tambah" method="post" enctype="multipart/form-data">
              @csrf
              <div class="text-center">
                <img class="img-thumbnail img-preview" id="anggota-img" width="40%">
              </div>
              <div class="form-group">
                <label for="semester">Foto</label>
                <input type="file" class="form-control" name="foto" style="font-weight: bold;background-color: #212121;color: #fff;" required onchange="previewImg()" id="foto">
              </div>
              <div class="form-group">
                <label for="semester">NIP</label>
                <input type="text" class="form-control" name="nip" style="font-weight: bold;background-color: #212121;color: #fff;" required>
              </div>
              <div class="form-group">
                <label for="semester">Nama Lengkap dan Gelar</label>
                <input type="text" class="form-control" name="nama_lengkap" style="font-weight: bold;background-color: #212121;color: #fff;" required>
              </div>
              <div class="form-group">
                <label for="semester">Username</label>
                <input type="text" class="form-control" name="username" style="font-weight: bold;background-color: #212121;color: #fff;" required>
              </div>

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Simpan</button>
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Tambah</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Apakah anda yakin akan menambahkan data guru ini?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>

              <a href="/admin/guru" class="btn btn-danger">Batal</a>
            </form>
          </div>
        </div> 
      </div>
    </div>
  </div>
  <script>
    function previewImg() {
      const gambar      = document.querySelector('#foto');
      const imgPreview  = document.querySelector('.img-preview');
      // label.textContent = gambar.files[0].name;
      const file = new FileReader();
      file.readAsDataURL(gambar.files[0]);
      file.onload = function(e) {
        imgPreview.src = e.target.result;
      }
    }
  </script>
@endsection