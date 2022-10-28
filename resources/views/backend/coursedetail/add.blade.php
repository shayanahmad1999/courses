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
                                <div class="alert alert-success">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{Session::get('course')}}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                </div>
                                @else
                                Course Detail
                            @endif
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('backend.coursedetail.view')}}"><button class="btn btn-info"><i class="fas fa-eye"> View</i></button></a>
                        </div>
                    </div>
                </div>
                    <div class="card-body">
                        <form action="{{route('backend.coursedetail.addcoursedetail')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Lesson</label>
                                    <input type="text" name="lesson" class="form-control" placeholder="Enter Course Name" value="{{old('lesson')}}">
                                    @error('lesson')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Topic</label>
                                    <input type="text" name="topic" class="form-control" placeholder="Enter Course Credit Hours" value="{{old('topic')}}">
                                    @error('topic')
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
                            <div class="row mt-3">                               
                                <div class="col-md-6">
                                    <label for="">Video</label>
                                    <input type="text" name="video" class="form-control" placeholder="Enter Video URL" value="{{old('video')}}">
                                    @error('video')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">File</label>
                                    <input type="file" name="file" class="form-control">
                                    @error('file')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Duration</label>
                                    <input type="time" name="duration" class="form-control" placeholder="Enter Course Name" value="{{old('duration')}}">
                                    @error('duration')
                                        <div class="text text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                              
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" style="margin-top:20px;">Submit</button>
                                    <input type="hidden" name="courseid" value="{{$course->courseId}}">
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
