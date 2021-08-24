@extends('template_admin')
@section('konten')
  <div class="content-wrapper">
    <h3> <b>Tambah Jadwal</b> <small class="text-muted"></small></h3>
    <hr>
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tambah Jadwal</h4>
            <p class="card-description"></p>
            <hr>
            <form class="forms-sample" action="/admin/jadwal/tambah" method="post">
              @csrf
              <div class="form-group">
                <label for="mapel">Mata Pelajaran</label>
                <div class="input-group">
                  <select class="form-control" id="mata_pelajaran_id" name="mata_pelajaran_id"style="font-weight: bold;background-color: #212121;color: #fff;" required>
                    <option value="">-- Pilih --</option>
                    @foreach ($mata_pelajaran as $mapel)
                      <option value="{{ $mapel->id }}">{{ $mapel->nama_mata_pelajaran }}</option>
                    @endforeach
                  </select>
                  <div class="input-group-append bg-success border-success"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="kelas">Kelas Mata Pelajaran</label>
                <select class="form-control" id="kelas_id" name="kelas_id"style="font-weight: bold;background-color: #212121;color: #fff;" required>
                  <option value="">-- Pilih --</option>
                  @foreach ($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="semester">Hari</label>
                <select name="hari" id="hari" class="form-control" style="font-weight: bold;background-color: #212121;color: #fff;" required>
                  <option value="">-- Pilih --</option>
                  <option value="senin">Senin</option>
                  <option value="selasa">Selasa</option>
                  <option value="rabu">Rabu</option>
                  <option value="kamis">Kamis</option>
                  <option value="jumat">Jumat</option>
                  <option value="sabtu">Sabtu</option>
                </select>
              </div>
              <div class="form-group">
                <label for="semester">Jam Mulai</label>
                <input type="time" class="form-control" name="jam_mulai" style="font-weight: bold;background-color: #212121;color: #fff;" required>
              </div>
              <div class="form-group">
                <label for="semester">Jam Selesai</label>
                <input type="time" class="form-control" name="jam_selesai" style="font-weight: bold;background-color: #212121;color: #fff;" required>
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
                      Apakah anda yakin akan menambahkan data jadwal ini?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>

              <a href="/admin/jadwal" class="btn btn-danger">Batal</a>
            </form>
          </div>
        </div> 
      </div>
    </div>
  </div>
@endsection