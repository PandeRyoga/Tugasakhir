
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Dashboard | Desa Adat Bualu</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('front/img/logo-desa-mini.png')}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<script src="{{ asset('back/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{ asset('back/css/fonts.min.css')}}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('back/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('back/css/atlantis.min.css') }}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{ asset('back/css/demo.css') }}">
</head>
<body>
	<div class="wrapper">
		

	@include('include.header')

    @include('include.sidebar')

		<div class="main-panel">
			<div class="content">
				@yield('content')
			</div>
			<!-- Footer -->
		</div>
		
		
	</div>
	@include('include.js')
	@include('sweetalert::alert')

</body>
</html>