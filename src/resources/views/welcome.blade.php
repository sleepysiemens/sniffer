@extends('layouts.app')

@section('content')
    <section id="hero" style="background-image:url({{ asset('images/banner-img1.jpg') }});">
        <div class="container padding-large">
            <div class="row">
                <div class="col-md-6 col-lg-5 offset-md-2 text-center bg-black p-5">
                    <h2 class="display-1 banner-text text-uppercase text-white mt-3">Street Wears</h2>
                    <p class="text-uppercase text-white mb-4">High quality cool tshirts for street fashion</p>
                    <a href="#" class="btn btn-outline-light btn-wrap">
                        Start Shopping <i class="icon icon-arrow-io fs-5 align-text-bottom"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="service" class="padding-medium">
        <div class="container">
            <div class="row g-md-5 pt-4">
                <div class="col-md-3 my-3">
                    <div class="card">
                        <div>
                            <i class="fa-solid fa-cart-shopping service-icon text-primary fs-2"></i>
                        </div>
                        <h3 class="py-2 m-0">Free Delivery</h3>
                        <div class="card-text">
                            <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 my-3">
                    <div class="card">
                        <div>
                            <i class="fa-solid fa-magnifying-glass service-icon text-primary fs-2"></i>
                        </div>
                        <h4 class="py-2 m-0">100% secure payment</h4>
                        <div class="card-text">
                            <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 my-3">
                    <div class="card">
                        <div>
                            <i class="fa-solid fa-award service-icon text-primary fs-2"></i>
                        </div>
                        <h4 class="py-2 m-0">Quality guarantee</h4>
                        <div class="card-text">
                            <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 my-3">
                    <div class="card">
                        <div>
                            <i class="fa-solid fa-dollar-sign service-icon text-primary fs-2"></i>
                        </div>
                        <h4 class="py-2 m-0">Daily Offer</h4>
                        <div class="card-text">
                            <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="new-arrival" class="product-store">
        <div class="container">
            <h2 class="display-5 fw-light text-uppercase text-center mb-5">New Arrivals</h2>
            <div class="row">
                <div class="col-md-6 col-lg-3 my-4">
                    <div class="product-item">
                        <div class="image-holder" style="width: 100%; height: 100%;">
                            <img src="{{ asset('images/item1.jpg') }}" alt="Books" class="product-image img-fluid">
                        </div>
                        <div class="cart-concern">
                            <div class="cart-button d-flex justify-content-between align-items-center">
                                <a href="#" class="btn-wrap cart-link d-flex align-items-center text-capitalize fs-6 ">add to cart <i
                                        class="icon icon-arrow-io pe-1"></i>
                                </a>
                                <a href="{{ route('welcome') }}" class="view-btn">
                                    <i class="icon icon-screen-full"></i>
                                </a>
                                <a href="#" class="wishlist-btn">
                                    <i class="icon icon-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-detail d-flex justify-content-between align-items-center mt-4">
                            <h4 class="product-title mb-0">
                                <a href="{{ route('welcome') }}">Seven Zero Five</a>
                            </h4>
                            <p class="m-0 fs-5 fw-normal">$40.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-4">
                    <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                        New
                    </div>
                    <div class="product-item">
                        <div class="image-holder">
                            <img src="{{ asset('images/item2.jpg') }}" alt="Books" class="product-image img-fluid">
                        </div>
                        <div class="cart-concern">
                            <div class="cart-button d-flex justify-content-between align-items-center">
                                <a href="#" class="btn-wrap cart-link d-flex align-items-center text-capitalize fs-6 ">add to cart <i
                                        class="icon icon-arrow-io pe-1"></i>
                                </a>
                                <a href="{{ route('welcome') }}" class="view-btn">
                                    <i class="icon icon-screen-full"></i>
                                </a>
                                <a href="#" class="wishlist-btn">
                                    <i class="icon icon-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-detail d-flex justify-content-between align-items-center mt-4">
                            <h4 class="product-title mb-0">
                                <a href="{{ route('welcome') }}">Seven Zero Five</a>
                            </h4>
                            <p class="m-0 fs-5 fw-normal">$40.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-4">
                    <div class="product-item">
                        <div class="image-holder">
                            <img src="{{ asset('images/item3.jpg') }}" alt="Books" class="product-image img-fluid">
                        </div>
                        <div class="cart-concern">
                            <div class="cart-button d-flex justify-content-between align-items-center">
                                <a href="#" class="btn-wrap cart-link d-flex align-items-center text-capitalize fs-6 ">add to cart <i
                                        class="icon icon-arrow-io pe-1"></i>
                                </a>
                                <a href="{{ route('welcome') }}" class="view-btn">
                                    <i class="icon icon-screen-full"></i>
                                </a>
                                <a href="#" class="wishlist-btn">
                                    <i class="icon icon-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-detail d-flex justify-content-between align-items-center mt-4">
                            <h4 class="product-title mb-0">
                                <a href="{{ route('welcome') }}">Seven Zero Five</a>
                            </h4>
                            <p class="m-0 fs-5 fw-normal">$40.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-4">
                    <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                        Sale
                    </div>
                    <div class="product-item">
                        <div class="image-holder">
                            <img src="{{ asset('images/item4.jpg') }}" alt="Books" class="product-image img-fluid">
                        </div>
                        <div class="cart-concern">
                            <div class="cart-button d-flex justify-content-between align-items-center">
                                <a href="#" class="btn-wrap cart-link d-flex align-items-center text-capitalize fs-6 ">add to cart <i
                                        class="icon icon-arrow-io pe-1"></i>
                                </a>
                                <a href="{{ route('welcome') }}" class="view-btn">
                                    <i class="icon icon-screen-full"></i>
                                </a>
                                <a href="#" class="wishlist-btn">
                                    <i class="icon icon-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-detail d-flex justify-content-between align-items-center mt-4">
                            <h4 class="product-title mb-0">
                                <a href="{{ route('welcome') }}">Seven Zero Five</a>
                            </h4>
                            <p class="m-0 fs-5 fw-normal">$40.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-4">
                    <div class="product-item">
                        <div class="image-holder">
                            <img src="{{ asset('images/item1.jpg') }}" alt="Books" class="product-image img-fluid">
                        </div>
                        <div class="cart-concern">
                            <div class="cart-button d-flex justify-content-between align-items-center">
                                <a href="#" class="btn-wrap cart-link d-flex align-items-center text-capitalize fs-6 ">add to cart <i
                                        class="icon icon-arrow-io pe-1"></i>
                                </a>
                                <a href="{{ route('welcome') }}" class="view-btn">
                                    <i class="icon icon-screen-full"></i>
                                </a>
                                <a href="#" class="wishlist-btn">
                                    <i class="icon icon-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-detail d-flex justify-content-between align-items-center mt-4">
                            <h4 class="product-title mb-0">
                                <a href="{{ route('welcome') }}">Seven Zero Five</a>
                            </h4>
                            <p class="m-0 fs-5 fw-normal">$40.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-4">
                    <div class="product-item">
                        <div class="image-holder">
                            <img src="{{ asset('images/item2.jpg') }}" alt="Books" class="product-image img-fluid">
                        </div>
                        <div class="cart-concern">
                            <div class="cart-button d-flex justify-content-between align-items-center">
                                <a href="#" class="btn-wrap cart-link d-flex align-items-center text-capitalize fs-6 ">add to cart <i
                                        class="icon icon-arrow-io pe-1"></i>
                                </a>
                                <a href="{{ route('welcome') }}" class="view-btn">
                                    <i class="icon icon-screen-full"></i>
                                </a>
                                <a href="#" class="wishlist-btn">
                                    <i class="icon icon-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-detail d-flex justify-content-between align-items-center mt-4">
                            <h4 class="product-title mb-0">
                                <a href="{{ route('welcome') }}">Seven Zero Five</a>
                            </h4>
                            <p class="m-0 fs-5 fw-normal">$40.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-4">
                    <div class="product-item">
                        <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                            Sold
                        </div>
                        <div class="image-holder">
                            <img src="{{ asset('images/item3.jpg') }}" alt="Books" class="product-image img-fluid">
                        </div>
                        <div class="cart-concern">
                            <div class="cart-button d-flex justify-content-between align-items-center">
                                <a href="#" class="btn-wrap cart-link d-flex align-items-center text-capitalize fs-6 ">add to cart <i
                                        class="icon icon-arrow-io pe-1"></i>
                                </a>
                                <a href="{{ route('welcome') }}" class="view-btn">
                                    <i class="icon icon-screen-full"></i>
                                </a>
                                <a href="#" class="wishlist-btn">
                                    <i class="icon icon-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-detail d-flex justify-content-between align-items-center mt-4">
                            <h4 class="product-title mb-0">
                                <a href="{{ route('welcome') }}">Seven Zero Five</a>
                            </h4>
                            <p class="m-0 fs-5 fw-normal">$40.00</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-4">
                    <div class="product-item">
                        <div class="image-holder">
                            <img src="{{ asset('images/item4.jpg') }}" alt="Books" class="product-image img-fluid">
                        </div>
                        <div class="cart-concern">
                            <div class="cart-button d-flex justify-content-between align-items-center">
                                <a href="#" class="btn-wrap cart-link d-flex align-items-center text-capitalize fs-6 ">add to cart <i
                                        class="icon icon-arrow-io pe-1"></i>
                                </a>
                                <a href="{{ route('welcome') }}" class="view-btn">
                                    <i class="icon icon-screen-full"></i>
                                </a>
                                <a href="#" class="wishlist-btn">
                                    <i class="icon icon-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-detail d-flex justify-content-between align-items-center mt-4">
                            <h4 class="product-title mb-0">
                                <a href="{{ route('welcome') }}">Seven Zero Five</a>
                            </h4>
                            <p class="m-0 fs-5 fw-normal">$40.00</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5 pt-4">
                <button type="submit" class="btn btn-dark rounded-3">View All Products</button>
            </div>
        </div>
    </section>

    <section id="category" class="padding-medium">
        <div class="container-fluid">
            <div class="row px-md-5">

                <div class="col-md-4 position-relative">
                    <div class="z-1 position-absolute bottom-0 start-0 m-3 mg-lg-5 ps-4 text-white">
                        <h5 class="text-light text-uppercase">Printed T-Shirts</h5>
                    </div>
                    <div class="image-holder zoom-effect">
                        <a href="{{ route('welcome') }}">
                            <img src="{{ asset('images/category1.jpg') }}" alt="img" class="post-image img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-md-4 position-relative ">
                    <div class="z-1 position-absolute bottom-0 start-0 m-3 mg-lg-5 ps-4 text-white">
                        <h5 class="text-light text-uppercase">Mono T-Shirts</h5>
                    </div>
                    <div class="image-holder zoom-effect">
                        <a href="{{ route('welcome') }}">
                            <img src="{{ asset('images/category3.jpg') }}" alt="img" class="post-image img-fluid">
                        </a>
                    </div>
                </div>
                <div class="col-md-4 position-relative">
                    <div class="z-1 position-absolute bottom-0 start-0 m-3 mg-lg-5 ps-4 text-white">
                        <h5 class="text-light text-uppercase">Graphic Hoodies</h5>
                    </div>
                    <div class="image-holder zoom-effect">
                        <a href="{{ route('welcome') }}">
                            <img src="{{ asset('images/category2.jpg') }}" alt="img" class="post-image img-fluid">
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="register" style="background-image:url({{ asset('images/background-img.jpg') }});">
        <div class="container padding-medium">
            <div class="row banner-content align-items-center">
                <div class="col-md-4 offset-md-1">
                    <h2 class="register-text text-white mt-3">Get <span> <em>20% OFF</em> </span> on your first purchase</h2>
                    <p class="mb-4">Sign Up for our newsletter and never miss any offers</p>
                </div>
                <div class="col-md-4 offset-md-1">
                    <form>
                        <div class="mb-3">
                            <input type="email" class="form-control form-control-lg rounded-3" name="email" id="email"
                                   placeholder="Enter Your Email Address">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-dark btn-lg rounded-3">Register it now</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
