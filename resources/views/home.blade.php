@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="list-group">
              <a href="home" class="list-group-item active">
                Dashboard
              </a>
              <a href="blog" class="list-group-item">Blog</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! <br />
                    Welcome to Dashboard Panel!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
