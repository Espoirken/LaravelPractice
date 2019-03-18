<div>
    @if ($title == $updated_title)
    <h3>Title: </h3>{{$title}}
    @else
    <h3>Title: </h3>
    <p><strong>{{$title}}</strong> has been changed to <strong>"{{$updated_title}}"</strong></p>
    @endif

    @if ($detail == $updated_detail)
    <h3>Details</h3>
    <p>{{$detail}}</p>
    @else
    <h3>Details</h3>
    <p><strong>{{$detail}}</strong> has been changed to <br>
    <strong>"{{$updated_detail}}"</strong></p>
    @endif

    @if ($joinees == $updated_joinees)
    <h3>Allowable Joinees</h3>
      @foreach ($joinees as $child)
        <p>{{$child->name}}</p>
      @endforeach
    @elseif($joinees == NULL)
    <h3>Allowable Joinees</h3>
    <p>"Everyone" has been changed to </p>
    @foreach ($updated_joinees as $updated_child)
      @php
        $list[] = $updated_child->name;
      @endphp
    @endforeach
    {{implode(', ' , $list)}}
    @elseif($updated_joinees == NULL)
    <h3>Allowable Joinees</h3>
    @foreach ($updated_joinees as $updated_child)
      @php
        $list[] = $updated_child->name;
      @endphp
    @endforeach
    {{implode(', ' , $list)}}
    <p>has been changed to "Everyone"</p>
    @else
    <h3>Allowable Joinees</h3>
    @foreach ($joinees as $joinee)
      @php
        $updated_list[] = $joinee->name;
      @endphp
    @endforeach
    "{{implode(', ' , $updated_list)}}"
    <p> has been changed to </p>
    @foreach ($updated_joinees as $updated_children)
      @php
        $lists[] = $updated_children->name;
      @endphp
    @endforeach
    "{{implode(', ' , $lists)}}"
    @endif

    @if ($ended_at == $updated_ended_at)
    <h3>End Date</h3>
    <p><strong>{{\Carbon\Carbon::parse($ended_at)->format('F d, Y - D  h:i:s A')}}</strong></p>
    @else
    <h3>End Date</h3>
      <p><strong>{{\Carbon\Carbon::parse($ended_at)->format('F d, Y - D  h:i:s A')}}</strong> has been changed to <strong>"{{\Carbon\Carbon::parse($updated_ended_at)->format('F d, Y - D  h:i:s A')}}"</strong></p>  
    @endif
    
</div>