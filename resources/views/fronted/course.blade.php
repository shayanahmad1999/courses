@extends('fronted.layouts.main')
@section('content')
    <div class="container mt-4">
        <h2 class="text text-center" id="heading">Our Courses</h2>
        <div class="row mt-5">
            @foreach ($course as $item)
                <div class="col-md-6 col-sm-6 col-lg-6 mt-3">
                    <div class="card">
                        <div class="card card-header bg-dark">
                            <span class="text text-light">
                                {{ $item->courseName }}
                                <span class="badge badge-warning">
                                    New
                                </span>
                                <span class="float-right">
                                    Start Date: {{ $item->created_at }}
                                    <span>ID: {{ $item->courseId }}</span>
                                </span>
                            </span>
                        </div>
                        <div class="card-body text text-dark" style=" background: #eaf9ff;">
                            <span>{{ $item->courseDisc }}
                            </span><br><br>
                            <span class="">
                                <i class="fas fa-book"></i> Lessons |
                                <i class="fas fa-bars"></i> Basic Level
                            </span>
                            <span class="float-right">
                                <a href="{{url('fronted/coursedetail')}}/{{$item->courseId}}"><button class="btn btn-primary">Read more</button></a>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
