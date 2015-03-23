@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-12" id="products">
            @if(!$products->isEmpty())
                @foreach( $products as $product )
                    <div class="col-sm-4 col-md-3">
                        <div class="product-thumb">
                            @foreach($product->image() as $image)
                                <figure>
                                    <a href="{{ URL::to('itm/'.str_slug($product->name, '-').'/'.$product->id) }}">
                                        <img src="{{ URL::asset('public').'/images/products/'.$image->name }}"
                                             alt="{{ $product->name }}">
                                    </a>
                                </figure>
                            @endforeach
                            <div class="caption">
                                <h4>
                                    <a href="{{ URL::to('itm/'.$product->name.'/'.$product->id) }}">{{ $product->name }}</a>
                                </h4>

                                <p>
                                    {{ str_limit($product->description) }}
                                </p>

                                <p class="price">

                                </p>

                            </div>
                            <div class="button-group">
                                <button type="button"><i class="fa fa-shopping-cart"></i> <span
                                            class="hidden-xs hidden-sm hidden-md">Add to Cart</span></button>
                                <button type="button" data-toggle="tooltip" title=""
                                        data-original-title="Add to Wish List"><i class="fa fa-heart"></i></button>
                                <button type="button" data-toggle="tooltip" title=""
                                        data-original-title="Compare this Product"><i class="fa fa-exchange"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Product is empty</p>
            @endif
        </div>
    </div>
@stop

