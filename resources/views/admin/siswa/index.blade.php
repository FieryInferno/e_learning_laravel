@extends('template_admin')
@section('konten')
  <div class="content-wrapper">
    <h3> <b>Siswa</b> <small class="text-muted"></small></h3>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
          <p class="card-description">
            <a href="/admin/siswa/tambah" class="btn btn-info text-white"><i class="fa fa-plus"></i> Tambah Siswa</a> <br>
          </p>
          <h4 class="card-title">Data Siswa</h4>
          <div class="table-responsive">
            @if (session('sukses'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('sukses') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            <table class="table table-condensed table-striped table-hover" id="data" width="100%">
              <thead class="bg-dark text-white">
                <tr>
                  <th class="text-center">No.</th> 
                  <th class="text-center">NIS</th> 
                  <th class="text-center">Nama Siswa</th> 
                  <th class="text-center">Kelas</th>
                  <th class="text-center" width="30%">Foto</th>
                  <th class="text-center">Opsi</th>
                </tr>                        
              </thead>
              <tbody>
                <?php $no = 1; ?>
                @foreach ($siswa as $siswa)
                  <tr>
                    <td class="text-center"><b>{{ $no++ }}.</b> </td>
                    <td class="text-center">{{ $siswa->nis }}</td>
                    <td class="text-center">{{ $siswa->user->nama_lengkap }}</td>
                    <td class="text-center">{{ $siswa->kelas->nama_kelas }}</td>
                    <td class="text-center"><img src="{{ asset('images/' . $g->user->foto) }}" alt="" width="30%"></td>
                    <td></td>
                  </tr>
                @endforeach 
              </tbody>
            </table>                    
          </div>
          </div>
        </div> 
      </div>
    </div>
  </div>
@endsection