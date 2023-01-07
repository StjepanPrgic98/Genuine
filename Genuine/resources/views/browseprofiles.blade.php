<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@component('home')
@foreach ($users as $user)
<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{$user->name}}</h5>
      <p class="card-text"></p>
      <a href="/profiles/{{$user->id}}" class="btn btn-primary">View profile</a>
    </div>
  </div>
@endforeach


    

@endcomponent

