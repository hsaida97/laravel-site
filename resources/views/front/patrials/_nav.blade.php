<nav class="navbar navbar-expand-lg  py-4" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="">
            Mega<span>kit.</span>
        </a>

        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09"
                aria-controls="navbars Example09" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="navbarsExample09">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('front.index') }}">Home <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">About</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown03">
                        <li><a class="dropdown-item" href="{{ route('front.about') }}">Our company</a></li>
                        <li><a class="dropdown-item" href="">Pricing</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{route ('front.services')}}">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route ('front.portfolio')}}">Portfolio</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Blog</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown05">
                        <li><a class="dropdown-item" href="{{route ('front.blogs')}}">Blog Grid</a></li>
                        <li><a class="dropdown-item" href="">Blog with Sidebar</a></li>

                        <li><a class="dropdown-item" href="">Blog Single</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{route ('front.contact')}}">Contact</a></li>
            </ul>

            <form class="form-lg-inline my-2 my-md-0 ml-lg-4 text-center">
                <a href="{{ route('login') }}" class="btn btn-solid-border btn-round-full">Login</a>
            </form>
        </div>
    </div>
</nav>
