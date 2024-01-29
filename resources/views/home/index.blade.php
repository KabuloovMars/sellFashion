@if (Session::has('message'))

<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{session()->get('message')}}</strong>
</div>
@endifG


<!DOCTYPE HTML>
<html>
	<head>
	<title>FASHION</title>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	@include('home.css')
	</head>
	<body>

	<div class="colorlib-loader"></div>

	<div id="page">
		@include('home.header')
		@include('home.slider')
		@include('home.colorlib')
		@include('home.product')


        @include('home.colorlib-product')

        @include('home.partnyor')

        @include('home.footer')

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	@include('home.js')

	</body>
</html>

