@extends('layouts.app')
@section('title', " | $tag->name Tag")

@section('content')

<div class="container">
    <div class="row">
    <div class="panel">
        <div class="panel-body">
        <div class="col-md-8">
            <h1>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} Posts</small></h1>
        </div>
        <div class="col-md-2 col-md-offset-2">
            <button class="btn btn-primary pull-right">Edit</button>
        </div>
        <div class="col-sm-12">
            <hr>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 0; ?>
                    @foreach($tag->posts as $post)
                    <tr>
                        <td>{{ ++$count }}</td>
                        <td>{{$post->title}}</td>
                        <td>
                            <div class="tags">
                                @foreach($post->tags as $tag)
                                    <div class="label label-default">{{$tag->name}}</div>
                                @endforeach
                            </div>
                        </td>
                        <td><a href="{{ route('posts.show',$post->id) }}" class="btn btn-default">View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>    
        </div>
        </div>
        </div>
    </div>
</div>
@endsection