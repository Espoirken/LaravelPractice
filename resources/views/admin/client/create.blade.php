@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-body">
                    {{-- <a href="{{ route('client')}}" class="btn btn-sm btn-primary float-right"><i class="fa fa-search"></i> Show all books</a> --}}
                    <div class="card-title"><h2>Create a new Child</h2></div>
                    <hr>
                    <form action="{{ route('client.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Date of Birth</label>
                            <input type="text" name="birthdate" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="status">Level</label>
                            <select class="form-control" name="level">
                                <option value="Admin">Admin</option>
                                <option value="Coach">Coach</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="batting">Batting</label>
                            <input type="text" name="batting" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="throwing_hand">Throwing Hand</label>
                            <input type="text" name="throwing_hand" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="condition">Special or Medical Condition</label>
                            <input type="text" name="condition" class="form-control">
                        </div>
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