@extends('layouts.app')

@section('title',' Edit Post')

@section('other_css')
    {!! Html::style('public/css/select2.min.css') !!}
@endsection

@section('content')
<div class="container">
    <div class="row">
    <div class="panel">
        <div class="panel-body">
        {!! Form::model($post,['route'=>['posts.update',$post->id], 'method'=>'PUT', 'files' => true]) !!}
        
        <div class="col-md-8">

        {{ Form::label('title', 'Title : ') }}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}

        {{ Form::label('slug', 'Slug : ') }}
        {!! Form::text('slug', null, ['class'=>'form-control']) !!}

        {{ Form::label('category_id', 'Category : ') }}
        {!! Form::select('category_id',$categories, null, ['class'=> 'form-control']) !!}

        
        {{ Form::label('tags', 'Tags :') }}
        {!! Form::select('tags[]',$tags, null, ['class'=> 'js-example-basic-multiple form-control', 'multiple'=>'multiple']) !!}

        {{ Form::label('featured_image', 'Featured Image : ') }}
        {!! Form::file('featured_image', ['class' => 'form-control']) !!}

        {{ Form::label('body', 'Post Body : ') }}
        {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <strong>Created At:</strong> {{ date('M j, Y H:i',strtotime($post->created_at)) }}
                    <br>
                    <strong>Updated At:</strong> {{ date('M j, Y H:i',strtotime($post->updated_at)) }}
                    <hr>
                    <div class="row">
                        <div class="col-md-6">{!! Html::linkRoute('posts.show','Cancle',[$post->id],['class'=>"btn btn-danger btn-block"]) !!}</div>
                        <div class="col-md-6">{!! Form::submit('Save Changes',['class'=>'btn btn-success btn-block']) !!}</div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    </div>
    </div>
    </div>
@endsection


@section('other_js')
    {!! Html::script('public/js/select2.min.js') !!}
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection