@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">Mailgun Mails</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                
                   
                   <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>To</th>
                        <th>Subject</th>
                        <th>Recipient</th>
                        <th>Event Date</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $msg)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $msg['message']['headers']['to'] }}</td>
                        <td>{{ $msg['message']['headers']['subject'] }}</td>
                        <td>{{ $msg['recipient'] }}</td>
                        <td>{{ $msg['event_date'] }}</td>
                        <td>{{ $msg['event'] }}</td>
                        <td>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{ $loop->index }}">
 details
</button>
                        </td>
                    </tr>
                    <div class="modal fade" id="exampleModalCenter{{ $loop->index }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Mail Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <p class="font-weight-bold">To:</p>{{ $msg['msg_url']['recipients'] }} <br/>
                        <p class="font-weight-bold">From:</p>{{ $msg['msg_url']['from'] }} <br/>
                        <p class="font-weight-bold">Subject:</p>{{ $msg['msg_url']['subject'] }} <br/>
                        <p class="font-weight-bold">Message:</p>{!! $msg['msg_url']['message'] !!} <br/>
                        </div>
                        <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div> -->
                        </div>
                    </div>
                    </div>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection