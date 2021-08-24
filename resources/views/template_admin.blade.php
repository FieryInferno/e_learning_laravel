<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>E-learning | {{ ucwords(auth()->user()->username) }}</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/simple-line-icons.css') }}">
    <!-- plugin css for this page -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <!-- endinject -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('images/smpdw.png') }}"/>
  <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet" />
  <!-- <link rel="stylesheet" type="text/css" href="../vendor/css/jquery.dataTables.css"> -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
</head>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="background: #4d9be6;">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center" style="background-color: #4d9be6;">
        <a class="navbar-brand brand-logo" href="index.php" style="font-family:Aegyptus;font-weight: bold;font-size: 30px;">
          <img src="{{ asset('images/' . $konfigurasi->logo) }}" alt="logo" style="height: 45px;width: 45px;border-radius: 10px;">
          <!-- <i class="fa fa-graduation-cap"></i> --><b>{{ $konfigurasi->nama_aplikasi }}</b>
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.php">
          <!-- <img src="../vendor/images/logo.png" alt="logo"/> -->
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center" style="background-color: #4d9be6;">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item" style="width: 400px;">
            <a href="#" style="color: #fff;text-decoration: none;">
              <!-- <img src="../vendor/images/smk.png" style="height: 40px;border-radius:10px;"> &nbsp; -->
            <b>{{ $konfigurasi->nama_sekolah }}</b>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image"> 
                <img src="{{ asset('images/' . auth()->user()->foto ) }}" alt="image" style="border-radius: 0px;"/>
                <span class="online-status online"></span> 
              </div>
              <div class="profile-name">
                <p class="name">{{ auth()->user()->nama_lengkap }}</p>
                <p class="designation">Admin</p>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/"><img class="menu-icon" src="{{ asset('images/menu_icons/027-tutorial.png') }}" alt="menu icon" style="width:30px;height:30px;"><span class="menu-title">DASHBOARD</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#masterData" aria-expanded="false" aria-controls="general-pages"><img class="menu-icon" src="{{ asset('images/menu_icons/108-folder1.png') }}" alt="menu icon" style="width:30px;height:30px;"><span class="menu-title"> DATA MASTER </span><i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="masterData" style="background-color:#c7dcd0;">
              <ul class="nav flex-column sub-menu" style="margin-left:-34px;">
                <p></p>
                <li class="nav-item">
                  <a class="nav-link" href="/admin/kelas" style="color:#000;">
                    <img class="menu-icon" src="{{ asset('images/menu_icons/tag.png') }}" alt="menu icon" style="width:15px;height:15px;">
                    <span class="menu-title">Master Kelas</span>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/admin/semester" style="color:#000;">
                    <img class="menu-icon" src="{{ asset('images/menu_icons/tag.png') }}" alt="menu icon" style="width:15px;height:15px;"><span class="menu-title">Master Semester</span>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/admin/mata_pelajaran" style="color:#000;">
                    <img class="menu-icon" src="{{ asset('images/menu_icons/tag.png') }}" alt="menu icon" style="width:15px;height:15px;"><span class="menu-title">Master Mata Pelajaran</span>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/admin/jenis_ulangan" style="color:#000;">
                    <img class="menu-icon" src="{{ asset('images/menu_icons/tag.png') }}" alt="menu icon" style="width:15px;height:15px;"><span class="menu-title">Master Jenis Ulangan</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/admin/jadwal" style="color:#000;">
                    <img class="menu-icon" src="{{ asset('images/menu_icons/tag.png') }}" alt="menu icon" style="width:15px;height:15px;"><span class="menu-title">Master Jadwal</span>
                  </a>
                </li>
                <p></p>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#evaluasi" aria-expanded="false" aria-controls="general-pages"><img class="menu-icon" src="{{ asset('images/menu_icons/108-folder.png') }}" alt="menu icon" style="width:30px;height:30px;"><span class="menu-title">DATA PENGGUNA</span><i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="evaluasi" style="background-color:#c7dcd0;">
              <ul class="nav flex-column sub-menu" style="margin-left:-34px;">
              <p></p>
                <li class="nav-item">
                  <a class="nav-link" href="/admin/guru" style="color:#000;">
                    <img class="menu-icon" src="{{ asset('images/menu_icons/115-professor1.png') }}" alt="menu icon" style="width:25px;height:25px;">
                    <span class="menu-title">GURU</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?page=siswa" style="color:#000;">
                    <img class="menu-icon" src="{{ asset('images/menu_icons/') }}155-student.png" alt="menu icon" style="width:25px;height:25px;"><span class="menu-title">SISWA</span>
                  </a>
                </li>
                <p></p>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/setting">
              <img class="menu-icon" src="{{ asset('images/menu_icons/170-technology.png') }}" alt="menu icon" style="width:30px;height:30px;"><span class="menu-title">UBAH APLIKASI</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/profile">
            <img class="menu-icon" src="{{ asset('images/menu_icons/094-online education.png') }}" alt="menu icon" style="width:30px;height:30px;"></i><span class="menu-title">UBAH PROFILE ADMIN</span>
            </a>
          </li>
          <hr>
          <li class="nav-item purchase-button">
            <a class="nav-link" style="background-image: -webkit-linear-gradient(left, #4d9be6 1%, #4d65b4 100%); background-color: #8fd3ff !important;" data-toggle="modal" data-target="#logout">KELUAR</a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <!-- Konten -->
        @yield('konten')
        <!-- End-kontent -->

        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-info d-block text-center text-sm-left d-sm-inline-block">
              copyright {{ $konfigurasi->copyright }}
            </span>

            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">{{ $konfigurasi->nama_sekolah }}<i class="fa fa-graduation-cap text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

<!-- Modal Logout-->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Anda yakin akan mengubah profile?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <a class="nav-link btn btn-primary" href="/logout">KELUAR</a>
      </div>
    </div>
  </div>
</div>
  
  <!-- container-scroller -->
  <!-- plugins:js -->
	<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script src="{{ asset('js/popper.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/sweetalert.min.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/misc.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/ckeditor.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
  <script>

    @if (session('sukses'))
      swal({
        title : 'SUKSES',
        text  :  '{{ session('sukses') }}',
        type  : 'success',
        timer : 3000
      });
    @endif

    @if (session('error'))
      swal({
        title : 'GAGAL',
        text  :  '{{ session('error') }}',
        type  : 'error',
        timer : 3000
      });
    @endif

    $(document).ready(function() {
      $('#data').DataTable();

      CKEDITOR.replace('ckeditor',{    
        filebrowserImageBrowseUrl : '../vendor/kcfinder',
        // uiColor:'#1991eb'
      });
    });
  </script>
</body>
</html>