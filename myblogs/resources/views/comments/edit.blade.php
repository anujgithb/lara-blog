@extends('layouts.app')

@section('title','| Edit Comment')

@section('content')

    <div class="container">
        <div class="panel">
            <div class="row">
            <div class="col-md-8">
                <div class="panel-heading"><div class="panel-title">Edit Comment</div></div>
                <div class="panel-body ">

                    {!! Form::model($comment,['route'=>['comments.update', $comment->id], 'method'=>'PUT']) !!}

                    {{ Form::label('name', 'Name: ') }}
                    {{ Form::text('name', null, ['class'=>'form-control', 'disabled'=>'disabled']) }}    

                    {{ Form::label('email', 'Email: ') }}
                    {{ Form::text('email', null, ['class'=>'form-control', 'disabled'=>'disabled']) }}

                    {{ Form::label('coment', 'Comment: ') }}
                    {{ Form::textarea('comment', null, ['class'=>'form-control']) }}

                    {{ Form::submit('Update', ['class'=>'btn btn-success btn-block', 'style'=>'margin-top:20px;']) }}

                    {!! Form::close() !!}
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection