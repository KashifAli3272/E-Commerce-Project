<!DOCTYPE html>
<html lang="en">


<!-- molla/index-1.html  22 Nov 2019 09:55:06 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Molla - Bootstrap eCommerce Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/images/icons/site.html') }}">
    <link rel="mask-icon" href="{{ asset('assets/images/icons/safari-pinned-tab.svg') }}" color="#666666">
    <link rel="shortcut icon" href="{{ asset('assets/images/icons/favicon.ico') }}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ asset('assets/images/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css') }}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery.countdown.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/skins/skin-demo-2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demos/demo-2.css') }}">
</head>

<body>
    <div class="page-wrapper">
        <header class="header header-2 header-intro-clearance">
            <div class="header-top">
                <div class="container">
                     <a href="{{ route('items.index') }}" class="logo">
                            <img src="assets/images/demos/demo-2/logo.png" alt="Molla Logo" width="105"
                                height="25">
                        </a>

@include("user.menu")

                    <div class="header-right">

                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li>
                                        <div class="header-dropdown">

                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="#">Eur</a></li>
                                                    <li><a href="#">Usd</a></li>
                                                </ul>
                                            </div><!-- End .header-menu -->
                                        </div>
                                    </li>
                                    <li>
                                        <div class="header-dropdown">

                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="#">English</a></li>
                                                    <li><a href="#">French</a></li>
                                                    <li><a href="#">Spanish</a></li>
                                                </ul>
                                            </div><!-- End .header-menu -->
                                        </div>
                                    </li>
                                    <li><a href="#signin-modal" data-toggle="modal">Sign in / Sign up</a></li>
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->

                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>


                    </div><!-- End .header-left -->

                           <div class="header">
                        <div
                            class="header-search header-search large header-search-visible header-search-no-radius d-none d-lg-block "  ", >
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="{{ route('search') }}" method="GET">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="search" id="q"
                                        placeholder="Search product ..." required>
                                    <button class="btn btn-primary" type="submit"><i
                                            class="icon-search"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>


                    <div class="header-right">
                        <div class="account">
                            <a href="{{ route('viewaccount') }}" title="My account">
                                <div class="icon">
                                    <i class="icon-user"></i>
                                </div>
                                <p>Account</p>
                            </a>
                        </div><!-- End .compare-dropdown -->


                        <div class="dropdown cart-dropdown ">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" data-display="static">
                                <div class="icon">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="cart-count">{{ count(session('cart', [])) }}</span>
                                </div>
                                <p>Cart</p>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products">
                                    @php
                                        $cart = session('cart', []);
                                        $total = 0;
                                    @endphp

                                    @forelse($cart as $id => $item)
                                        @php
                                            $subtotal = $item['price'] * $item['quantity'];
                                            $total += $subtotal;
                                        @endphp
                                        <div class="product">
                                            <div class="product-cart-details">
                                                <h4 class="product-title">
                                                    <a href="{{ route('cartview', $id) }}">{{ $item['name'] }}</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">{{ $item['quantity'] }}</span>
                                                    x RS{{ number_format($item['price'], 2) }}
                                                </span>
                                            </div>

                                            <figure class="product-image-container">
                                                <a href="{{ route('cartview', $id) }}" class="product-image">
                                                    <img src="{{ asset('storage/' . $item['image']) }}"
                                                        alt="{{ $item['name'] }}">
                                                </a>
                                            </figure>

                                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn-remove" title="Remove Product">
                                                    <i class="icon-close"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @empty
                                        <p class="text-center p-3">Your cart is empty</p>
                                    @endforelse
                                </div>

                                <div class="dropdown-cart-total">
                                    <span>Total</span>
                                    <span class="cart-total-price">RS{{ number_format($total, 2) }}</span>
                                </div>

                                <div class="dropdown-cart-action">
                                    <a href="{{ route('cart.index') }}" class="btn btn-primary">
                                        View Cart
                                    </a>
                                    <a href="{{ route('checkout.index') }}" class="btn btn-outline-primary-2">
                                        <span>Checkout</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>





                            </div><!-- End .container -->
                        </div><!-- End .header-bottom -->

        </header><!-- End .header -->
