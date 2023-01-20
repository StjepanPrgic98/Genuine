<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
  rel="stylesheet"
/>





@component('home')
    <div class="background">
        <div class="main-body">
            <br><br>
            @if ($user->sex == null)
            <div class="alert alert-danger text-center" role="alert">
                Profile incomplete!
                </div>
            @endif
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card border">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ asset("storage/$user->image") }}" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{$user->name}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 border">

                        <ul class="list-group list-group-flush">

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                                <a href="{{$user->twitter}}" class="btn btn-primary"><i class="fab fa-twitter"></i></a>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                                <a href="{{$user->instagram}}" class="btn btn-primary"><i class="fab fa-instagram"></i></i></a>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                                <a href="{{$user->facebook}}" class="btn btn-primary"><i class="fab fa-facebook"></i></i></a>
                            </li>

                            @if (Auth::user()->id != $user->id && Auth::user()->isExpert == null)
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">Chat <i class="fab fa-facebook-messenger"></i></h6>
                                <a href="/messages/{{$user->id}}" class="btn btn-primary align-items-center"><i class="fab fa-facebook-messenger"></i></i></a>
                            </li>

                            @endif
                            @if (Auth::user()->id == $user->id && $user->isAdmin == null && $user->isSuperAdmin == null && $user->isExpert == null && $user->submitedForReview == null && $user->sex == "Male")
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Submit for Expert Review</h6>
                                <form method="POST" action="/expertReview/submit">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" value="{{Auth::user()->id}}", name="sender_id">
                                        <a class="btn btn-primary text-white" style="margin-top: 20px"><button type="submit"><i class="far fa-paper-plane"></i></button></a>
                                    </div>
                                </form>

                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">See your reviews</h6>
                                <a href="/expertReview/getReview/{{$user->id}}" class="btn btn-primary"><i class="fas fa-info-circle"></i></a>
                            </li>
                            @else
                                @if(Auth::user()->id == $user->id && Auth::user()->isExpert == null && $user->sex == "Male" && $user->isAdmin == null && $user->isSuperAdmin == null)
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0">Your account is currently on review.</h6>
                                    <h6 class="mb-0">Please wait until an Expert finishes,</h6>
                                    <h6 class="mb-0">and you will be able to read it.</h6>
                                </li>
                                @endif
                        @endif

                    </ul>

                    </div>
                            @if (Auth::user()->isSuperAdmin && Auth::user()->id != $user->id)
                        <div class="card mt-3 border">
                            <ul class="list-group list-group-flush">
                                <h6>Admin Commands</h6>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    @if ($user->isSuperAdmin == null)
                                        @if ($user->isAdmin)
                                        <h6>Remove Admin</h6>
                                        <a href="/removeAdmin/{{$user->id}}" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-down"></i></a>
                                        @else
                                        <h6>Make admin</h6>
                                        <a href="/makeAdmin/{{$user->id}}" class="btn btn-dark"><i class="fas fa-arrow-alt-circle-up"></i></a>
                                        @endif
                                    @endif

                                </li>
                            @if (Auth::user()->id != $user->id && $user->isSuperAdmin == null)
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6>Delete profile</h6>
                                            <a href="/deleteProfile/{{$user->id}}" class="btn btn-danger"><i class="fas fa-minus-circle"></i></a>
                                    </li>
                                @endif
                                </ul>
                        </div>
                            @endif
                            @if (Auth::user()->isAdmin && Auth::user()->id != $user->id && $user->isSuperAdmin == null)
                        <div class="card mt-3 border">
                        <ul class="list-group list-group-flush">
                                <h6>Admin commands</h6>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        @if ($user->isAdmin)
                                        @else
                                        <h6>Delete profile</h6>
                                        <a href="/deleteProfile/{{$user->id}}" class="btn btn-danger"><i class="fas fa-minus-circle"></i></a>
                                        @endif
                                    </li>
                            </ul>
                        </div>
                            @endif

                </div>
                <div class="col-md-8">
                    <div class="card mb-3 border">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->name}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->email}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Current City</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->current_city}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Age</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->age}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Sex</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->sex}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Relationship Status</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->relationship_status}}
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>

                    <section id="about-section" class="pt-5 pb-5">
                        <div class="container wrapabout">
                            <div class="red"></div>
                                    <div class="blockabout">
                                        <div class="blockabout-inner text-center text-sm-start">
                                            <div class="title-big pb-3 mb-3">
                                                <h3>ABOUT ME</h3>
                                                <hr>
                                            </div>
                                            <p class="description-p text-muted pe-0 pe-lg-0">
                                                {{$user->description}}
                                            </p>
                                        </div>
                                        @if (Auth::user()->isExpert && $user->id != Auth::user()->id)

                                                <form method="POST" action="/expertReview/sendReview">
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="hidden" value="{{Auth::user()->id}}", name="sender_id">
                                                        <input type="hidden" value="{{$user->id}}", name="receiver_id">
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="info"></textarea>
                                                        <button type="submit" class="btn">Send</button>
                                                    </div>
                                                </form>
                                        @endif

                                    </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>




@endcomponent




<style>
</style>
