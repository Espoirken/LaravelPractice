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
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{$child->name}}"
                                @if(Gate::denies('isClient'))
                                    readonly
                                @endif
                            >
                        </div>
                        <div class="form-group">
                            <label for="nickname">Nickname</label>
                            <input type="text" name="nickname" class="form-control" value="{{$child->nickname}}"
                                @if(Gate::denies('isClient'))
                                    readonly
                                @endif
                            >
                        </div>
                        <div class="form-group">
                            <label for="batting">Gender</label>
                            <select class="form-control" name="gender"
                                @if(Gate::denies('isClient'))
                                    disabled
                                @endif
                            >
                                <option value="{{$child->gender}}" hidden>{{$child->gender}}</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="batting">Sport</label>
                            <select class="form-control" name="sport"
                                @if(Gate::denies('isClient'))
                                    disabled
                                @endif
                            >
                                <option value="{{$child->sport}}" hidden>{{$child->sport}}</option>
                                <option value="Baseball">Baseball</option>
                                <option value="Softball">Softball</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Date of Birth</label>
                        <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{$child->birthdate}}"
                            @if(Gate::denies('isClient'))
                                readonly
                            @endif
                        >
                        </div>
                        <div class="form-group">
                            <label for="status">Level</label>
                            <select class="form-control" name="level"
                                @if(Gate::denies('isCoach'))
                                    disabled
                                @endif
                            >
                                @php
                                    $levels = array("1", "2", "3");
                                @endphp
                                @foreach ($levels as $level)
                                <option value="{{$level}}" {{($child->level == $level) ? 'selected' : ''}} >{{$level}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="batting">Batting</label>
                            <select class="form-control" name="batting"
                                @if(Gate::denies('isClient'))
                                    disabled
                                @endif
                            >
                                @php
                                    $battings = array("Left", "Right", "Both");
                                @endphp 

                                @foreach ($battings as $batting)
                                <option value="{{$batting}}" {{($child->batting == $batting) ? 'selected' : ''}} >{{$batting}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="throwing_hand">Throwing Hand</label>
                            <select class="form-control" name="throwing_hand"
                                @if(Gate::denies('isClient'))
                                    disabled
                                @endif
                            >
                                @php
                                    $throwing_hand = array("Left", "Right", "Both");
                                @endphp 
                                @foreach ($throwing_hand as $throw)
                                <option value="{{$throw}}" {{($child->throwing_hand == $throw) ? 'selected' : ''}} >{{$throw}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="condition">Special or Medical Condition</label>
                            <input type="text" name="condition" class="form-control" value="{{$child->special_medical_condition}}"
                                @if(Gate::denies('isClient'))
                                    readonly
                                @endif
                            >
                        </div>

                        <div class="form-group">
                            <label for="expiration">Credits Expiration</label>
                            <input type="text" name="expiration"
                                @if(Gate::denies('isAdmin'))
                                    readonly
                                @endif
                                class="form-control" value="{{$child->expiration}}">
                        </div>
                        <div class="form-group">
                            <label for="credits">Credits</label>
                            <input type="text" name="credits" class="form-control" value="{{$child->credits}}"
                                @if(Gate::denies('isAdmin'))
                                  disabled  
                                @endif
                            >
                        </div>
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