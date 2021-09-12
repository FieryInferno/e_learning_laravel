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
            <form class="forms-sample" action="/guru/mata_pelajaran/tambah" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="semester">Mata Pelajaran</label>
                <select name="mata_pelajaran" id="mata_pelajaran" class="form-control" style="font-weight: bold;background-color: #212121;color: #fff;" required onchange="pilihJadwal(this)">
                  <option value="">-- Pilih --</option>
                  @foreach ($mata_pelajaran as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_mata_pelajaran }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="semester">Kelas</label>
                <select name="kelas" id="kelas" class="form-control" style="font-weight: bold;background-color: #212121;color: #fff;" required onchange="pilihJadwal(this)">
                  <option value="">-- Pilih --</option>
                  @foreach ($kelas as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="semester">Jadwal</label>
                <select name="jadwal" id="jadwal" class="form-control" style="font-weight: bold;background-color: #212121;color: #fff;" required>
                  <option value="">-- Pilih --</option>
                </select>
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
                      Apakah anda yakin akan menambahkan data siswa ini?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>

              <a href="/guru/mata_pelajaran" class="btn btn-danger">Batal</a>
            </form>
          </div>
        </div> 
      </div>
    </div>
  </div>
  <script>
    function pilihJadwal(data) {
      $.ajax({
        url   : '/guru/mata_pelajaran/get_jadwal',
        type  : 'post',
        data  : {
          _token            : "{{ csrf_token() }}",
          mata_pelajaran_id : $('#mata_pelajaran').val(),
          kelas_id          : $('#kelas').val(),
        },
        success : function(result) {
          console.log(result);
          if (result.length > 0) {
            isi = '<option value="">Pilih Jadwal</option>';
            result.forEach(element => {
              isi += `<option value="${element.id}">${element.hari + ' | ' + element.jam_mulai + ' - ' + element.jam_selesai}</option>`;
            });
          } else {
            isi = '<option value="">Jadwal tidak ada</option>';
          }
          $('#jadwal').html(isi);
        }
      });
    }
  </script>
@endsection