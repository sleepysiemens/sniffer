<!DOCTYPE html>
<html lang="en">

<head>
    <title>UniClub - Free eCommerce T-Shirt Store HTML Website Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600;700&family=Jost:wght@400;600;700&display=swap">

    <script src="{{ 'https://kit.fontawesome.com/0a007e12dc.js' }}" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

{{--
<div class="preloader-wrapper">
    <div class="preloader">
    </div>
</div>
--}}

<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
    <div class="offcanvas-header justify-content-center">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-4">
                <span class="text-primary">Your cart</span>
                <span class="badge bg-primary rounded-circle pt-2">3</span>
            </h4>

            <ul class="list-group mb-4">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Grey Hoodie</h6>
                        <small class="text-body-secondary">Brief description</small>
                    </div>
                    <span class="text-body-secondary">$120</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Graphic T-Shirt</h6>
                        <small class="text-body-secondary">Brief description</small>
                    </div>
                    <span class="text-body-secondary">$80</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Black T-Shirt</h6>
                        <small class="text-body-secondary">Brief description</small>
                    </div>
                    <span class="text-body-secondary">$50</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span class="fw-bold">Total (USD)</span>
                    <strong>$250</strong>
                </li>
            </ul>

            <button class="w-100 btn btn-dark" type="submit">Continue to checkout</button>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch"
     aria-labelledby="Search">
    <div class="offcanvas-header justify-content-center">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <div class="order-md-last">
            <h4 class="text-primary text-uppercase mb-3">
                Search
            </h4>
            <div class="search-bar border rounded-2 border-dark-subtle">
                <div id="search-form" class="text-center d-flex align-items-center">
                    <input type="text" class="form-control border-0 bg-transparent" placeholder="Search Here" />
                    <i class="fa-solid fa-magnifying-glass fs-4 me-3"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="main-menu d-flex navbar fixed-top navbar-expand-lg py-4 ">
    <div class="container">
        <div class="main-logo">
            <a href="{{ route('welcome') }}">
                <img src="{{asset('images/logo.png')}}" alt="logo" class="img-fluid">
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

            <div class="offcanvas-header justify-content-center">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body justify-content-between">

                <ul class="navbar-nav menu-list list-unstyled d-flex gap-md-3 ps-lg-5 mb-0">
                    <li class="nav-item">
                        <a href="{{ route('welcome') }}" class="nav-link mx-2 active">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link mx-2 dropdown-toggle" role="button" id="pages" data-bs-toggle="dropdown"
                           aria-expanded="false">Pages</a>
                        <ul class="dropdown-menu" aria-labelledby="pages">
                            <li><a href="{{ route('welcome') }}" class="dropdown-item">About Us<span
                                        class="badge bg-secondary-subtle text-dark ms-2">PRO</span></a></li>
                            <li><a href="{{ route('welcome') }}" class="dropdown-item">Shop<span
                                        class="badge bg-secondary-subtle text-dark ms-2">PRO</span></a></li>
                            <li><a href="{{ route('welcome') }}" class="dropdown-item">Single Product<span
                                        class="badge bg-secondary-subtle text-dark ms-2">PRO</span></a></li>
                            <li><a href="{{ route('welcome') }}" class="dropdown-item">Cart<span
                                        class="badge bg-secondary-subtle text-dark ms-2">PRO</span></a></li>
                            <li><a href="{{ route('welcome') }}" class="dropdown-item">Wishlist<span
                                        class="badge bg-secondary-subtle text-dark ms-2">PRO</span></a></li>
                            <li><a href="{{ route('welcome') }}" class="dropdown-item">Checkout<span
                                        class="badge bg-secondary-subtle text-dark ms-2">PRO</span></a></li>
                            <li><a href="{{ route('welcome') }}" class="dropdown-item">Blog<span
                                        class="badge bg-secondary-subtle text-dark ms-2">PRO</span></a></li>
                            <li><a href="{{ route('welcome') }}" class="dropdown-item">Single Post<span
                                        class="badge bg-secondary-subtle text-dark ms-2">PRO</span></a></li>
                            <li><a href="{{ route('welcome') }}" class="dropdown-item">Contact<span
                                        class="badge bg-secondary-subtle text-dark ms-2">PRO</span></a></li>
                            <li><a href="{{ route('welcome') }}" class="dropdown-item">FAQs<span
                                        class="badge bg-secondary-subtle text-dark ms-2">PRO</span></a></li>
                            <li><a href="{{ route('welcome') }}" class="dropdown-item">Account<span
                                        class="badge bg-secondary-subtle text-dark ms-2">PRO</span></a></li>
                            <li><a href="{{ route('welcome') }}" class="dropdown-item">Thankyou<span
                                        class="badge bg-secondary-subtle text-dark ms-2">PRO</span></a></li>
                            <li><a href="{{ route('welcome') }}" class="dropdown-item">Error 404<span
                                        class="badge bg-secondary-subtle text-dark ms-2">PRO</span></a></li>
                            <li><a href="{{ route('welcome') }}" class="dropdown-item">Styles<span
                                        class="badge bg-secondary-subtle text-dark ms-2">PRO</span></a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('welcome') }}" class="nav-link mx-2">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('welcome') }}" class="nav-link mx-2">T-Shirts</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('welcome') }}" class="nav-link mx-2">Hoodies</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://templatesjungle.gumroad.com/l/uniclub-t-shirt-bootstrap5-eCommerce-website-template" class="nav-link mx-2" target="_blank">GET PRO</a>
                    </li>
                </ul>

                <div class="d-none d-lg-flex align-items-end">
                    <ul class="d-flex justify-content-end list-unstyled m-0">
                        <li>
                            <a href="{{ route('welcome') }}" class="mx-3">
                                <i class="fa-solid fa-user text-dark fs-4"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('welcome') }}" class="mx-3">
                                <i class="fa-solid fa-heart fs-4"></i>
                            </a>
                        </li>

                        <li class="">
                            <a href="{{ route('welcome') }}" class="mx-3">
                                <i class="fa-solid fa-cart-shopping fs-4"></i>
                                <span class="position-absolute translate-middle badge rounded-circle bg-primary">
                                    03
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('welcome') }}" class="mx-3">
                                <i class="fa-solid fa-magnifying-glass fs-4"></i>
                            </a>
                        </li>

                    </ul>

                </div>

            </div>
        </div>

    </div>
    <div class="container d-lg-none">
        <div class="d-flex  align-items-end mt-3">
            <ul class="d-flex justify-content-end list-unstyled m-0">
                <li>
                    <a href="{{ route('welcome') }}" class="me-4">
                        <i class="fa-solid fa-user fs-4 me-2"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('welcome') }}" class="me-4">
                        <i class="fa-solid fa-heart fs-4 me-2"></i>
                    </a>
                </li>

                <li>
                    <a href="{{ route('welcome') }}" class="me-4">
                        <i class="fa-solid fa-cart-shopping  fs-4 me-2 position-relative"></i>
                        <span class="position-absolute translate-middle badge rounded-circle bg-primary">
                            03
                        </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('welcome') }}" class="me-4">
                        <i class="fa-solid fa-magnifying-glass fs-4 me-2"></i>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>

@yield('content')

<footer id="footer" class="bg-black">
    <div class="container padding-medium pt-5">
        <div class="row mt-5">
            <div class="col-md-4 offset-md-1">
                <div class="footer-menu">
                    <img src="{{ asset('images/logo-dark.png') }}" alt="logo">
                    <div class="social-links mt-4">
                        <ul class="d-flex list-unstyled gap-3">
                            <li class="social">
                                <a href="{{ route('welcome') }}">
                                    <i class="fa-brands fa-facebook social-icon fs-5 text-white me-4"></i>
                                </a>
                            </li>
                            <li class="social">
                                <a href="{{ route('welcome') }}">
                                    <i class="fa-brands fa-facebook social-icon fs-5 text-white me-4"></i>
                                </a>
                            </li>
                            <li class="social">
                                <a href="{{ route('welcome') }}">
                                    <i class="fa-brands fa-facebook social-icon fs-5 text-white me-4"></i>
                                </a>
                            </li>
                            <li class="social">
                                <a href="{{ route('welcome') }}">
                                    <i class="fa-brands fa-facebook social-icon fs-5 text-white me-4"></i>
                                </a>
                            </li>
                            <li class="social">
                                <a href="{{ route('welcome') }}">
                                    <i class="fa-brands fa-facebook social-icon fs-5 text-white me-4"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="footer-menu">
                    <h6 class="text-uppercase fw-bold text-white mb-4">Quick Links</h6>
                    <ul class="menu-list list-unstyled">
                        <li class="menu-item">
                            <a href="#" class="footer-link">Home</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="footer-link">About us</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="footer-link">Offer </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="footer-link">Services</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="footer-link">Conatct Us</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="footer-menu">
                    <h6 class="text-uppercase fw-bold text-white mb-4">About</h6>
                    <ul class="menu-list list-unstyled">
                        <li class="menu-item">
                            <a href="#" class="footer-link">How It Work</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="footer-link">Our Packages</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="footer-link">promotions</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="footer-link">refer a friend</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="footer-menu">
                    <h6 class="text-uppercase fw-bold text-white mb-4">Help Center</h6>
                    <ul class="menu-list list-unstyled">
                        <li class="menu-item">
                            <a href="#" class="footer-link">Payments</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="footer-link">Shipping</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="footer-link">Product returns </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="footer-link">FAQs</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="footer-link">Checkout</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="footer-link">other Issues</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="footer-bottom" class="bg-black">
    <hr class="m-0">
    <div class="container padding-medium pt-3">
        <div class="row mt-3">
            <div class="col-md-6 copyright">
                <p class="secondary-font">© 2023 UNICLUB. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="secondary-font">Free HTML Template by <a href="https://templatesjungle.com/" target="_blank"
                                                                   class="text-decoration-underline fw-bold text-white-50"> TemplatesJungle</a> </p>
            </div>
        </div>
    </div>
</div>
</body>

</html>

