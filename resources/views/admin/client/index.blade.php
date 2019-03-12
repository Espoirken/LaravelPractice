@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-lg-3"><h2 class="card-title">Client Management</h2></div>
            <div class="col-lg-5">
            <form class="form-inline" action="{{ route('client.search')}}" method="POST">
                <div class="form-group">
                    @csrf
                    <input type="text" name="search" class="form-control mx-sm-3" style="width:600px" placeholder="Search a client...">
                    <input type="submit" class="btn btn-primary" class="form-control" value="Search">
                </div>
            </form>
            </div>
            <div class="col-lg-1 offset-lg-3"><a href="{{ route('client.create')}}"  class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i> Create a New Client</a></div>
            </div>
            <table class="table">
                
                <thead>
                    <tr>
                        <th>USERNAME</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>STATUS</th>
                        <th>VIEW</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($clients) > 0)
                    @foreach ($clients as $client)
                    <tr>
                        <td>{{$client->username}}</td>
                        <td>{{$client->first_name}} {{$client->middle_name}} {{$client->last_name}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->status}}</td>
                        <td><a class="btn btn-sm btn-primary" href="{{ route('client.show', ['id' => $client->id ])}}"><i class="fa fa-search"></i> Show Children</a></td>
                        <td><a class="btn btn-sm btn-primary" href="{{ route('client.edit', ['id' => $client->id ])}}"><i class="fa fa-edit"></i> Edit</a></td>
                        <td><a class="btn btn-sm btn-danger" href="{{ route('client.delete', ['id' => $client->id])}}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" aria-hidden="true"></i> Trash</a></td>
                    </tr>
                    @endforeach
                    @else
                        <tr>
                            <th colspan="10" class="text-center">No clients found</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center" >{{$clients->links()}}</div> 
    </div>
</div>
@endsection