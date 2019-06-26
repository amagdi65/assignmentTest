@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <a href="/edit" class="btn btn-success">Edit Profile</a>
                    </div>
                    <img src="storage/{{$user->image}}" 
                    class="img-thumbnail rounded-circle mx-auto d-block" 
                    alt="profile image" 
                    style="width: 150px; height: 150px; border-radius: 50% ; ">
                    <div class="text-center">
                        <h2 style="font-family:arial">{{$user->name}}</h2>
                    </div>
                    <hr>

                    <h3>Email:  </h3>
                    <p class="lead">{{$user->email}}</p>

                   



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
