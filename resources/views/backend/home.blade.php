@extends('layouts.main')
@section('content')
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body class="antialiased">

        @section('section')
        <span class="badge badge-light bg-dark" style="width: 100%"><i class="fa fa-tachometer pull-left" style="font-size:100px;">&nbsp;<span style="font-size: 40px">
            @if (session()->has('LoggedAdminID'))
            {{Session::get('LoggedAdminFName')}} {{Session::get('LoggedAdminLName')}}
            {{-- Welcome {{$login['adminFirstName']}} {{$login['adminLastName']}} --}}
            {{-- {{session()->get('LoggedAdmin')}} --}}
            @else
            Welcome {{Auth::user()->name }}
           @endif
        </span></i></span>
        @endsection

    </body>

    </html>
@endsection

