@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
    <div class="card-header">
            <h3 class="card-title">View Account Information</h3>
    </div>
        <div class="card-body">
            <div class="row">
            <div class="col-lg-8">
            {{-- <form class="form-inline" action="{{ route('search.client')}}" method="POST">
                <div class="form-group">
                    @csrf
                    <input type="text" name="search" class="form-control mx-sm-3" style="width:600px" placeholder="Search a book...">
                    <input type="submit" class="btn btn-primary" class="form-control" value="Search">
                </div>
            </form> --}}
            </div>
            <div class="col-lg-1 offset-lg-3"><a href="{{ route('client.create')}}"  class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i> Create New Client</a></div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$users->username}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$users->first_name}} {{$users->middle_name}} {{$users->last_name}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Expiration</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$users->expiration->timezone('Asia/Singapore')->format('F d, Y')}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$users->email}}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection