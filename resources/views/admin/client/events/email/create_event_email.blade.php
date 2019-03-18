<div>
    <h1>Hi, a new event was created!</h1>
    <p>Title: <a href="{{ url('/admin/event/attend/'. $id ) }}">{{$title}}</a></p>
    <p>Allowable Joinees: 
        @if ($joinees != NULL)
            @foreach ($joinees as $child)
                <p>{{$child->name}}</p>
            @endforeach
        @else
            Everyone
        @endif
    </p>
</div>
