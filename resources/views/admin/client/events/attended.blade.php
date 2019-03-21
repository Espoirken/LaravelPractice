@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
        <div>
            <a href="{{ route('clients')}}" class="btn btn-sm btn-primary float-right">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>
            <div class="row">
            @if ($child->nickname != NULL)
            <div class="col-lg-8"><h2 class="card-title">List of Events Attended by {{$child->nickname}}</h2></div>
            @else                
            <div class="col-lg-8"><h2 class="card-title">List of Events Attended by {{$child->name}}</h2></div>
            @endif
            @can('isAdmin')
            @endcan
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>EVENT TITLE</th>
                        <th>DETAILS</th>
                        <th>START DATE</th>
                        <th>END DATE</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($child->events) > 0)
                    @foreach ($child->events as $child)
                    <tr>
                        <td>{{$child->title}}</td>
                        <td>{{$child->detail}}</td>
                        <td>{{$child->created_at->timezone('Asia/Manila')->format('F d, Y - D  h:i:s A')}}</td>
                        <td>{{$child->ended_at->timezone('Asia/Manila')->format('F d, Y - D  h:i:s A')}}</td>
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