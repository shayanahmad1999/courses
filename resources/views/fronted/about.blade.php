@extends('fronted.layouts.main')
@section('content')
    <div class="container mt-4">
        <h2 class="text text-center" id="heading">About Us </h2>
        <div class="row mt-5">
            <div class="col-md-6 col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('fronted-img/img-1 (1).jpeg')}}" class="img-fluid"  alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <span><i>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi veniam ab, necessitatibus ipsum fuga corporis sunt voluptas quia, libero optio explicabo asperiores fugiat quis debitis velit dolores unde nostrum magnam.</i></span><br>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi veniam ab, necessitatibus ipsum fuga corporis sunt voluptas quia, libero optio explicabo asperiores fugiat quis debitis velit dolores unde nostrum magnam.</span><br>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi veniam ab, necessitatibus ipsum fuga corporis sunt voluptas quia, libero optio explicabo asperiores fugiat quis debitis velit dolores unde nostrum magnam.</span><br>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi veniam ab, necessitatibus ipsum fuga corporis sunt voluptas quia, libero optio explicabo asperiores fugiat quis debitis velit dolores unde nostrum magnam.</span><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection