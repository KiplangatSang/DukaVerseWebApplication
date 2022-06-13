<!DOCTYPE html>
<html>

<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<!-- Main CSS-->
				<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
				<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
				<!-- Font-icon css-->
				<link rel="stylesheet" type="text/css"
								href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
				<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
				<script type="text/javascript" src="{{ asset('assets/js/plugins/dropzone.js') }}"></script>

				<script type="text/javascript" src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>

				<title> Storm5 Admin Login</title>
</head>

<body>
				<main>
								@yield('content')
				</main>
				<!-- Essential javascripts for application to work-->
				<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
				<script src="{{ asset('assets/js/popper.min.js') }}"></script>
				<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
				<script src="{{ asset('assets/js/main.js') }}"></script>
				<!-- The javascript plugin to display page loading on top-->
				<script src="{{ asset('assets/js/plugins/pace.min.js') }}"></script>
				<script type="text/javascript">
				    // Login Page Flipbox control
				    $('.login-content [data-toggle="flip"]').click(function() {
				        $('.login-box').toggleClass('flipped');
				        return false;
				    });
				</script>

				{{-- multiple select input box --}}


</body>

</html>
