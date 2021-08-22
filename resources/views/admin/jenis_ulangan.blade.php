@extends('template_admin')
@section('konten')
  <div class="content-wrapper">
    <h3> <b>Jenis Ulangan</b> <small class="text-muted"></small></h3>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
          <p class="card-description">
            <a data-toggle="modal" data-target="#add" class="btn btn-info text-white"><i class="fa fa-plus"></i> Tambah Jenis Ulangan</a> <br>
          </p>
          <h4 class="card-title">Data Jenis Ulangan</h4>
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
                  <th class="text-center">Nama Jenis Ulangan</th>  
                  <th class="text-center">Opsi</th>                     
                </tr>                        
              </thead>  
              <tbody>
                <?php $no = 1; ?>
                @foreach ($jenis_ulangan as $jenis_ulangan)
                  <tr>
                    <td class="text-center"><b>{{ $no++ }}.</b> </td>
                    <td class="text-center">{{ $jenis_ulangan->nama_jenis_ulangan }} </td>
                    <td class="text-center">
                      <a data-toggle="modal" data-target="#edit{{ $jenis_ulangan->id_jenis_ulangan }}" class="btn btn-dark btn-xs text-warning"><i class="fa fa-pencil"></i> Edit</a>
                      <!-- modal edit -->
                      <div class="modal fade" id="edit{{ $jenis_ulangan->id_jenis_ulangan }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header"><h4 class="modal-title"> Edit Jenis Ulangan </h4></div>
                              <form action="/admin/jenis_ulangan/edit/{{ $jenis_ulangan->id }}" method="post">
                                @csrf
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label for="jenis_ulangan"> Nama Jenis Ulangan</label>
                                    <input type="text" id="nama_jenis_ulangan" name="nama_jenis_ulangan" class="form-control" value="{{ $jenis_ulangan->nama_jenis_ulangan }}" required>  
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
                      <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus{{ $jenis_ulangan->id_jenis_ulangan }}"><i class="fa fa-trash"></i> Hapus</button>

                      <!-- Modal -->
                      <div class="modal fade" id="hapus{{ $jenis_ulangan->id_jenis_ulangan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Anda yakin akan menghapus data jenis ulangan ini?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              <a href="/admin/jenis_ulangan/hapus/{{ $jenis_ulangan->id }}" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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
        <div class="modal-header"><h4 class="modal-title"> Tambah Jenis Ulangan </h4></div>
          <form action="/admin/jenis_ulangan/tambah" method="post">
            @csrf
            <div class="modal-body">
              <div class="form-group">
                <label for="kelas"> Nama Jenis Ulangan</label>
                <input type="text" id="nama_jenis_ulangan" name="nama_jenis_ulangan" class="form-control" placeholder="Jenis Ulangan" required>                    
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