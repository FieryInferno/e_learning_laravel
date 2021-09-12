@extends('template_admin')
@section('konten')
  <div class="content-wrapper">
    <h3> <b>Guru</b> <small class="text-muted"></small></h3>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
          <p class="card-description">
            <a href="/admin/guru/tambah" class="btn btn-info text-white"><i class="fa fa-plus"></i> Tambah Guru</a> <br>
          </p>
          <h4 class="card-title">Data Guru</h4>
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
                  <th class="text-center" width="5%">No.</th>
                  <th class="text-center" width="10%">NIP</th>
                  <th class="text-center" width="20%">Nama Guru</th>
                  <th class="text-center" width="15%">Username</th>
                  <th class="text-center" width="35%">Foto</th>
                  <th class="text-center" width="15%">Opsi</th>
                </tr>
              </thead>  
              <tbody>
                <?php $no = 1; ?>
                @foreach ($guru as $g)
                  <tr>
                    <td class="text-center"><b>{{ $no++ }}.</b> </td>
                    <td class="text-center">{{ $g->nip }}</td>
                    <td class="text-center">{{ $g->user->nama_lengkap }}</td>
                    <td class="text-center">{{ $g->user->username }}</td>
                    <td class="text-center"><img src="{{ asset('images/' . $g->user->foto) }}" alt="" width="30%"></td>
                    <td class="text-center">
                      <a href="/admin/guru/edit/{{ $g->id }}" class="btn btn-success"><i class="fa fa-pencil"></i> Edit</a>

                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus{{ $g->id }}"><i class="fa fa-trash"></i> Hapus</button>

                      <!-- Modal -->
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
                              Anda yakin akan menghapus data g ini?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              <form action="/admin/guru/hapus/{{ $g->id }}" method="post">
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
              <tfoot class="bg-dark text-white">
                <tr>
                  <th class="text-center" width="5%">No.</th>
                  <th class="text-center" width="10%">NIP</th>
                  <th class="text-center" width="20%">Nama Guru</th>
                  <th class="text-center" width="15%">Username</th>
                  <th class="text-center" width="35%">Foto</th>
                  <th class="text-center" width="15%">Opsi</th>
                </tr>
              </tfoot>
            </table>
          </div>
          </div>
        </div> 
      </div>
    </div>
  </div>
@endsection