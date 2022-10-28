@extends('layouts.main')
@section('content')
@section('section')
<div class="container">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    @if (Session::get('admin'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{Session::get('admin')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @else
                    <h3>Admin</h3>
                    @endif
                </div>
                <div class="col-md-6">
                    <a href="{{route('backend.admin.viewAdmin')}}"><button class="btn btn-info"><i class="fas fa-eye">View</i></button></a>
                </div>
               </div>
        </div><!-- /.container-fluid -->
    </div>
    <form action="{{route('backend.admin.addAdmin')}}" method="post" enctype="multipart/form-data">
        @csrf
       <div class="row">
        <div class="col-md-6">
            <label for="inputFirstName" class="form-label">First Name</label>
            <input type="text" name="firstname" class="form-control" id="inputFirstName" value="{{old('firstname')}}">
            <span class="text-danger">
                @error('firstname')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="col-md-6">
            <label for="inputLastName" class="form-label">Last Name</label>
            <input type="text" name="lastname" class="form-control" id="inputLastName"  value="{{old('lastname')}}">
            <span class="text-danger">
                @error('lastname')
                    {{$message}}
                @enderror
            </span>
        </div>
       </div>
        <div class="row">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail4"  value="{{old('email')}}">
                <span class="text-danger">
                    @error('email')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="myInput">
                <span class="text-danger">
                    @error('password')
                        {{$message}}
                    @enderror
                </span>
                <input type="checkbox" onclick="myFunction()" name="" id="">
                <span>Show Password</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="inputZip" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
        </div>
       <div class="row">
        <div class="col-md-12">
            <label for="inputAddress" class="form-label">Address</label>
            <textarea name="address" class="form-control" id="" cols="30" rows="5">{{old('address')}}</textarea>
        </div>
       </div><br>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
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