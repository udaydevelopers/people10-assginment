@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   @foreach($posts as $post)
                   <p><a href="{{ route('posts.show', $post->id) }} "> {{ $post->title }} </a></p>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection