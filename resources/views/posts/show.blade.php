@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">
                   <h4> {{ $post->title }} </h4>
                   <p> {{ $post->body }} </p>
                   <div class="row">
                    <div class="col-sm-6">Posted By:{{ $post->user->name }}</div>
                    <div class="col-sm-6">Posted Date:{{ $post->created_at }}</div>
                    </div>
                    <div class="row">
                    <div class="col-sm-12">
                        <hr/>
                    <div class="text-center">
                        @if(Auth::check())
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
                        Post Comment</button>
                        @else
                        <p>Login to post comment. <a href="{{ route('login') }}">Click here</a> to login
                        @endif
                </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Comment</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
      <div class="form-group">
  <label for="comment">Comment:</label>
  <textarea class="form-control" rows="5" id="comment"></textarea>
</div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success">Submit</button>
      </div>
    </div>

  </div>
</div>
@endsection