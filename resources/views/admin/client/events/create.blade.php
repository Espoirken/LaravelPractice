@extends('layouts.app')
@section('content')
@include('inc.messages')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('events')}}" class="btn btn-sm btn-primary float-right"><i class="fa fa-arrow-left"></i> Back</a>
                    <div class="card-title"><h2>Create a new Event</h2></div>
                    <hr>
                    <form action="{{ route('event.store') }}" id="event" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Details</label>
                            <textarea class="form-control" rows="3" name="detail"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="ended_at">End date</label>
                            <input id="expiration" name="ended_at" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-success" type="submit">Add Event</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection