<div>
    <h1>Hi, a new event was created!</h1>
    <p>Title: <a href="{{ url('/admin/event/attend/'. $id ) }}">{{$title}}</a></p>
    <p>Please register your child before {{ $registration_end_date }}.</p>
    <p>Allowed joinees: 
        @if ($joinees != NULL)
            @foreach ($joinees as $child)
                <p>{{$child->name}}</p>
            @endforeach
        @else
            Everyone
        @endif
    </p>
    <p>Log in here: <a href="{{ url('/admin' ) }}">{{ config('app.name', 'Laravel') }}</a></p>
</div>
