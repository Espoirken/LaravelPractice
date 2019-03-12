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
                    <input type="text" readonly class="form-control-plaintext" value="{{$event->status}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$event->detail}}">
                </div>
            </div>
            <hr>
            <h3>Attendees</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th>CREDITS</th>
                            <th>EXPIRATION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($children as $child)
                        <tr>
                            <td>{{$child->name}}</td>
                            <td>{{$child->credits}}</td>
                            <td>{{$child->expiration}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection