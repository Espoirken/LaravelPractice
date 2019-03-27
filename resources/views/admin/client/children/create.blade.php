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
                            <label for="nickname">Nickname</label>
                            <input type="text" name="nickname" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Date of Birth</label>
                            <input type="date" id="birthdate" name="birthdate" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="batting">Gender</label>
                            <select class="form-control" name="gender">
                                <option value="" hidden></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="batting">Sport</label>
                            <select class="form-control" name="sport">
                                <option value="" hidden></option>
                                <option value="Baseball">Baseball</option>
                                <option value="Softball">Softball</option>
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
                        <div class="form-group">
                            <label for="throwing_hand">Uniform Size</label>
                            <select class="form-control" name="uniform_size">
                                <option value="" hidden></option>
                                <option value="Small">Small</option>
                                <option value="Medium">Medium</option>
                                <option value="Large">Large</option>
                            </select>
                        </div>
                        @include('admin.client.children.terms')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection