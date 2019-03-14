@extends('layouts.app')
@section('content')
@include('inc.messages')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin')}}" class="btn btn-sm btn-primary float-right"><i class="fa fa-arrow-left"></i> Back</a>
                    <div class="card-title"><h2>Edit Admin</h2></div>
                    <hr>
                    <form action="{{ route('admin.update',  ['id' => $admin->id]) }}" id="user_edit" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" value="{{$admin->username}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" value="{{$admin->email}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="first_name">Name</label>
                                <input type="text" class="form-control" placeholder="First name" name="first_name" value="{{$admin->first_name}}">
                            </div>
                            <div class="col">
                                <label for="middle_name">&nbsp;</label>
                                <input type="text" class="form-control" placeholder="Middle name" name="middle_name" value="{{$admin->middle_name}}">
                            </div>
                            <div class="col">
                                <label for="last_name">&nbsp;</label>
                                <input type="text" class="form-control" placeholder="Last name" name="last_name" value="{{$admin->last_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="landline">Landline Number</label>
                            <input type="text" name="landline" class="form-control" value="{{$admin->landline}}">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile Number</label>
                            <input type="text" name="mobile" class="form-control" value="{{$admin->mobile}}"> 
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status">
                                <option value="{{$admin->status}}" hidden>{{$admin->status}}</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-success" type="submit">Update Admin</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection