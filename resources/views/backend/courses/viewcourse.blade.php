@extends('layouts.main')
@section('content')
@section('section')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        @if (Session::get('delete'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('delete') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                                @elseif (Session::get('update'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ Session::get('delete') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @else
                                Course Record
                            @endif
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('backend.courses.addcourse')}}"><button class="btn btn-info"><i class="fas fa-plus"> Add</i></button></a>
                    </div>
                    <div class="col-md-5">
                        <form action="" method="">
                            <div class="form-group form-inline">
                                <label for="">Search</label>
                                <input type="search" class="form-control" name="search" id=""
                                    aria-describedby="helpId" placeholder="Search">
                                    <a href="{{route('backend.courses.viewcourse')}}"><button type="button" class="btn btn-secondary">Reset</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th-sm">Name</th>
                    <th class="th-sm">Credit Hour</th>
                    <th class="th-sm">Description</th>
                    <th class="th-sm">Image</th>
                    <th class="th-sm">Status</th>
                    <th class="th-sm">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($course as $value)
                    <tr>
                        <td><a href="{{url('backend/coursedetail/add')}}/{{$value->courseId}}" class="badge badge-info">{{ $value->courseName}}</a></td>
                        <td>{{ $value->courseCreditHr}}</td>
                        <td>{{ $value->courseDisc}}</td>
                        <td><img width="7%" class="img-circle" src="{{asset($value->courseImage)}}" alt=""></td>
                        <td>
                            @if ($value->courseStatus == 1)
                                <a href="{{url('backend/courses/statuschange')}}/{{$value->courseId}}"><div class="badge badge-success">Active</div></a>
                            @else
                                <a href="{{url('backend/courses/statuschange')}}/{{$value->courseId}}"><div class="badge badge-danger">InActive</div></a>
                            @endif
                        </td>
                        <td>
                            <a href="{{url('backend/courses/deletecourse')}}/{{$value->courseId}}"><button class="btn btn-danger"><i
                                        class="fas fa-trash"></i></button></a>
                            <a href="{{url('backend/courses/editcourse')}}/{{$value->courseId}}"><button class="btn btn-primary"><i
                                        class="fas fa-edit"></i></button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- {{$userView->links()}} --}}
@endsection
@endsection

