@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-lg-8"><h2 class="card-title">Children of {{$users->first_name}} {{$users->middle_name}} {{$users->last_name}}</h2></div>
            {{-- <div class="col-lg-5">
            <form class="form-inline" action="{{ route('child.search')}}" method="POST">
                <div class="form-group">
                    @csrf
                    <input type="text" name="search" class="form-control mx-sm-3" style="width:600px" placeholder="Search a child...">
                    <input type="submit" class="btn btn-primary" class="form-control" value="Search">
                </div>
            </form>
            </div> --}}
            <div class="col-lg-1 offset-lg-3"><a href="{{ route('clients')}}"  class="btn btn-sm btn-primary float-right"><i class="fa fa-arrow-left"></i> Back</a></div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>CREDITS</th>
                        <th></th>
                        <th>CREDITS EXPIRATION </th>
                        <th>DATE OF BIRTH</th>
                        <th>LEVEL</th>
                        <th>BATTING</th>
                        <th>THROWING HAND</th>
                        <th>SPECIAL OR MEDICAL CONDITION</th>
                        <th>EDIT</th>
                        @can('isClient')
                        <th>DELETE</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @if (count($users->children)> 0)
                    @foreach ($users->children as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->credits}}<td>
                        <td>{{\Carbon\Carbon::parse($user->expiration)->format('F d, Y - D  h:i:s A')}}</td>
                        <td>{{\Carbon\Carbon::parse($user->birthdate)->format('F d, Y')}}</td>
                        <td>{{$user->level}}</td>
                        <td>{{$user->batting}}</td>
                        <td>{{$user->throwing_hand}}</td>
                        <td>{{$user->special_medical_condition}}</td>
                        <td><a class="btn btn-sm btn-primary" href="{{ route('child.edit', ['id' => $user->id ])}}"><i class="fa fa-edit"></i> Edit</a></td>
                        @can('isClient')
                        <td><a class="btn btn-sm btn-danger" href="{{ route('child.delete', ['id' => $user->id])}}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" aria-hidden="true"></i> Trash</a></td>
                        @endcan
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
@endsection