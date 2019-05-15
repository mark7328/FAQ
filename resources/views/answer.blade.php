@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Answer
                        <a class="btn btn-success float-right"
                           href="{{ route('reply.create', ['answer_id'=> $answer->id])}}">

                            Reply
                        </a>

                    </div>
                    <div class="card-body">
                        {{$answer->body}}
                    </div>
                    <div class="card-footer">

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container pt-2">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    @forelse($answer->reply as $reply)
                        <div class="card-body">
                            <div class="card-body">{{$reply->body}}</div>
                            <div class="card-footer">

                            </div>
                        </div>
                    @empty
                        <div class="card">

                            <div class="card-body"> Be the first one to reply!</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection