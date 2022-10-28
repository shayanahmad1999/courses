@extends('fronted.layouts.main')
@section('content')
    <div class="container mt-5">
        @if (Session::get('contact'))
            <span class="alert alert-success text text-center">{{Session::get('contact')}}</span>
        @else
            <h2 class="text text-center display-4" style="font-family: Gregular;" id="heading">Contact us</h2>
        @endif
        <p class="text text-secondary" style="font-size: 25px; font-family: Gregular;">
            If there is anything you would like to know or if you have any <br>
            questions, please feel free to contact us.</p>
        <div class="row">
            <div class="col-md-6">
                <div class="card border-0">
                    <div class="card-body" style="background-color: rgba(203, 210, 207, 0.373);">
                        <img src="{{asset('fronted-img/contact.png')}}" width="100%" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6">
                <form action="{{route('fronted.contactstore')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Enter Full Name">
                        @error('name')
                        <div class="text text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Enter Email">
                        @error('email')
                        <div class="text text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Message</label>
                        <textarea name="text" name="message" class="form-control" cols="30" rows="5" placeholder="(Optional)"></textarea>
                      </div>
                      <div class="form-group">
                        <button class="btn btn-primary">Submit</button>
                      </div>
                  </form>
            </div>
        </div>
    </div>
@endsection