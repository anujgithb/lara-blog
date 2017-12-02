@extends('layouts.app')

@section('title',' All Categories')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel">
        <div class="panel-heading">
        <div class="col-md-12">
            <h1>All Categories</h1>
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
                        
                        <th>Created At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 0; ?>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ ++$count }}</td>
                        <td>{{ $category->name }}</td>
                        
                        <td>{{ date('M j,Y',strtotime($category->created_at)) }}</td>
                        <td>
                            {{ Form::open(['route'=>['category.destroy',$category->id],'method'=>'DELETE']) }}
                            {{ Form::submit('Delete',['class'=>'btn btn-danger btn-block']) }}
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
            {!! Form::open(['route' => 'category.store']) !!}

                {{ Form::label('name', 'Category : ') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}


                {{ Form::submit('Add Category', ['class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;']) }}
            {!! Form::close() !!}
        </div>
        </div>
        </div>
        </div>
    </div>
</div>
@endsection