@extends('template_admin')
@section('konten')
  <div class="content-wrapper">
    <h3> <b>Mata Pelajaran</b> <small class="text-muted"></small></h3>
    <hr>
    <div class="row purchace-popup">
      <div class="col-md-12">
        <span class="d-flex alifn-items-center">
          <a data-toggle="modal" data-target="#add" class="btn btn-dark"><i class="fa fa-plus"></i> Tambah Mata Pelajaran</a>
        </span>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Data Mata Pelajaran</h4>
            <div class="table-responsive">
              @if (session('sukses'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('sukses') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              <table class="table table-condensed table-striped table-hover" id="data">
                <thead class="bg-dark text-white">
                  <tr>
                    <th class="text-center">No.</th> 
                    <th class="text-center">Nama Mata Pelajaran</th>  
                    <th class="text-center">Opsi</th>                     
                  </tr>                        
                </thead>  
                <tbody>
                  <?php $no = 1; ?>
                  @foreach ($mata_pelajaran as $mata_pelajaran)
                    <tr>
                      <td class="text-center"><b>{{ $no++ }}.</b> </td>
                      <td class="text-center">{{ $mata_pelajaran->nama_mata_pelajaran }} </td>
                      <td class="text-center">
                        <a data-toggle="modal" data-target="#edit{{ $mata_pelajaran->id_mata_pelajaran }}" class="btn btn-dark btn-xs text-warning"><i class="fa fa-pencil"></i> Edit</a>
                        <!-- modal edit -->
                        <div class="modal fade" id="edit{{ $mata_pelajaran->id_mata_pelajaran }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header"><h4 class="modal-title"> Edit Mata Pelajaran </h4></div>
                                <form action="/admin/mata_pelajaran/edit/{{ $mata_pelajaran->id }}" method="post">
                                  @csrf
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label for="kelas"> Nama Mata Pelajaran</label>
                                      <input type="text" id="nama_mata_pelajaran" name="nama_mata_pelajaran" class="form-control" value="{{ $mata_pelajaran->nama_mata_pelajaran }}" required>  
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <button name="edit" type="submit" class="btn btn-info"> Simpan</button>
                                  </div>
                                </form>
                              </div>         
                            </div>
                          </div>
                        </div>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus{{ $mata_pelajaran->id_mata_pelajaran }}"><i class="fa fa-trash"></i> Hapus</button>

                        <!-- Modal -->
                        <div class="modal fade" id="hapus{{ $mata_pelajaran->id_mata_pelajaran }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Anda yakin akan menghapus data Mata Pelajaran ini?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <a href="/admin/mata_pelajaran/hapus/{{ $mata_pelajaran->id }}" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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

  <!-- Modal Detail-->
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header"><h4 class="modal-title"> Tambah Mata Pelajaran </h4></div>
          <form action="/admin/mata_pelajaran/tambah" method="post">
            @csrf
            <div class="modal-body">
              <div class="form-group">
                <label for="mata_pelajaran"> Nama Mata Pelajaran</label>
                <input type="text" id="nama_mata_pelajaran" name="nama_mata_pelajaran" class="form-control" placeholder="Mata Pelajaran" required>                    
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button name="save" type="submit" class="btn btn-info"> Simpan</button>
            </div>
          </form>
        </div>         
      </div>
    </div>
@endsection