@extends('layouts.app')
@section('title', 'Detail Info of post')

@section('content')

<div class="container">
    <div class="row">
    <div class="panel">
        <div class="panel-body">
        <div class="col-md-8">
            <img src="{{ asset('public/images/'.$post->image) }}" alt="" style="width:100%;">
            <h1>{{ $post->title }}</h1>
            <p> {!! $post->body !!} </p>
            <hr>
            <div class="tags">
                @foreach($post->tags as $tag)
                    <div class="label label-default">{{ $tag->name }}</div>
                @endforeach
            </div>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th style="width:100px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i =0 ; ?>
                    @foreach($post->comments as $comment)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $comment->name }}</td>
                        <td>{{ $comment->email }}</td>
                        <td>{{ $comment->comment }}</td>
                        <td>
                            {!! Form::open(['route' => ['comments.destroy',$comment->id], 'method'=>'DELETE']) !!}
                            <a href="{{ route('comments.edit',[$comment->id]) }}" class="btn btn-primary"><span class="fa fa-pencil"></span></a>
                            <button type="submit" class="btn btn-danger"><span class="fa fa-trash"></span></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <strong>URL Slug:</strong> <a href="{{ url('blog/'.$post->slug) }}">{{ url("blog/$post->slug") }}</a>
                    <br>
                    <strong>Category :</strong> {{ (isset($post->category->name))?$post->category->name:'' }}
                    <br>
                    <strong>Created At:</strong> {{ date('M j, Y H:i',strtotime($post->created_at)) }}
                    <br>
                    <strong>Updated At:</strong> {{ date('M j, Y H:i',strtotime($post->updated_at)) }}
                    <hr>
                    <div class="row">
                        <div class="col-md-6">{!! Html::linkRoute('posts.edit','Edit',[$post->id],['class'=>"btn btn-primary btn-block"]) !!}</div>
                       
                        <div class="col-md-6">
                            {!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) !!}
                            {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
</div>
@endsection