@include('fronted.layouts.head')
@include('fronted.layouts.nav')
@yield('content')
<br>
<script src="{{asset('JavaScript/app.js')}}"></script>
@include('fronted.layouts.footer')