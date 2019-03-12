@extends('layouts.app')
@section('content')
@include('inc.messages')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-body">
                    {{-- <a href="{{ route('client')}}" class="btn btn-sm btn-primary float-right"><i class="fa fa-search"></i> Show all books</a> --}}
                    <div class="card-title"><h2>Create a new Child</h2></div>
                    <hr>
                    <form action="{{ route('child.store') }}" id="child_create" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Date of Birth</label>
                            <input type="date" name="birthdate" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select class="form-control" name="level">
                                <option value="" hidden></option>
                                <option value="Admin">Admin</option>
                                <option value="Coach">Coach</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="batting">Batting</label>
                            <select class="form-control" name="batting">
                                <option value="" hidden></option>
                                <option value="Left">Left</option>
                                <option value="Right">Right</option>
                                <option value="Both">Both</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="throwing_hand">Throwing Hand</label>
                            <select class="form-control" name="throwing_hand">
                                <option value="" hidden></option>
                                <option value="Left">Left</option>
                                <option value="Right">Right</option>
                                <option value="Both">Both</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="condition">Special or Medical Condition</label>
                            <input type="text" name="condition" class="form-control">
                        </div>
                        @can('isAdmin')
                        <div class="form-group">
                            <label for="expiration">Expiration</label>
                            <input type="datetime-local" name="expiration" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="credits">Credits</label>
                            <input type="text" name="credits" class="form-control">
                        </div>
                        @endcan
                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-success" type="submit">Add Child</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection