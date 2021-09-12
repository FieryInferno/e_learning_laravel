@extends('template_admin')
@section('konten')
  <div class="content-wrapper">
    <h3> <b>Siswa</b> <small class="text-muted"></small></h3>
    <hr>
    <div class="row purchace-popup">
      <div class="col-md-12">
        <span class="d-flex alifn-items-center">
            <a href="/guru/mata_pelajaran/tambah" class="btn btn-dark"><i class="fa fa-plus"></i> Tambah Jadwal</a>
        </span>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Data Mata Pelajaran Guru</h4>
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
                <tfoot class="bg-dark text-white">
                  <tr>
                    <th class="text-center">No.</th> 
                    <th class="text-center">NIS</th> 
                    <th class="text-center">Nama Siswa</th> 
                    <th class="text-center">Kelas</th>
                    <th class="text-center" width="30%">Foto</th>
                    <th class="text-center">Opsi</th>
                  </tr>                        
                </tfoot>
                <tbody>
                </tbody>
              </table>                    
            </div>
          </div>
        </div> 
      </div>
    </div>
  </div>
@endsection