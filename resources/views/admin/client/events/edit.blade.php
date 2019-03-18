@extends('layouts.app')
@section('content')
@include('inc.messages')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('events')}}" class="btn btn-sm btn-primary float-right"><i class="fa fa-arrow-left"></i> Back</a>
                    <div class="card-title"><h2>Edit Event</h2></div>
                    <hr>
                    <form action="{{ route('event.update', ['id' => $event->id]) }}" id="event" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="{{$event->title}}">
                        </div>
                        <div class="form-group">
                            <label for="detail">Detail</label>
                            <textarea class="form-control" rows="3" name="detail">{{$event->detail}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="joinees">Allowed Joinees</label>
                            <select class="js-example-basic-multiple form-control" id="joinee" name="joinees[]" multiple="multiple" placeholder="test">
                                @if ($joinees != NULL)
                                @foreach ($joinees as $joinee)
                                    <option value="{{$joinee->id}}" selected>{{$joinee->name}}</option>
                                @endforeach
                                @foreach ($all as $child)
                                    <option value="{{$child->id}}">{{$child->name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ended_at">End Date</label>
                            <input id="expiration" name="ended_at" class="form-control" value="{{$event->ended_at}}" required>
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-success" type="submit">Update Event</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection