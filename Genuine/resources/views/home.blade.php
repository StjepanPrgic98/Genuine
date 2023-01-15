@extends('layouts.app')

@section('content')
<div class="background">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center">
                <img src="{{ asset('images/akali3.png') }}" />
            </div>
            <br><br><br><br>
            <div class="card-deck">
                <div class="col lg-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('images/woman1.jfif') }}" alt="Card image cap" />
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 10 mins ago</small>
                        </div>
                    </div>
                </div>
                <div class="col lg-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('images/dude2.jfif') }}" alt="Card image cap"/>
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 5 mins ago</small>
                        </div>
                    </div>
                </div>
                <div class="col lg-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('images/dude1.jfif') }}" alt="Card image cap" />
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.
                            </p>
                            <br><br>
                            <a href="/dude1" class="btn btn-primary btn-lg" role="button">Primary link</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 10 seconds ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
