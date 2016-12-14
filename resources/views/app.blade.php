<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>My First App</title>
		<link rel="stylesheet" href="{{ elixir('css/all.css') }}"/>
	</head>

	<body>

		@include('partials.nav')

		<div class="container">

			<!--include('partials.flash')-->
			@include('flash::message')

			@yield('content')
		</div>

		<script src="/js/all.js"></script>			
		<script>
			//$('div.alert').not('.alert-important').delay(3000).slideUp(300);
			$('#flash-overlay-modal').modal();
		</script>

		@yield('footer')
	</body>
</html>