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
                <div class="card-header">Lihat Data Blog</div>

                <div class="card-body">
                    <h3>{{ $blog->title }}</h3>
                    <small>Created By : {{ $blog->user->name }} | Date : {{ date('d M Y h:i:s', strtotime($blog->created_at)) }}</small><br />
                    <img src="{{ Storage::url('blog/' . $blog->image) }}">
                    <p>{{ $blog->content }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
