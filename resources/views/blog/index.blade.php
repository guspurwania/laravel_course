@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="list-group">
              <a href="home" class="list-group-item">
                Dashboard
              </a>
              <a href="blog" class="list-group-item active">Blog</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Data {{ $title }}</div>

                <div class="card-body">
                    <a href="{{ route('blog.create') }}" class="btn btn-primary" style="color:#fff">
                        Tambah Data
                    </a>
                    <br /><br />
                    <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <td>Created By</td>
                                <td>Category</td>
                                <td>Title</td>
                                <td>Content</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->user->name }}</td>
                                    <td>{{ $blog->category->name }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ substr($blog->content, 0, 20) }}...</td>
                                    <td>
                                        {{ Form::open(['method' => 'DELETE', 'route' => ['blog.destroy', $blog->id], 'class'=>'form-inline']) }}

                                            <a href="{{ route('blog.show', ['id' => $blog->id]) }}" class="btn btn-success btn-sm">View</a>&nbsp;

                                            <a style="color:#fff" href="{{ route('blog.edit', ['id' => $blog->id]) }}" class="btn btn-info btn-sm">Edit</a>&nbsp;

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

@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script type="text/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
@endsection
