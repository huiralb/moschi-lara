@extends("layouts.app")

@section('content')
    <div class="container" id="edit-product">
        <div class="col-sm-8 col-sm-offset-2 above-col-target">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Product:</h3>
                </div>
            	<div class="panel-body">
                    {!! Form::model($product, ['class'=>'form-horizontal', 'method'=>'put', 'route'=>['item.update', $product->id] ]) !!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                    <div class="form-group">
                            {!! Form::label('category', 'Category:', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-8">
                                {!! Form::select('category_id', array_pluck($categories, 'name', 'id'),
                                $product->category_id, ['class' => 'form-control text-capitalize']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Name:', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-8">
                                {!! Form::text('name', $product->name, ['class' => 'form-control', 'required' => true]) !!}
                            </div>
                        </div>


                        <div class="form-group">
                            {!! Form::label('description', 'Description:', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-8">
                                {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                    Change
                                </button>
                                <a href="{{ URL::previous() }}" class="btn btn-danger" style="margin-right: 15px;">
                                    Cancel
                                </a>

                            </div>
                        </div>
                    {!! Form::close() !!}
            	</div>
            </div>


        </div>

        <div class="col-sm-8 col-sm-offset-2 col-target" id="upload-image">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Manage Picture:</h3>
                </div>
                <div class="panel-body">

                    {{-- Upload image --}}
                    {!! Form::open(['url'=>'item', 'class'=>'form-horizontal', 'role'=>'form', 'files'=>true]) !!}
                        {!! Form::hidden('product_id', $product->id) !!}
                        {!! Form::hidden('imageOnly', 1) !!}
                        <div class="form-group">
                            {!! Form::label('image','Images:', ['class'=>'col-sm-4']) !!}
                            <div class="col-sm-8">
                                {!! Form::input('file', 'images[]', null, ['multiple'=>true,'class'=>'form-control',
                                'accept'=>'image/*']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                {!! Form::submit('Upload', ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                    {{-- ------------ --}}

                    {{-- show & Delete image --}}
                    @foreach($product->images() as $image)
                        <hr/>
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="{!! URL::asset('public/images/products/s'). '/' . $image->name !!}">
                            </a>
                            <div class="media-body">
                                <p>Created On: <strong>{!! $image->created_at !!}</strong></p>
                                {!! Form::open(['method'=>'delete','action'=> ['ProductImageController@destroy', $image->id], 'class'=> 'form-horizontal', 'role'=>'form']) !!}

                                {!! Form::submit('Delete', ['class'=>'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@stop