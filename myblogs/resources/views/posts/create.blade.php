@extends('layouts.app')
@section('title','Create Your Post')

@section('other_css')
    {!! Html::style('public/css/select2.min.css') !!}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="panel">
        <div class="panel-body">
        <div class="col-md-8">
            <h1>Create Your Post</h1>
            {!! Form::open(['route' => 'posts.store', 'files'  => true]) !!}

                {{ Form::label('title', 'Title : ') }}
                {{ Form::text('title', null, ['class' => 'form-control']) }}

                {{ Form::label('slug', 'Slug : ') }}
                {{ Form::text('slug', null, ['class' => 'form-control','required'=>'required','minlength'=>'5' , 'maxlength'=>'255']) }}

                {{ Form::label('tags', 'Tag :') }}
                <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('category_id', 'Category : ')}}
                <select name="category_id" id="category" class="form-control">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('featured_image', 'Upload Featured Image:')}}
                {{ Form::file('featured_image',['class' => 'form-control'] ) }}

                {{ Form::label('body', 'Post Body : ') }}
                {{ Form::textarea('body', null,['class' => 'form-control'])}}

                {{ Form::submit('Create Post', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;']) }}
            {!! Form::close() !!}
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection()

@section('other_js')
    {!! Html::script('public/js/select2.min.js') !!}
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection