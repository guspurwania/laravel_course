@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="list-group">
              <a href="/home" class="list-group-item">
                Dashboard
              </a>
              <a href="/blog" class="list-group-item active">Blog</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Edit Data Blog</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    {{ Form::open(['method'=>'PUT', 'route' => ['blog.update', $blog->id]]) }}
                    <div class="form-group">
                        <div class="label">Title</div>
                        {{ Form::text('title', $blog->title) }}
                    </div>
                    <div class="form-group">
                        <div class="label">Content</div>
                        {{ Form::textarea('content', $blog->content) }}
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
