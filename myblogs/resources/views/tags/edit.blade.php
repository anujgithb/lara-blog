@extends('layouts.app')

@section('title', ' | Edit Tag')

@section('content')
    <div class="container">
    <div class="panel">
        <div class="panel-body">
        <div class="row">
            <div class="col-md-8">
                
                    <h3>Add Post Category</h3>
                    {!! Form::model($tag , ['route' => ['tags.update',$tag->id],'method'=>'PUT']) !!}

                        {{ Form::label('name', 'Tag : ') }}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}


                        {{ Form::submit('Update Tag', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;']) }}
                    {!! Form::close() !!}
                
            </div>
        </div>
        </div>
    </div>
    </div>
        
@endsection