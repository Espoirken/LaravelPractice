@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row pb-5">
                <div class="col-sm"><h2 class="card-title">List of Admins</h2></div>
                <div class="col-sm">
                    <form class="form-inline" action="{{ route('admin.search')}}" method="POST">
                        <div class="form-group">
                            @csrf
                            <input type="text" value="{{ $q_search ?? '' }}" name="search" class="form-control mx-sm-3" style="" placeholder="Search an admin...">
                            <input type="submit" class="btn btn-primary" class="form-control" value="Search">
                        </div>
                    </form>
                </div>
                <div class="col-sm"><a href="{{ route('admin.create')}}"  class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i> Create a New Admin</a></div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>USERNAME</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>ROLE</th>
                        <th>STATUS</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($admins) > 0)
                    @foreach ($admins as $admin)
                    <tr>
                        <td>{{$admin->username}}</td>
                        <td>{{$admin->first_name}} {{$admin->middle_name}} {{$admin->last_name}}</td>
                        <td>{{$admin->email}}</td>
                        <td>{{$admin->roles}}</td>
                        <td>{{$admin->status}}</td>
                        <td><a class="btn btn-sm btn-primary" href="{{ route('admin.edit', ['id' => $admin->id ])}}"><i class="fa fa-edit"></i> Edit</a></td>
                        <td><a class="btn btn-sm btn-danger" href="{{ route('admin.delete', ['id' => $admin->id])}}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" aria-hidden="true"></i> Trash</a></td>
                    </tr>
                    @endforeach
                    @else
                        <tr>
                            <th colspan="10" class="text-center">No admin found</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center" >{{$admins->links()}}</div> 
    </div>
</div>
@endsection