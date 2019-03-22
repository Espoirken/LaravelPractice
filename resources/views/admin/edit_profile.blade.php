@extends('layouts.app')
@section('content')
@include('inc.messages')
<div class="container-fluid">
    <div class="card">
    <div class="card-header">
            <h3 class="card-title">Edit Account Information</h3>
    </div>
        <div class="card-body">
            <form action="{{ route('profile.update',  ['id' => $users->id]) }}" id="user_edit" method="POST">
                {{ csrf_field() }}
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" readonly name="username" value="{{$users->username}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input id="password" type="password" name="password" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="first_name" value="{{$users->first_name}}">
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="middle_name" value="{{$users->middle_name}}">
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="last_name" value="{{$users->last_name}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" value="{{$users->email}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Birthdate</label>
                <div class="col-sm-10">
                    <input type="text" id="birthdate" class="form-control" name="birthdate" value="{{$birthdate}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Landline</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="landline" value="{{$users->landline}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Mobile</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="mobile" value="{{$users->mobile}}">
                </div>
            </div>
            @can('isClient')
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Manila Polo Club ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="mobile" value="{{$users->polo_club_id}}">
                </div>
            </div>
            @endcan
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection