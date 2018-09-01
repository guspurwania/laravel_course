@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data {{ $title }}</div>

                <div class="card-body">
                    <a href="{{ route('blog.create') }}" class="btn btn-primary" style="color:#fff">
                        Tambah Data
                    </a>
                    <br /><br />
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Title</td>
                                <td>Content</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->content }}</td>
                                    <td>
                                        {{ Form::open(['method' => 'DELETE', 'route' => ['blog.destroy', $blog->id], 'class'=>'form-inline']) }}

                                            <a href="{{ route('blog.show', ['id' => $blog->id]) }}" class="btn btn-success btn-sm">View</a>&nbsp;

                                            <a href="{{ route('blog.edit', ['id' => $blog->id]) }}" class="btn btn-info btn-sm">Edit</a>&nbsp;
                                            
                                            {{ Form::hidden('id', $blog->id) }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                                        {{ Form::close() }}
                                    </td>
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
