@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Data Blog</div>

                <div class="card-body">
                    {{ Form::open(['method'=>'POST', 'route' => 'blog.store']) }}
                    <div class="form-group">
                        <div class="label">Title</div>
                        {{ Form::text('title') }}
                    </div>
                    <div class="form-group">
                        <div class="label">Content</div>
                        {{ Form::textarea('content') }}
                    </div>
                    <div class="form-group">
                        {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
