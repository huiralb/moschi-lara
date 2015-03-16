@extends('layouts.app')

@section('content')
<div id="teras">
  <div class="container">
    <div class="row">
      <div class="col-sm-4 categories">
        <div class="list-group text-capitalize">
          <li class="list-group-item active" style="position:relative">Categories</li>
          @foreach($maincategories as $main)
          <a tab-index="-1" class="list-group-item" href="{{ $main->id }}">{{ $main->name }}
            @if( $main->categories() )
              <ul class="dropdown list-group text-primary">
                @foreach($main->categories() as $categories)
                <li class="list-group-item">{{ $categories->name }}</li>
                @endforeach
              </ul>
            @endif
          </a>
          @endforeach
        </div>
      </div>
      <div class="col-sm-8">
        <div id="home-slideshow-1" class="owl-carousel owl-theme">
          <div class="item">
            <img src="{{ URL::to('public/images/iPhone6-1140x380.jpg') }}" alt="iPhone 6" class="img-responsive">
          </div>

          <div class="item">
            <img src="{{ URL::to('public/images/MacBookAir-1140x380.jpg') }}" alt="MacBookAir" class="img-responsive">
          </div>
        </div>
        <div id="home-slideshow-2" class="owl-carousel owl-theme" style="height:218px;">
          <div class="item">
            <img src="{{ URL::to('public/images/iPhone6-1140x380.jpg') }}" alt="iPhone 6" class="img-responsive">
          </div>

          <div class="item">
            <img src="{{ URL::to('public/images/MacBookAir-1140x380.jpg') }}" alt="MacBookAir" class="img-responsive">
          </div>
        </div>


        {!! HTML::script('public/js/owl.carousel.min.js') !!}
        <script type="text/javascript"><!--
        $('#home-slideshow-1').owlCarousel({
          items: 6,
          autoPlay: 5000,
          singleItem: true,
          navigation: true,
          navigationText: ['<i class="fa fa-chevron-left fa-5x"></i>', '<i class="fa fa-chevron-right fa-5x"></i>'],
          pagination: true
        });
        --></script>
        <script type="text/javascript"><!--
        $('#home-slideshow-2').owlCarousel({
          items: 6,
          autoPlay: 3000,
          singleItem: true,
          navigation: true,
          navigationText: ['<i class="fa fa-chevron-left fa-5x"></i>', '<i class="fa fa-chevron-right fa-5x"></i>'],
          pagination: true
        });
        --></script>
      </div>

      <div class="col-sm-12" id="products">
        <h1>Features</h1>

        @if( $products )
          @foreach( $products as $product )
          <div class="col-sm-4 col-md-3">
            <div class="product-thumb">
              <figure>
                <a href="{{ URL::to('itm/'.str_slug($product->name, '-').'/'.$product->id) }}">
                  <img src="{{ URL::asset('public').'/'.$product->image }}" alt="{{ $product->name }}">
                </a>
              </figure>
              <div class="caption">
                <h4><a href="{{ URL::to('itm/'.$product->name.'/'.$product->id) }}">{{ $product->name }}</a></h4>
                <p>
                  {{ str_limit($product->description) }}
                </p>
                <p class="price">
                </p>

              </div>
              <div class="button-group">
                <button type="button"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Add to Cart</span></button>
                <button type="button" data-toggle="tooltip" title="" data-original-title="Add to Wish List"><i class="fa fa-heart"></i></button>
                <button type="button" data-toggle="tooltip" title="" data-original-title="Compare this Product"><i class="fa fa-exchange"></i></button>
              </div>
            </div>
          </div>
          @endforeach
        @endif
      </div>

    </div><!-- End row -->
  </div><!-- End container -->
</div><!-- End #teras -->

@endsection