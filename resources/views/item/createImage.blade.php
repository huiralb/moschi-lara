@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                		<h3 class="panel-title">Upload image <strong></strong></h3>
                	</div>
                	<div class="panel-body">
                        {!! Form::open(['url'=>'item/image', 'class'=>'form-horizontal', 'files'=>true]) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'Name:', ['class'=>'col-sm-3']) !!}
                                <div class="col-sm-6">
                                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                                </div>
                            </div>

                             <div class="form-group">
                                 <div class="col-sm-6 col-sm-offset-3">
                                     {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
                                 </div>
                             </div>
                        {!! Form::close() !!}
                	</div>
                </div>
            </div>
        </div>
    </div>
@stop