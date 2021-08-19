<!DOCTYPE html>
<html lang="en">
<head>
	<title>E-Learning</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="shortcut icon" type="image/png" href="{{ asset('images/smpdw.png') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('css/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('css/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
<!--===============================================================================================-->
  <link rel="stylesheet" href="{{ asset('css/materialdesignicons.css') }}">
  <link rel="stylesheet" href="{{ asset('css/simple-line-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet" />
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-color: #4d96f1;">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
        <center><img src="{{ asset('images/smpdw.png') }}" alt="" height="100" width="100"></center><br>
        <form method="post" action="/login" class="login100-form validate-form">
          @csrf
          <span class="login100-form-title p-b-49">
            E-LEARNING
          </span>
          <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is required">
            <span for="nis" class="label-input100">Username/NIS</span>
            <input class="input100" type="text" name="username" placeholder="Type your username" required>
            <span class="focus-input100" data-symbol="&#xf206;"></span>
          </div>
          <div class="wrap-input100 validate-input m-b-23" data-validate="Password is required">
            <span for="Password" class="label-input100">Password</span>
            <input class="input100" type="password" name="password" placeholder="Type your password" required>
            <span class="focus-input100" data-symbol="&#xf190;"></span>
          </div>
          <div class="container-login100-form-btn m-b-23">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button value="LOGIN" name="Login" type="submit" class="login100-form-btn">
                Login
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
	
<!--===============================================================================================-->
	<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/popper.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/moment.js') }}"></script>
	<script src="{{ asset('js/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/main.js') }}"></script>
	<script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/sweetalert.min.js') }}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/misc.js') }}"></script>
</body>
</html>