@extends('layouts.main')
@section('content')
@section('section')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <div class="row">
                        <div class="col-md-5">
                            @if (Session::get('course'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ Session::get('delete') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                @else
                                Course
                            @endif
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('backend.courses.viewcourse')}}"><button class="btn btn-info"><i class="fas fa-eye"> View</i></button></a>
                        </div>
                    </div>
                </div>
                    <div class="card-body">
                        <form action="{{route('backend.courses.storecourse')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Course Name" value="{{old('name')}}">
                                    @error('name')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Credit Hours</label>
                                    <input type="text" name="credithr" class="form-control" placeholder="Enter Course Credit Hours" value="{{old('credithr')}}">
                                    @error('credithr')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" style="margin-top:10px;">Description</label>
                                    <textarea name="description" class="form-control" placeholder="Enter Course Description" col="30" rows="5">{{old('description')}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" style="margin-top:10px;">Image</label>
                                    <input type="file" name="courseimage" class="form-control">
                                    @error('courseimage')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" style="margin-top:20px;">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endsection
