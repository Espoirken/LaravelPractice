@extends('layouts.app')
@section('content')
@include('inc.messages')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-body">
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary float-right"><i class="fa fa-arrow-left"></i> Back</a>
                    <div class="card-title"><h2>Edit Child</h2></div>
                    <hr>
                    <form action="{{ route('child.update', ['id' => $child->id]) }}" id="child_create" method="POST">
                        {{ csrf_field() }}
                        @can('isClient')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{$child->name}}">
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Date of Birth</label>
                            <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{$child->birthdate}}">
                        </div>
                        <div class="form-group">
                            <label for="status">Level</label>
                            <input type="text" name="level" class="form-control" value="{{$child->level}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="batting">Batting</label>
                            <select class="form-control" name="batting">
                                @php
                                    $battings = array("Left", "Right", "Both");
                                @endphp 

                                @foreach ($battings as $batting)
                                @if ( $child->batting == $batting)
                                    <option value="{{$batting}}" selected>{{$batting}}</option>
                                @else
                                    <option value="{{$batting}}">{{$batting}}</option>
                                @endif  
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="throwing_hand">Throwing Hand</label>
                            <select class="form-control" name="throwing_hand">
                                @php
                                    $throwing_hand = array("Left", "Right", "Both");
                                @endphp 

                                @foreach ($throwing_hand as $throw)
                                @if ( $child->throwing_hand == $throw)
                                    <option value="{{$throw}}" selected>{{$throw}}</option>
                                @else
                                    <option value="{{$throw}}">{{$throw}}</option>
                                @endif  
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="condition">Special or Medical Condition</label>
                            <input type="text" name="condition" class="form-control" value="{{$child->special_medical_condition}}">
                        </div>
                        @else

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{$child->name}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Date of Birth</label>
                            <input type="date" name="birthdate" class="form-control" value="{{$child->birthdate}}" readonly>
                        </div>
                        @endcan
                        @can('isCoach')
                        <div class="form-group">
                            <label for="status">Level</label>
                            <select class="form-control" name="level">
                                @php
                                    $levels = array("Admin", "Coach");
                                @endphp
                                @foreach ($levels as $level)
                                @if ($child->level == $level)
                                <option value="{{$level}}" selected>{{$level}}</option>
                                @else
                                <option value="{{$level}}">{{$level}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        @endcan

                        @can('isCoach')
                        <div class="form-group">
                            <label for="batting">Batting</label>
                            <input type="text" name="batting" class="form-control" value="{{$child->batting}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="throwing_hand">Throwing Hand</label>
                            <input type="text" name="throwing_hand" class="form-control" value="{{$child->throwing_hand}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="condition">Special or Medical Condition</label>
                            <input type="text" name="condition" class="form-control" value="{{$child->special_medical_condition}}" readonly>
                        </div>
                        @endcan

                        @can('isAdmin')
                        <div class="form-group">
                            <label for="status">Level</label>
                            <input type="text" name="level" class="form-control" value="{{$child->level}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="batting">Batting</label>
                            <input type="text" name="batting" class="form-control" value="{{$child->batting}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="throwing_hand">Throwing Hand</label>
                            <input type="text" name="throwing_hand" class="form-control" value="{{$child->throwing_hand}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="condition">Special or Medical Condition</label>
                            <input type="text" name="condition" class="form-control" value="{{$child->special_medical_condition}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="expiration">Expiration</label>
                            <input type="text" name="expiration" class="form-control" value="{{$child->expiration}}">
                        </div>
                        <div class="form-group">
                            <label for="credits">Credits</label>
                            <input type="text" name="credits" class="form-control" value="{{$child->credits}}">
                        </div>
                        @else
                        <div class="form-group">
                            <label for="expiration">Expiration</label>
                            <input type="text" name="expiration" class="form-control" value="{{$child->expiration}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="credits">Credits</label>
                            <input type="text" name="credits" class="form-control" value="{{$child->credits}}" readonly>
                        </div>
                        @endcan
                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-success" type="submit">Update Child</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection