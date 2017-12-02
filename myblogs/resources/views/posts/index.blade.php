@extends('layouts.app')

@section('title',' All Posts')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel">
        <div class="panel-heading">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>
        <div class="col-md-2"><a href="{{ route('posts.create') }}" class="btn btn-block btn-sm btn-info">Create New</a></div>
        </div>
        <div class="panel-body">
        <div class="col-md-12 table-responsive">
            <hr>
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th>Created At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 0; ?>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ ++$count }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ substr(strip_tags($post->body),0,50) }}...</td>
                        <td>{{ date('M j,Y',strtotime($post->created_at)) }}</td>
                        <td>
                        {!! Html::linkRoute('posts.show','View',[$post->id],['class'=>'btn btn-success btn-sm']) !!}
                        {!! Html::linkRoute('posts.edit','Edit',[$post->id],['class'=>'btn btn-danger btn-sm']) !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
                {!! $posts->render('pagination') !!}
            
                
        </div>
        </div>
        </div>
    </div>
</div>
@endsection