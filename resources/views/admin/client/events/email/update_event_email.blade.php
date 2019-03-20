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

    @if ($ended_at == $updated_ended_at)
    <h3>End Date</h3>
    <p><strong>{{\Carbon\Carbon::parse($ended_at)->format('F d, Y - D  h:i:s A')}}</strong></p>
    @else
    <h3>Registration end date</h3>
      <p><strong>{{\Carbon\Carbon::parse($ended_at)->format('F d, Y - D  h:i:s A')}}</strong> has been changed to <strong>"{{\Carbon\Carbon::parse($updated_ended_at)->format('F d, Y - D  h:i:s A')}}"</strong></p>  
    @endif
    
</div>