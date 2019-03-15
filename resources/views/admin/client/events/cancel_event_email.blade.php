<div>
    <h1>The {{$title}} Event has been cancelled.</h1>
    <p>Your child's credits has been returned!</p>
        @foreach ($name as $index => $child)
            {{$child}}'s credits now is: {{$credits[$index]+1}} <br>
        @endforeach
</div>