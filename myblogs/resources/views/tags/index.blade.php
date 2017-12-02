@extends('layouts.app')

@section('title',' All Categories')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel">
        <div class="panel-heading">
        <div class="col-md-12">
            <h1>All Tags</h1>
        </div>
        </div>
        <hr>
        <div class="panel-body">
        
        <div class="col-md-8 table-responsive">
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        
                        <th>created at</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 0; ?>
                    @foreach($tags as $tag)
                    <tr>
                        <td>{{ ++$count }}</td>
                        <td><a href="{{ route('tags.show',$tag->id) }}">{{ $tag->name }}</a></td>
                        <td>{{ date('M j,Y',strtotime($tag->created_at)) }}</td>
                                                <td>

                            {{ Form::open(['route'=>['tags.destroy',$tag->id],'method'=>'DELETE']) }}
                            {{ Html::linkRoute('tags.edit','Edit', [$tag->id], ['class'=>'btn btn-default']) }}
                            {{ Form::submit('Delete',['class'=>'btn btn-danger']) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            
                
        </div> {{--  end of coll-md-8  --}}
        <div class="col-md-4">
        <div class="well">
            <h3>Add Post Category</h3>
            {!! Form::open(['route' => 'tags.store','method'=>'POST']) !!}

                {{ Form::label('name', 'Tag : ') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}


                {{ Form::submit('Add Tag', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;']) }}
            {!! Form::close() !!}
        </div>
        </div>
        </div>
        </div>
    </div>
</div>
@endsection