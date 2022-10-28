@extends('layouts.main')
@section('content')
@section('section')
<div class="container">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    @if (Session::get('User'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{Session::get('User')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @else
                    <h3>Edit User</h3>
                    @endif
                </div>
                <div class="col-md-6">
                    <a href="{{route('backend.user.viewUser')}}"><button class="btn btn-info"><i class="fas fa-eye">View</i></button></a>
                </div>
               </div>
        </div><!-- /.container-fluid -->
    </div>
    <form action="{{$url}}" method="post" enctype="multipart/form-data">
        @csrf
       <div class="row">
        <div class="col-md-12">
            <label for="inputFirstName" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="inputFirstName" value="{{$EditUser->name}}">
            <span class="text-danger">
                @error('name')
                    {{$message}}
                @enderror
            </span>
        </div>
       </div>
        <div class="row">
            <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail4"  value="{{$EditUser->email}}">
                <span class="text-danger">
                    @error('email')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="col-md-12">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="myInput" value="{{$EditUser->password}}">
                <span class="text-danger">
                    @error('password')
                        {{$message}}
                    @enderror
                </span>
                <input type="checkbox" onclick="myFunction()" name="" id="">
                <span>Show Password</span>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
@endsection
<script>
       function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
</script>