<nav class="navbar navbar-expand-sm navbar-dark bg-dark shadow" id="navbar">
    <div class="container">
        <a class="navbar-brand text-success" href="#">
            Brand
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class=" nav navbar-nav navbar-center">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">
                        Home
                        <span class="sr-only">
                            (current)
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('fronted.about')}}">
                        About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Our Aim
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('fronted.course')}}">
                        Courses
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('fronted.contact')}}">
                        Contact-us
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>