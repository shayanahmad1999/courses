@extends('fronted.layouts.main')
@section('content')
<!doctype html>
<html lang="en">
<body>

    <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('fronted-img/img-3.jpg') }}" width="100%" alt="Los Angeles">
                <div class="carousel-caption d-flex mb-5 p-3 h-100 align-items-center ">
                    <h2 style="color:rgb(138, 5, 56) ;">Our Courses</h2>
                </div>
                <div class="carousel-caption d-flex mb-2 p-0 h-100 align-items-center ">
                    <a href="#" class="nav-link"><button
                            class="btn btn-outline-primary btn-lg border border-success">Get Started</button></a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('fronted-img/img-3.jpg') }}" width="100%" alt="Chicago">
                <div class="carousel-caption d-flex mb-5 p-3 h-100 align-items-center ">
                    <h2 style="color:rgb(138, 5, 56) ;">Our Courses</h2>
                </div>
                <div class="carousel-caption d-flex mb-2 p-0 h-100 align-items-center ">
                    <a href="#" class="nav-link"><button
                            class="btn btn-outline-primary btn-lg border border-success">Get Started</button></a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('fronted-img/img-3.jpg') }}" width="100%" alt="New York">
            <div class="carousel-caption d-flex mb-5 p-3 h-100 align-items-center ">
                <h2 style="color:rgb(138, 5, 56) ;">Our Courses</h2>
            </div>
            <div class="carousel-caption d-flex mb-2 p-0 h-100 align-items-center ">
                <a href="#" class="nav-link"><button
                        class="btn btn-outline-primary btn-lg border border-success">Get
                        Started</button></a>
            </div>
        </div>
        <div>
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>
    </div>
    <div class="container text text-center">
        <br><br>
        <span class="display-4" id="heading">Gallery</span>
    </div>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <img class="img-fluid" src="{{ asset('fronted-img/img-1 (1).jpeg') }}" alt="">
                    </div>
                    <div class="card-footer">
                        <span>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi excepturi ipsum, officia id
                            rerum inventore quam harum obcaecati rem quas neque voluptas tenetur delectus, vitae facilis
                            explicabo. Maiores, iure nobis.
                        </span>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-dark">View</button>
                        <button class="btn btn-outline-dark">Edit</button>
                        <span class="float-right">9 min</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <img class="img-fluid" src="{{ asset('fronted-img/img-1 (1).jpeg') }}" alt="">
                    </div>
                    <div class="card-footer">
                        <span>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi excepturi ipsum, officia id
                            rerum inventore quam harum obcaecati rem quas neque voluptas tenetur delectus, vitae facilis
                            explicabo. Maiores, iure nobis.
                        </span>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-dark">View</button>
                        <button class="btn btn-outline-dark">Edit</button>
                        <span class="float-right">9 min</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <img class="img-fluid" src="{{ asset('fronted-img/img-1 (1).jpeg') }}" alt="">
                    </div>
                    <div class="card-footer">
                        <span>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi excepturi ipsum, officia id
                            rerum inventore quam harum obcaecati rem quas neque voluptas tenetur delectus, vitae facilis
                            explicabo. Maiores, iure nobis.
                        </span>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-dark">View</button>
                        <button class="btn btn-outline-dark">Edit</button>
                        <span class="float-right">9 min</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-lg-4" style="grid-gap: 10px;">
                <div class="card">
                    <div class="card-body">
                        <img class="img-fluid" src="{{ asset('fronted-img/img-1 (1).jpeg') }}" alt="">
                    </div>
                    <div class="card-footer">
                        <span>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi excepturi ipsum, officia id
                            rerum inventore quam harum obcaecati rem quas neque voluptas tenetur delectus, vitae facilis
                            explicabo. Maiores, iure nobis.
                        </span>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-dark">View</button>
                        <button class="btn btn-outline-dark">Edit</button>
                        <span class="float-right">9 min</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <img class="img-fluid" src="{{ asset('fronted-img/img-1 (1).jpeg') }}" alt="">
                    </div>
                    <div class="card-footer">
                        <span>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi excepturi ipsum, officia id
                            rerum inventore quam harum obcaecati rem quas neque voluptas tenetur delectus, vitae facilis
                            explicabo. Maiores, iure nobis.
                        </span>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-dark">View</button>
                        <button class="btn btn-outline-dark">Edit</button>
                        <span class="float-right">9 min</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <img class="img-fluid" src="{{ asset('fronted-img/img-1 (1).jpeg') }}" alt="">
                    </div>
                    <div class="card-footer">
                        <span>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi excepturi ipsum, officia id
                            rerum inventore quam harum obcaecati rem quas neque voluptas tenetur delectus, vitae facilis
                            explicabo. Maiores, iure nobis.
                        </span>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-dark">View</button>
                        <button class="btn btn-outline-dark">Edit</button>
                        <span class="float-right">9 min</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</body>
</html>

@endsection