@extends('template_guru')
@section('konten')
  <div class="content-wrapper">
    <h3> <b>Dashboard</b> <small class="text-muted"></small></h3>
    <hr>
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="row">
          <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 grid-margin stretch-card">
            <div class="card card-statistics" style="background-color: #00BCD4;border-radius: 10px;">
              <div class="card-body">
                <div class="clearfix">
                  <div class="float-left">
                    <img class="menu-icon" src="{{ asset('images/menu_icons/118-calendar.png') }}" alt="menu icon" style="width:50px;height:50px;">
                  </div>
                  <div class="float-right">
                    <p class="card-text text-right font-weight-bold text-white">Jumlah Jadwal</p>
                    <div class="fluid-container">
                      <h3 class="card-title font-weight-bold text-center mb-0 text-white">$jumlah_jadwal</h3>
                    </div>
                  </div>
                </div>
                <hr>            
                <a href="?page=mapel" class="text-white"><i class="fa fa-chevron-circle-right text-white" aria-hidden="true"></i> Lihat</a>           
              </div>
            </div>
          </div>
          <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 grid-margin stretch-card">
            <div class="card card-statistics" style="background-color: #9C27B0;border-radius: 10px;">
              <div class="card-body">
                <div class="clearfix">
                  <div class="float-left">
                    <img class="menu-icon" src="{{ asset('images/menu_icons/157-study.png') }}" alt="menu icon" style="width:50px;height:50px;">
                  </div>
                  <div class="float-right">
                    <p class="card-text text-right font-weight-bold text-white">Jumlah Tugas</p>
                    <div class="fluid-container">
                      <h3 class="card-title font-weight-bold text-center mb-0 text-white">$jumlah_tugas</h3>
                    </div>
                  </div>
                </div>
                <hr>            
                <a href="?page=tugas&act=view" class="text-white"><i class="fa fa-chevron-circle-right text-white" aria-hidden="true"></i> Lihat</a>           
              </div>
            </div>
          </div>
          <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 grid-margin stretch-card">
            <div class="card card-statistics" style="background-color: #FF5722;border-radius: 10px;">
              <div class="card-body">
                <div class="clearfix">
                  <div class="float-left">
                    <img class="menu-icon" src="{{ asset('images/menu_icons/097-open book.png') }}" alt="menu icon" style="width:50px;height:50px;">
                  </div>
                  <div class="float-right">
                    <p class="card-text text-right font-weight-bold text-white">Jumlah Materi</p>
                    <div class="fluid-container">
                      <h3 class="card-title font-weight-bold text-center mb-0 text-white">$jumlah_materi</h3>
                    </div>
                  </div>
                </div>
                <hr>            
                  <a href="?page=materi" class="text-white"><i class="fa fa-chevron-circle-right text-white" aria-hidden="true"></i> Lihat</a>           
              </div>
            </div>
          </div>

          <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 grid-margin stretch-card">
            <div class="card card-statistics" style="background-color: #212121;border-radius: 10px;">
              <div class="card-body">
                <div class="clearfix">
                  <div class="float-left">
                    <img class="menu-icon" src="{{ asset('images/menu_icons/142-signing.png') }}" alt="menu icon" style="width:50px;height:50px;">
                  </div>
                  <div class="float-right">
                    <p class="card-text text-right font-weight-bold text-white">Jumlah Ulangan</p>
                    <div class="fluid-container">
                      <h3 class="card-title font-weight-bold text-center mb-0 text-white">$jumlah_ujian</h3>
                    </div>
                  </div>
                </div>
                <hr>            
                  <a href="?page=ujian" class="text-white"><i class="fa fa-chevron-circle-right text-white" aria-hidden="true"></i> Lihat</a>           
              </div>
            </div>
          </div>
        </div>  
      </div>   
    </div>   
  </div> 
@endsection