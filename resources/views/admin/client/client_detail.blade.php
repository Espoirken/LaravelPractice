@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
    <div class="card-header">
        <h3 class="card-title">Account Information of {{$client->username}}</h3>
    </div>
    <div class="card-body">
            <a href="{{ route('clients')}}" class="btn btn-sm btn-primary float-right"><i class="fa fa-arrow-left"></i> Back</a>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$client->username}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$client->first_name}} {{$client->middle_name}} {{$client->last_name}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$client->email}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Birthdate</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$client->birthdate}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Landline</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$client->landline}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Mobile</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$client->mobile}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Polo Club Member ID</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$client->polo_club_id}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Account Expiration</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$client->expiration->timezone('Asia/Manila')->format('F d, Y')}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{$client->status}}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection