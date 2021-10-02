@extends('template_guru')
@section('konten')
  <div class="content-wrapper">
    <h3> <b>Data Tugas</b> <small class="text-muted"></small></h3>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Data Tugas</h4>
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
                    <th class="text-center">Jenis Tugas</th>
                    <th class="text-center">Mata Pelajaran</th>
                  </tr>
                </thead>
                <tfoot class="bg-dark text-white">
                  <tr>
                    <th class="text-center">Jenis Tugas</th>
                    <th class="text-center">Mata Pelajaran</th>
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td class="text-center"><strong>INDIVIDU</strong></td>
                    <td>
                      <ul>
                        @foreach ($individu as $i)
                          <li class="list-group-item">
                            <b>{{ $i->mata_pelajaran->nama_mata_pelajaran}}</b> | {{ $i->semester->nama_semester }}
                            <ul>     
                            </ul>            
                          </li>
                        @endforeach
                      </ul>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center"><strong>KELOMPOK</strong></td>
                    <td>
                      <ul>
                        @foreach ($individu as $i)
                          <li class="list-group-item">
                            <b>{{ $i->mata_pelajaran->nama_mata_pelajaran}}</b> | {{ $i->semester->nama_semester }}
                            <ul>     
                            </ul>            
                          </li>
                        @endforeach
                      </ul>
                    </td>
                  </tr>
                </tbody>
              </table>                    
            </div>
          </div>
        </div> 
      </div>
    </div>
  </div>
@endsection