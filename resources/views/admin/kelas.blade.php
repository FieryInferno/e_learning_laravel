@extends('template_admin')
@section('konten')
  <div class="content-wrapper">
    <h3> <b>Kelas</b> <small class="text-muted"></small></h3>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
          <p class="card-description">
            <a data-toggle="modal" data-target="#add" class="btn btn-info text-white"><i class="fa fa-plus"></i> Tambah Kelas</a> <br>
          </p>
          <h4 class="card-title">Data Kelas</h4>
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
                  <th class="text-center">Nama Kelas</th>  
                  <th class="text-center">Opsi</th>                     
                </tr>                        
              </thead>  
              <tbody>
                @foreach ($kelas as $kelas)
                  <?php $no = 1; ?>
                  <tr>
                    <td class="text-center"><b>{{ $no++ }}.</b> </td>
                    <td class="text-center">{{ $kelas->nama_kelas }} </td>
                    <td class="text-center">
                      <a data-toggle="modal" data-target="#edit{{ $kelas->id_kelas }}" class="btn btn-dark btn-xs text-warning"><i class="fa fa-pencil"></i> Edit</a>
                      <!-- modal edit -->
                      <div class="modal fade" id="edit{{ $kelas->id_kelas }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header"><h4 class="modal-title"> Edit Kelas </h4></div>
                              <form action="/admin/kelas/edit/{{ $kelas->id }}" method="post">
                                @csrf
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label for="kelas"> Nama Kelas</label>
                                    <input type="text" id="nama_kelas" name="nama_kelas" class="form-control" value="{{ $kelas->nama_kelas }}" required>  
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
                      <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus{{ $kelas->id_kelas }}"><i class="fa fa-trash"></i> Hapus</button>

                      <!-- Modal -->
                      <div class="modal fade" id="hapus{{ $kelas->id_kelas }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Anda yakin akan menghapus data kelas ini?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              <a href="hapus/{{ $kelas->id_kelas }}" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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
        <div class="modal-header"><h4 class="modal-title"> Tambah Kelas </h4></div>
          <form action="/admin/kelas/tambah" method="post">
            @csrf
            <div class="modal-body">
              <div class="form-group">
                <label for="kelas"> Nama Kelas</label>
                <input type="text" id="nama_kelas" name="nama_kelas" class="form-control" placeholder="Kelas" required>                    
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