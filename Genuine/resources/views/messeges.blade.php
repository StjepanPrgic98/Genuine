<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@component('home')
<form method="POST" action="/sendMessege">
    @csrf
    <div class="form-group">
      <label>Messege:</label>
      <input type="hidden" value="{{Auth::user()->id}}", name="sender_id">
      <input type="hidden" value="{{$user->id}}" name="receiver_id">
      <input type="text" class="form-control" name="messege">
    </div>
    <div class="form-group">
      <div>
      <button type="submit" class="btn btn-primary">Send!</button>
      </div>
    </div>
  </form>


  <ul>
    <label> Chat: {{$user->name}}:</label>
    @foreach ($finalResult as $result)
    @if ($result->sender_id == Auth::user()->id && $result->receiver_id == $user->id)
      <li class="list-group-item">{{Auth::user()->name}}: {{$result->messege}}
    @endif
    @if ($result->sender_id == $user->id && $result->receiver_id == Auth::user()->id)
      <li class="list-group-item">{{$user->name}}: {{$result->messege}}
    @endif
    
  </ul>
    
    @endforeach
    
   
  </ul>

  
    


@endcomponent
