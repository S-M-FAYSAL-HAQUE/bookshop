<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>Bookshop | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<header class="header">
    <div class="container header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <div class="container-fluid col-sm-6 col-md-12 col-lg-12">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/Bookmark.BD.png') }}" style="width: 200px;" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li id="top-home" class="nav-item" style="">
                            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                        </li>

                        @if(!auth()->guard('customer')->check() )
                            <li id="button">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('customer.login.index') }}"><button id="top-sign-in-button" class="btn rounded-pill" >Sign In</button></a>
                                <a href="{{ route('customer.register.index') }}"><button id="top-sign-up-button" class="btn btn-outline rounded-pill" >Sign Up</button></a>
                            </div>
                        </li>
                        @endif

                    </ul>
                    <form class="d-flex mr-1">
                        <input class="form-control me-2 rounded-pill" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary rounded-pill" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li><a href="{{ route('cart.show') }}" class="btn btn-primary rounded-pill ms-2">Cart<span class="badge bg-light text-dark ms-2">{{ $cartCount }}</span></a></li>
                    </ul>
                    @if(auth()->guard('customer')->check() )
                        <div class="btn-group ms-2">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                {{ auth()->guard('customer')->user()->name }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</header>

<section class="books-cetagory">
    <div class="container books-cetagory-row">
        <div class="col-lg-12 col-md-12 col-sm-12 item" style="background-color: #3A4ADB;">
            <ul class="nav justify-content-center">
                @foreach(\App\Category::all() as $cat)
                    <li class="nav-item">
                        <a class="nav-link" style="color:#fff"  href="{{ route('showcategory',$cat) }}">{{ $cat->name }}</a>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
</section>

@yield('content')


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

@yield('page-script')

</body>
</html>
