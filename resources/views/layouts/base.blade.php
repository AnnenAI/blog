<!DOCTYPE html>
<html lang="en">
<head>
	@include('includes.head')
</head>
<body>

	@include('includes.navbar')
	<div class="container">
		@include('includes.messages')
		@yield('content')
	</div>
	@include('includes.footer')

	</body>
</html>
