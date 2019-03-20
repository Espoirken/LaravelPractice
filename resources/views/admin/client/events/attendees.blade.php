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
                <label for="staticEmail" class="col-sm-2 col-form-label">Allowed Joinees</label>
                <div class="col-sm-10">
                    @if ($joinee != NULL)
                        @foreach ($joinee as $list)
                            <label class="form-control-plaintext">{{$list->name}}</label>
                        @endforeach
                    @else
                        <label class="form-control-plaintext">Everyone</label>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Start Date</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$event->created_at->timezone('Asia/Manila')->format('F d, Y - D  h:i:s A')}}">
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
                    @if ($event->status == 'Cancelled')
                        {{ $event->status }}
                    @elseif ($event->ended_at < $now)
                        Ended
                    @else
                        Active
                    @endif
                </div>
            </div>
            <hr>
            <h3>Attendees</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>EVENTS ATTENDED</th>
                            <th>LEVEL</th>
                            <th>AGE</th>
                            <th>CREDITS</th>
                            <th>CREDITS EXPIRATION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($children) > 0)
                        @foreach ($children as $child)
                        <tr>
                            @if ($child->user_id == $user->id)
                            @if ($child->nickname != NULL)
                            <td><a href="{{ route('child.edit', ['id' => $child->id ])}}">{{$child->nickname}}</a></td>
                            @else
                            <td><a href="{{ route('child.edit', ['id' => $child->id ])}}">{{$child->name}}</a></td>
                            @endif
                            @else
                            @if(Gate::check('isAdmin') || Gate::check('isCoach'))
                            @if ($child->nickname != NULL)
                            <td><a href="{{ route('child.edit', ['id' => $child->id ])}}">{{$child->nickname}}</a></td>
                            @else
                            <td><a href="{{ route('child.edit', ['id' => $child->id ])}}">{{$child->name}}</a></td>
                            @endif
                            @else
                            <td>{{$child->name}}</td>
                            @endif
                            @endif
                            <td><a class="btn btn-sm btn-light" href="{{ route('child.attended', ['id' => $child->id ])}}"><i class="fa fa-search"></i> Show</a></td>
                            <td>{{$child->level}}</td>
                            <td>{{$datetoday->diffInYears(\Carbon\Carbon::parse($child->birthdate))}}</td>
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