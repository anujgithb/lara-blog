@extends('layouts.app')

@section('title'," | $post->title")

@section('content')
<div class="container">
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <img src="{{ asset('public/images/'.$post->image) }}" alt="">
                    <h1>{{ $post->title }}</h1>
                    <p>{!! $post->body !!}</p>
                    <p><strong>Posted In : </strong>{{ $post->category->name }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h3><span class="glyphicon glyphicon-comment"></span> {{ $post->comments()->count() }} Comments</h3>
                    <ul class="media-list">
                    @foreach($post->comments as $comment)
                        <li>
                            <div class="well">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                        <img class="media-object" style="width: 64px; height: 64px;" src="..." alt="...">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                    <h4 class="media-heading">{{ $comment->name }}</h4>
                                    <p style="color:rgb(180, 180, 180);">{{ $comment->created_at }}</p>
                                    {{ $comment->comment }}
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <hr>
                    {!! Form::open(['route'=>['comments.store',$post->id]],['method'=>'POST']) !!}
                        <div class="col-md-6">
                            {{ Form::label('name', 'Name : ') }}
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="col-md-6">
                            {{ Form::label('email', 'Email : ') }}
                            {{ Form::text('email', null, ['class' => 'form-control']) }}
                        </div>
                        
                        {{ Form::label('comment', 'Comment : ') }}
                        {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows'=>5]) }}

                        {{ Form::submit('Add Comment',['class' => 'btn btn-success btn-block', 'style'=>'margin-top:20px;']) }}

                    {!! Form::close() !!}
                </div>
            </div>
    </div>
</div>
</div>

@endsection