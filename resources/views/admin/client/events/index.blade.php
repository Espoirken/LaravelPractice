@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row pb-5">
                <div class="col-sm"><h2 class="card-title">Event Management</h2></div>
                <div class="col-sm">
                    <form class="form-inline" action="{{ route('event.search')}}" method="POST">
                        <div class="form-group">
                            @csrf
                            <input type="text" name="search" class="form-control mx-sm-3" style="" placeholder="Search an event...">
                            <input type="submit" class="btn btn-primary" class="form-control" value="Search">
                        </div>
                    </form>
                </div>
                @can('isAdmin')
                <div class="col-sm"><a href="{{ route('event.create')}}"  class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i> Create a New Event</a></div>
                @endcan
            </div>
            <table class="table">
                
                <thead>
                    <tr>
                        <th>TITLE</th>
                        <th>DETAILS</th>
                        <th>START DATE</th>
                        <th>END DATE</th>
                        <th>STATUS</th>
                        <th>ATTEND</th>
                        @can('isAdmin')
                        <th>EDIT</th>
                        <th>CANCEL</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @if (count($events) > 0)
                    @foreach ($events as $event)
                    <tr>
                        <td>{{$event->title}}</td>
                        <td>{{$event->detail}}</td>
                        <td>{{$event->created_at->timezone('Asia/Manila')->format('F d, Y - D  h:i:s A')}}</td>
                        <td>{{$event->ended_at->timezone('Asia/Manila')->format('F d, Y - D  h:i:s A')}}</td>
                        @if ($event->status == 'Cancelled')
                        <td><label class="form-control-plaintext badge badge-danger">Cancelled</label> </td>
                        @elseif($event->ended_at > $now)
                        <td><label class="form-control-plaintext badge badge-success">Ongoing</label> </td>
                        @else
                        <td><label class="form-control-plaintext badge badge-danger ">Ended</label> </td>
                        @endif
                        @can('isClient')
                        @if ($event->ended_at > $now)
                        <td><a class="btn btn-sm btn-secondary" href="{{ route('event.attend', ['id' => $event->id ]) }}"><i class="fa fa-plus"></i> Attend</a></td>
                        @else
                        <td><a class="btn btn-sm btn-secondary" href="{{ route('event.attendees', ['id' => $event->id ]) }}"><i class="fa fa-search"></i> Attendees</a></td>
                        @endif
                        @else
                        <td><a class="btn btn-sm btn-secondary" href="{{ route('event.attendees', ['id' => $event->id ]) }}"><i class="fa fa-search"></i> Attendees</a></td>
                        @endcan
                        @can('isAdmin')
                        <td><a class="btn btn-sm btn-primary" href="{{ route('event.edit', ['id' => $event->id ])}}"><i class="fa fa-edit"></i> Edit</a></td>
                        @if ($event->status == 'Cancelled' || $event->ended_at < $now)
                        <td></td>
                        @else
                        <td><a class="btn btn-sm btn-danger" href="{{ route('event.delete', ['id' => $event->id])}}" onclick="return confirm('Are you sure?')"><i class="fa fa-ban" aria-hidden="true"></i> Cancel</a></td>
                        @endif
                        @endcan
                    </tr>
                    @endforeach
                    @else
                        <tr>
                            <th colspan="10" class="text-center">No events found</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center" >{{$events->links()}}</div> 
    </div>
</div>
@endsection