@extends('layouts.main')
@section('content')
@section('section')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        @if(Session::get('course'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('course') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @elseif (Session::get('delete'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('delete') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                                @elseif (Session::get('update'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{Session::get('update')}}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                @else
                                Course Detail Record
                            @endif
                    </div>
                    <div class="col-md-5">
                        <form action="" method="">
                            <div class="form-group form-inline">
                                <label for="">Search</label>
                                <input type="search" class="form-control" name="search" id=""
                                    aria-describedby="helpId" placeholder="Search">
                                    <a href="{{route('backend.coursedetail.view')}}"><button type="button" class="btn btn-secondary">Reset</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th-sm">Lesson</th>
                    <th class="th-sm">Topic</th>
                    <th class="th-sm">Description</th>
                    <th class="th-sm">Duration</th>
                    <th class="th-sm">Video</th>
                    <th class="th-sm">File</th>
                    <th class="th-sm">Course</th>
                    <th class="th-sm">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courseDetail as $value)
                    <tr>
                        <td>{{$value->cdLesson}}</td>
                        <td>{{$value->cdTopic}}</td>
                        <td>{{$value->cdDesc}}</td>
                        <td>{{$value->cdDuration}}</td>
                        <td><a href="{{asset($value->cdVideo)}}" target="_blank">View</a></td>
                        <td><iframe src="{{asset($value->cdFile)}}"></iframe></td>
                        <td>{{$value->courseName}}</td>
                        <td>
                            <a href="{{url('backend/coursedetail/deletecoursedetail')}}/{{$value->cdId}}"><button class="btn btn-danger"><i
                                        class="fas fa-trash"></i></button></a>
                            <a href="{{url('backend/coursedetail/editcoursedetail')}}/{{$value->cdId}}"><button class="btn btn-primary"><i
                                        class="fas fa-edit"></i></button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$courseDetail->links()}}
@endsection
@endsection

