@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>Edit Profile</h3></div>
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                        @endforeach
                    @endif
                    <img src="storage/{{$user->image}}" 
                    class="img-thumbnail rounded-circle mx-auto d-block" 
                    alt="profile image" 
                    style="width: 150px; height: 150px; border-radius: 50% ; ">
                   <form action="/update" enctype="multipart/form-data" method="POST">
                   @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" required name="name" class="form-control" value="{{$user->name}}" >
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" required name="email" class="form-control" value="{{$user->email}}" >
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter New Password" value="" >
                            
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" name="image" class="form-control-file" id="image" >
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-success btn-lg" >
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection