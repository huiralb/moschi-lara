<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Made Outside China</title>

	{!! HTML::style('/public/css/owl.carousel.css') !!}
	{!! HTML::style('/public/css/font-awesome.min.css') !!}
	{!! HTML::style('/public/css/app.css?v='.rand(1000,9999)) !!}
	{!! HTML::style('/public/css/fonts.css') !!}
	{{-- Fonts --}}
	{!! HTML::style('//fonts.googleapis.com/css?family=Roboto:400,300') !!}

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<header>
		<nav id="top" class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{ URL::to('/') }}">
            <img src="{{ URL::to('public/images/moschi.png') }}" alt="Madeoutsidechina" title="Madeoutsidechina">
          </a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="{{ URL::to('/') }}">Home</a></li>
					</ul>
					<form id="search" class="navbar-form navbar-left navbar-input-group" role="search">
            <div class="form-group">
              <input type="text" class="form-control" name="search" value="" placeholder="Search">
            </div>
						<select name="category" id="" class="form-control text-capitalize category">
							<option value="">all category</option>
							{{-- @foreach($categories as $category) --}}
{{-- 						  	<option value="{{$category->id}}">{{ $category->name }}</option>
							@endforeach --}}
						</select>
            <button type="button" class="lup btn btn-default"><i class="fa fa-search"></i></button>
          </form>

					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
							<li><a href="{{ URL::to('/auth/login') }}">Login</a></li>
							<li><a href="{{ URL::to('/auth/register') }}">Register</a></li>
						@else
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="{{ URL::to('/auth/logout') }}">Logout</a></li>
								</ul>
							</li>
						@endif
					</ul>
				</div>
			</div>
		</nav>
	</header>
	
	<article style="min-height:370px">
		@yield('content')
	</article>

	<footer>
	  <div class="container">
	    <div class="row">
	      <div class="col-sm-3">
	        <h5>Information</h5>
	        <ul class="list-unstyled">
	            <li><a href="http://madeoutsidechina.com/moschi/#">About Us</a></li>
	            <li><a href="http://madeoutsidechina.com/moschi/#">Delivery Information</a></li>
	            <li><a href="http://madeoutsidechina.com/moschi/#">Privacy Policy</a></li>
	            <li><a href="http://madeoutsidechina.com/moschi/#">Terms &amp; Conditions</a></li>
	          </ul>
	      </div>
	      <div class="col-sm-3">
	        <h5>Customer Service</h5>
	        <ul class="list-unstyled">
	          <li><a href="http://madeoutsidechina.com/moschi/#">Contact Us</a></li>
	          <li><a href="http://madeoutsidechina.com/moschi/#">Returns</a></li>
	          <li><a href="http://madeoutsidechina.com/moschi/#">Site Map</a></li>
	        </ul>
	      </div>
	      <div class="col-sm-3">
	        <h5>Extras</h5>
	        <ul class="list-unstyled">
	          <li><a href="http://madeoutsidechina.com/moschi/#">Brands</a></li>
	          <li><a href="http://madeoutsidechina.com/moschi/#">Gift Vouchers</a></li>
	          <li><a href="http://madeoutsidechina.com/moschi/#">Affiliates</a></li>
	          <li><a href="http://madeoutsidechina.com/moschi/#">Specials</a></li>
	        </ul>
	      </div>
	      <div class="col-sm-3">
	        <h5>My Account</h5>
	        <ul class="list-unstyled">
	          <li><a href="http://madeoutsidechina.com/moschi/#">My Account</a></li>
	          <li><a href="http://madeoutsidechina.com/moschi/#">Order History</a></li>
	          <li><a href="http://madeoutsidechina.com/moschi/#">Wish List</a></li>
	          <li><a href="http://madeoutsidechina.com/moschi/#">Newsletter</a></li>
	        </ul>
	      </div>
	    </div>
	    <hr />
	    <p>Madeoutsidechina © 2015</p> 
	  </div>
	</footer>

</body>
</html>
