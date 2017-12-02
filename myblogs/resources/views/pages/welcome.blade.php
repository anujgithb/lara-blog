@extends('layouts.app') 
@section('title','| Home page') 
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="jumbotron">
      <h1 class="display-3">Welcome to the Blog</h1>
      <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
      <hr class="my-4">
      <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
      <p class="lead">
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
      </p>
    </div>
  </div>
  <div class="col-sm-8">
    @foreach($posts as $post)
      <div class="post">
        <h3>{{ $post->title }}</h3>
        <p>{{ (strlen($post->body)<300)?$post->body:substr($post->body,0,300)."..." }}</p>
        <a class="btn btn-primary" href="{!! route('blog.single',[$post->slug]) !!}">Read More</a>
      </div>
      <hr class="my-4">
    @endforeach

  </div>

  <div class="col-md-3 offset-md-1">
    <h3>Sidebar</h3>
  </div>
</div>
@endsection @section('script')
<script>
  alert('Hi..');
</script>
@endsection