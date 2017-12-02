@extends('layouts.app')

@section('title',' | Blog')

@section('content')
    <div class="container">
    <div class="row">
    <div class="panel">
        <div class="col-md-8 offset-md-2">
        <div class="panel-heading">
            <h1>Blog</h1>
        </div>
        </div>
        <div class="panel-body">

    @foreach($posts as $post)
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>{{ $post->title }}</h2>
            <h5>Publish at : {{ date('M d, Y',strtotime($post->created_at)) }}</h5>
            <p>{{ (strlen(strip_tags($post->body))<300)?substr(strip_tags($post->body) ,0,300):substr(strip_tags($post->body) ,0,300)."..." }}</p>
            {!! Html::linkRoute('blog.single','Read More',[$post->slug], ['class'=>'btn btn-info']) !!}
            <hr>
        </div>
    </div>
    @endforeach

    <div class="row">
        <div class="col-md-12">{!! $posts->links('pagination') !!}</div>
    </div>
    </div>
        </div>
        </div>
    </div>
    </div>

@endsection