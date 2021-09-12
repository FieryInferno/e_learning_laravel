@extends('template_guru')
@section('konten')
  <div class="content-wrapper">
    <h3> <b>Data Mata Pelajaran Guru</b> <small class="text-muted"></small></h3>
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
                    <th class="text-center">Kelas</th> 
                    <th class="text-center">Mata Pelajaran</th>
                    <th class="text-center">Jadwal</th>
                    <th class="text-center">Opsi</th>
                  </tr>                        
                </thead>
                <tfoot class="bg-dark text-white">
                  <tr>
                    <th class="text-center">No.</th> 
                    <th class="text-center">Kelas</th> 
                    <th class="text-center">Mata Pelajaran</th>
                    <th class="text-center">Jadwal</th>
                    <th class="text-center">Opsi</th>
                  </tr>                        
                </tfoot>
                <tbody>
                  <?php $no = 1; ?>
                  @foreach ($role_guru as $g)
                    <tr>
                      <td class="text-center"><b>{{ $no++ }}.</b> </td>
                      <td class="text-center">{{ $g->jadwal->kelas->nama_kelas }}</td>
                      <td class="text-center">{{ $g->jadwal->mata_pelajaran->nama_mata_pelajaran }}</td>
                      <td class="text-center">{{ $g->jadwal->hari . ', ' . $g->jadwal->jam_mulai . ' - ' . $g->jadwal->jam_selesai }}</td>
                      <td class="text-center">
                        <a href="/guru/mata_pelajaran/edit/{{ $g->id }}" class="btn btn-success"><i class="fa fa-pencil"></i> Edit</a>
                        
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus{{ $g->id }}"><i class="fa fa-trash"></i> Hapus</button>
                        
                        <div class="modal fade" id="hapus{{ $g->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Anda yakin akan menghapus data ini?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <form action="/guru/mata_pelajaran/hapus/{{ $g->id }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger" type="submit">Hapus</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
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