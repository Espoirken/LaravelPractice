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
                <label for="Title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$event->title}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="Detail" class="col-sm-2 col-form-label">Detail</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$event->detail}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="Status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$event->status}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="EndDate" class="col-sm-2 col-form-label">End Date</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$event->ended_at}}">
                    {{-- <label class="form-control-plaintext">{{$event->ended_at}}  <span class="badge badge-danger">(This event has ended.)</span></label> --}}
                </div>
            </div>
            <hr>
            <h3>Attendees</h3> 
            <h5><label class="badge badge-default">Note: You can't join or cancel once the event registration has ended. </label></h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ATTEND</th>
                            <th>NAME</th>
                            <th>CREDITS</th>
                            <th>EXPIRATION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($children) > 0)
                        @foreach ($children as $child)
                        <tr>
                            <td>
                                @if ($event->children()->where('child_id', $child->id)->get()->first() == NULL)
                                <form action="{{ route('event.join', ['event_id' => $event->id, 'child_id' => $child->id ]) }}" method="POST">
                                    @csrf
                                    <input type="text" hidden name="attend" value="Joined">
                                    <input type="submit" class="btn btn-sm btn-success" class="form-control" value="Join">
                                </form>
                                @elseif ($event->children()->where('child_id', $child->id)->get()->first()->pivot->attend == 'Joined')
                                <form action="{{ route('event.cancel', ['event_id' => $event->id, 'child_id' => $child->id ]) }}" method="POST">
                                    @csrf
                                    <input type="text" hidden name="attend" value="Cancelled">
                                    <input type="submit" class="btn btn-sm btn-default" class="form-control" value="Cancel">
                                </form>
                                @else
                                <form action="{{ route('event.join', ['event_id' => $event->id, 'child_id' => $child->id ]) }}" method="POST">
                                    @csrf
                                    <input type="text" hidden name="attend" value="Joined">
                                    <input type="submit" class="btn btn-sm btn-success" class="form-control" value="Join">
                                </form>
                                @endif
                            </td>
                            <td>{{$child->name}}</td>
                            <td>{{$child->credits}}</td>
                            <td>{{$child->expiration}}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <th colspan="10" class="text-center">No children found</th>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection