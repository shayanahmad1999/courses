@extends('layouts.main')
@section('content')
@section('section')
<div class="container">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h3>Edit Admin</h3>
                </div>
               </div>
        </div><!-- /.container-fluid -->
    </div>
    <form action="{{url('/backend/admin/updateAdmin' . '/' . $admin->adminId)}}" method="post" enctype="multipart/form-data">
        @csrf
       <div class="row">
        <div class="col-md-6">
            <label for="inputFirstName" class="form-label">First Name</label>
            <input type="text" name="firstname" class="form-control" id="inputFirstName" value="{{$admin->adminFirstName}}">
            <span class="text-danger">
                @error('firstname')
                    {{$message}}
                @enderror
            </span>
        </div>
        <div class="col-md-6">
            <label for="inputLastName" class="form-label">Last Name</label>
            <input type="text" name="lastname" class="form-control" id="inputLastName"  value="{{$admin->adminLastName}}">
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
                <input type="email" name="email" class="form-control" id="inputEmail4"  value="{{$admin->adminEmail}}">
                <span class="text-danger">
                    @error('email')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword4" value="{{$admin->adminPassword}}">
                <span class="text-danger">
                    @error('password')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="inputZip" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" >
                <img width="10%" src="{{asset($admin->adminImage)}}" class="img-circle" alt="#">
            </div>
        </div>
       <div class="row">
        <div class="col-md-12">
            <label for="inputAddress" class="form-label">Address</label>
            <textarea name="address" class="form-control" id="" cols="30" rows="5">{{$admin->adminAddress}}</textarea>
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
