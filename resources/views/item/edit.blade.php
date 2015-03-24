@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="col-sm-12">
            {!! Form::model($product, ['class' => 'form-horizontal' ,'method' => 'put', 'route' => ['item.update',
           $product->id] ]) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <legend>Edit Product</legend>
            <div class="form-group">
                {!! Form::label('category', 'Category', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('category_id', array_pluck($categories, 'name', 'id'), $product->category_id, ['class' => 'form-control text-capitalize']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Name', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-md-6">
                    {!! Form::text('name', $product->name, ['class' => 'form-control', 'required' => true]) !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::label('description', 'Description', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-md-6">
                {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
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
@stop