@extends('fronted.layouts.main')
@section('content')
    <div class="container mt-3">
        <br>
        <span class="display-4 text text-center" id="heading"> Course Detail</span>
        <div class="row mt-4">
            @foreach ($coursedetail as $item)
                <div class="col-sm-6 col-md-6 col-lg-6 mt-2 mb-2">
                    <div class="card">
                        <div class="row mt-4 mb-4 ml-1">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="card" style=" background: #eaf9ff;">
                                    <i class="fas fa-book text-primary ml-4" style="font-size: 100px;"></i>
                                </div>
                                <div class="card-footer  bg-dark text-light text-center font-weight-bold"
                                    style="border-radius: 20px;">{{ $item->cdLesson }}</div>
                            </div>
                            <div class="col-sm-8 col-lg-8 col-md-8">
                                <h5>{{ $item->cdTopic }}</h5>
                                <span>{{ $item->cdDesc }}
                                </span><br><br>
                                <i class=""><span style="font-size: 13px">Duration: {{ $item->cdDuration }}</i> |
                                <a href="{{ asset($item->cdVideo) }}" target=”_blank”><i class=""><span
                                            class="text-danger" style="font-size: 13px">Play Video</span></i> </a>|
                                <a href="{{ asset($item->cdFile) }}"><i class=""><span class="text-primary"
                                            style="font-size: 13px">Download</span></i></a>
                                </span>
                            </div>
                            <video>
                                <source src="{{asset($item->cdVideo)}}">
                            </video>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <div class="row mt-4">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="card">
                    <img src="" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <h4>Course Detail</h4>
                <table class="table table-striped table-inverse">
                    <thead class="thead-inverse bg-dark text-light">
                        <tr>
                            <th>Lesson</th>
                            <th>Instructor</th>
                            <th>Time</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td scope="row"></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div> --}}
    </div>
@endsection
