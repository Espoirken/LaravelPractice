@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-lg-2"><h2 class="card-title">Clients</h2></div>
            <div class="col-lg-6">
            {{-- <form class="form-inline" action="{{ route('search.client')}}" method="POST">
                <div class="form-group">
                    @csrf
                    <input type="text" name="search" class="form-control mx-sm-3" style="width:600px" placeholder="Search a book...">
                    <input type="submit" class="btn btn-primary" class="form-control" value="Search">
                </div>
            </form> --}}
            </div>
            <div class="col-lg-1 offset-lg-3"><a href="{{ route('client.create')}}"  class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i> Create New Children</a></div>
            </div>
            <table class="table">
                
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>CREDITS</th>
                        <th>EXPIRATION</th>
                        <th>LEVEL</th>
                        <th>BATTING</th>
                        <th>THROWING HAND</th>
                        <th>SPECIAL OR MEDICAL CONDITIONING</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($children as $child)
                    <tr>
                        <td>{{$child->name}}</td>
                        <td>{{$child->credits}}</td>
                        <td>{{$child->expiration}}</td>
                        <td>{{$child->level}}</td>
                        <td>{{$child->batting}}</td>
                        <td>{{$child->throwing_hand}}</td>
                        <td>{{$child->special_medical_condition}}</td>
                        <td><a class="btn btn-sm btn-primary" href="{{ route('child.edit', ['id' => $child->id ])}}"><i class="fa fa-edit"></i> Edit</a></td>
                        <td><a class="btn btn-sm btn-danger" href="{{ route('child.delete', ['id' => $child->id])}}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" aria-hidden="true"></i> Trash</a></td>
                    </tr>
                    @endforeach
                        {{-- <tr>
                            <th colspan="10" class="text-center">No books found</th>
                        </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection