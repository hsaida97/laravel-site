<nav class="navbar navbar-expand-lg  py-4" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            Mega<span>kit.</span>
        </a>

        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09"
                aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
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
                        <li><a class="dropdown-item" href="pricing.html">Pricing</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{route ('front.services')}}">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route ('front.portfolio')}}">Portfolio</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Blog</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown05">
                        <li><a class="dropdown-item" href="{{route ('front.blogs')}}">Blog Grid</a></li>
                        <li><a class="dropdown-item" href="blog-sidebar.html">Blog with Sidebar</a></li>

                        <li><a class="dropdown-item" href="blog-single.html">Blog Single</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{route ('front.contact')}}">Contact</a></li>
            </ul>

            <form class="form-lg-inline my-2 my-md-0 ml-lg-4 text-center">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-solid-border btn-round-full">Get a Quote</a>
            </form>
        </div>
    </div>
</nav>
