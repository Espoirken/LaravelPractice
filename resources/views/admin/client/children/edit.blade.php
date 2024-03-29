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
                            <label for="nickname">Nickname</label>
                            <input type="text" name="nickname" class="form-control" value="{{$child->nickname}}">
                        </div>
                        <div class="form-group">
                            <label for="batting">Gender</label>
                            <select class="form-control" name="gender">
                                <option value="{{$child->gender}}" hidden>{{$child->gender}}</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="batting">Sport</label>
                            <select class="form-control" name="sport">
                                <option value="{{$child->sport}}" hidden>{{$child->sport}}</option>
                                <option value="Baseball">Baseball</option>
                                <option value="Softball">Softball</option>
                            </select>
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
                        <div class="form-group">
                            <label for="throwing_hand">Uniform Size</label>
                            <select class="form-control" name="uniform_size">
                                @php
                                    $uniform_size = array("Small", "Medium", "Large", "Extra Large");
                                @endphp 

                                @foreach ($uniform_size as $size)
                                    @php
                                        $selected = "";
                                    @endphp 
                                    @if ( $child->uniform_size == $size)
                                         @php $selected = "selected"; @endphp 
                                    @endif  
                                    <option value="{{$size}}" {{$selected}}>{{$size}}</option>
                                @endforeach
                            </select>
                        </div>
                        @else

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{$child->name}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Nickname</label>
                            <input type="text" name="nickname" class="form-control" value="{{$child->nickname}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="batting">Gender</label>
                            <input type="text" name="gender" class="form-control" value="{{$child->gender}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="batting">Sport</label>
                            <input type="text" name="sport" class="form-control" value="{{$child->sport}}" readonly>
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
                                    $levels = array("1", "2", "3");
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
                        <div class="form-group">
                            <label for="condition">Uniform Size</label>
                            <input type="text" name="uniform_size" class="form-control" value="{{$child->uniform_size}}" readonly>
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
                            <label for="condition">Uniform Size</label>
                            <input type="text" name="uniform_size" class="form-control" value="{{$child->uniform_size}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="expiration">Credits Expiration</label>
                            <input type="text" name="expiration" id="expiration" class="form-control" value="{{$child->expiration}}">
                        </div>
                        <div class="form-group">
                            <label for="credits">Credits</label>
                            <input type="text" name="credits" class="form-control" value="{{$child->credits}}">
                        </div>
                        @else
                        <div class="form-group">
                            <label for="expiration">Credits Expiration</label>
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