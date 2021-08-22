@extends('template_admin')
@section('konten')
  <div class="content-wrapper">
    <h3> <b>Semester</b> <small class="text-muted"></small></h3>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
          <h4 class="card-title">Data Semester</h4>
          <div class="table-responsive">
            <table class="table table-condensed table-striped table-hover" id="data">
              <thead class="bg-dark text-white">
                <tr>
                  <th class="text-center">No.</th> 
                  <th class="text-center">Nama Semester</th>            
                </tr>                        
              </thead>  
              <tbody>
                <?php $no = 1; ?>
                @foreach ($semester as $semester)
                  <tr>
                    <td class="text-center"><b>{{ $no++ }}.</b> </td>
                    <td class="text-center">{{ $semester->nama_semester }} </td>
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