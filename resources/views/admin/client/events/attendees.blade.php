@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
    <div class="card-header">
        <h3 class="card-title">View Event</h3>
    </div>
        <div class="card-body">
            <div class="row">
            <div class="col-lg-8">
            </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$event->title}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Detail</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$event->detail}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">End Date</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$event->ended_at->timezone('Asia/Manila')->format('F d, Y - D  h:i:s A')}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    @if ($event->ended_at < $now)
                    Ended
                    @else
                    <input type="text" readonly class="form-control-plaintext" value="{{$event->status}}">
                    @endif
                </div>
            </div>
            <hr>
            <h3>Attendees</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>LEVEL</th>
                            <th>CREDITS</th>
                            <th>EXPIRATION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($children) > 0)
                        @foreach ($children as $child)
                        <tr>
                            <td><a href="{{ route('child.edit', ['id' => $child->id ])}}">{{$child->name}}</a></td>
                            <td>{{$child->level}}</td>
                            <td>{{$child->credits}}</td>
                            <td>{{\Carbon\Carbon::parse($child->expiration)->format('F d, Y - D  h:i:s A')}}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <th colspan="10" class="text-center">No attendees found</th>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection