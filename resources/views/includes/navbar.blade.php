<nav class="navbar navbar-expand-md navbar-light bg-dark text-light fixed-top py-2" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/#masthead">Laravel DEVS</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
                <li class="nav-item"><a class="nav-link" href="/#masthead">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="/#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="/#portfolio">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route("categories.index") }}">Categories</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Products
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                      <li><a class="dropdown-item" href="{{ route("products.index") }}">All Products <b>({{ \App\Models\Product::all()->count() }})</b></a></li>
                      <li><a class="dropdown-item" href="{{ route("products.delete") }}">Deleted Products <b>({{ \App\Models\Product::onlyTrashed()->count() }})</b></a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route("contact") }}">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
