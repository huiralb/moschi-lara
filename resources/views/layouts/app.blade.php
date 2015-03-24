<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Made Outside China</title>

	{!! HTML::style('/public/css/owl.carousel.css') !!}
	{!! HTML::style('/public/css/font-awesome.min.css') !!}
	{!! HTML::style('/public/css/app.css') !!}
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
							<li class="dropdown text-capitalize">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="{{ URL::to('/user') }}">Profile</a></li>
									<li><a href="{{ URL::to('/auth/logout') }}">Logout</a></li>
								</ul>
							</li>
						@endif
					</ul>
				</div>
			</div>
		</nav>
	</header>
	
	<article style="min-height:250px;">
		@yield('content')
	</article>

	<!-- FOOTER -->
	<footer id="footer">
		<div class="container">
			<div class="col-md-12 footer-widget">
				<div class="row">

					<div class="col-md-3" id="alert">
						<h4>Moschi Alert</h4>
						<hr>
						<p>
							Get Update new product by entering your Email here
						</p>

						form Alert email newsletter
						<input type="email" class="form-control" placeholder="name@domain.com"/>
						<button class="btn btn-block btn-alert">Subscribe</button>
					</div>
					<!-- /.alert -->

					<div class="col-md-3 service">
						<h4>Services &amp; Tools</h4>
						<hr>
						<ul>
							<li><a href="#">My Account</a></li>
							<li><a href="#">Trade Manager</a></li>
							<li><a href="#">Mochi Learning Center</a></li>
						</ul>
					</div>

					<div class="col-md-3 how-to-buy">
						<h4>How to buy</h4>
						<hr>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, quis.</p>
					</div>

					<div class="col-md-3 about">
						<h4>About Moschi</h4>
						<hr>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque quam, asperiores at
							ducimus explicabo. Fuga sapiente, cumque doloremque quae animi!
						</p>

						<div class="socmed">
							<h5>Connect with Madeoutsidechina</h5>
							<ul>
								<li><a href="#"><img class="img-responsive" src="{{ URL::asset('public/images/socmed/facebook.jpg') }}" alt="facebook"></a>
								</li>
								<li><a href="#"><img class="img-responsive" src="{{ URL::asset('public/images/socmed/twitter.jpg') }}"
													 alt="twitter"></a></li>
								<li><a href="#"><img class="img-responsive" src="{{ URL::asset('public/images/socmed/linkedin.jpg') }}" alt="linkedin"></a>
								</li>
								<li><a href="#"><img class="img-responsive" src="{{ URL::asset('public/images/socmed/googleplus.jpg') }}"
													 alt="googleplus"></a></li>
								<li><a href="#"><img class="img-responsive" src="{{ URL::asset('public/images/socmed/youtube.jpg') }}"
													 alt="youtube"></a></li>
							</ul>
						</div>
					</div>

				</div>
			</div>
			<!-- end footer-widget -->

			<div class="col-md-12 copyright text-center">
				<hr/>
				<h6>Copyright</h6>
			</div>

		</div>{{-- End container --}}
	</footer>

	<!-- FOOTER -->

</body>
</html>
