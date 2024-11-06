<!doctype html>
<html class="no-js')}}" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title','Customwatch.id')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}">

    <!-- All CSS is here
	============================================ -->

    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/elegant.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendor/linear-icon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/easyzoom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <style>
        .product-details-tab {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            /* Pusatkan secara horizontal */
            align-items: center;
            /* Pusatkan secara vertikal */
        }

        .layer {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /* Pastikan layer berada tepat di tengah */
            width: 400px;
            /* Ukuran gambar */
            height: 400px;
            /* Ukuran gambar */
        }

        .layer img {
            width: 100%;
            /* Responsif terhadap ukuran layer */
            height: 100%;
            object-fit: cover;
            /* Memastikan gambar terisi tanpa distorsi */
        }

        /* Layer dengan z-index untuk menumpuk sesuai urutan */
        .layer1 {
            z-index: 1;
        }

        .layer2 {
            z-index: 2;
        }

        .layer3 {
            z-index: 3;
        }

        .layer4 {
            z-index: 4;
        }

        .layer5 {
            z-index: 5;
        }

        .selected-case {
            border: 2px solid #000;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div class="main-wrapper">
        <header class="header-area transparent-bar section-padding-1">
            <div class="container">
                <div class="header-large-device">
                    <div class="header-bottom">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="index.html">
                                        <img src="{{asset('assets/images/logo/logo.png')}}" alt="logo">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-7">
                                <div class="main-menu main-menu-padding-1 main-menu-lh-1">
                                    <nav>
                                        <ul>
                                            <li>
                                                <a href="{{ route('home') }}">HOME </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('configurator') }}">CONFIGURATOR </a>
                                            </li>
                                            <li><a href="{{ route('shop') }}">SHOP </a>
                                                <ul class="sub-menu-style">
                                                    <li><a href="blog.html">blog standard </a></li>
                                                    <li><a href="blog-no-sidebar.html">blog no sidebar </a></li>
                                                    <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                                                    <li><a href="blog-details.html">blog details</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="{{ route('history') }}">HISTORY </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('contact') }}">CONTACT </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3">
                                <div class="header-action header-action-flex header-action-mrg-right">
                                    <div class="same-style-2 header-search-1">
                                        <a class="search-toggle" href="#">
                                            <i class="icon-magnifier s-open"></i>
                                            <i class="icon_close s-close"></i>
                                        </a>
                                        <div class="search-wrap-1">
                                            <form action="#">
                                                <input placeholder="Search products…" type="text">
                                                <button class="button-search"><i class="icon-magnifier"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-small-device small-device-ptb-1">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <div class="mobile-logo">
                                <a href="index.html">
                                    <img alt="" src="{{asset('assets/images/logo/logo.png')}}">
                                </a>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="header-action header-action-flex">
                                <div class="same-style-2">
                                    <a href="login-register.html"><i class="icon-user"></i></a>
                                </div>
                                <div class="same-style-2">
                                    <a href="wishlist.html"><i class="icon-heart"></i><span class="pro-count red">03</span></a>
                                </div>
                                <div class="same-style-2 header-cart">
                                    <a class="cart-active" href="#">
                                        <i class="icon-basket-loaded"></i><span class="pro-count red">02</span>
                                    </a>
                                </div>
                                <div class="same-style-2 main-menu-icon">
                                    <a class="mobile-header-button-active" href="#"><i class="icon-menu"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- mini cart start -->
        <div class="sidebar-cart-active">
            <div class="sidebar-cart-all">
                <a class="cart-close" href="#"><i class="icon_close"></i></a>
                <div class="cart-content">
                    <h3>Shopping Cart</h3>
                    <ul>
                        <li class="single-product-cart">
                            <div class="cart-img">
                                <a href="#"><img src="{{asset('assets/images/cart/cart-1.jpg')}}" alt=""></a>
                            </div>
                            <div class="cart-title">
                                <h4><a href="#">Simple Black T-Shirt</a></h4>
                                <span> 1 × $49.00 </span>
                            </div>
                            <div class="cart-delete">
                                <a href="#">×</a>
                            </div>
                        </li>
                        <li class="single-product-cart">
                            <div class="cart-img">
                                <a href="#"><img src="{{asset('assets/images/cart/cart-2.jpg')}}" alt=""></a>
                            </div>
                            <div class="cart-title">
                                <h4><a href="#">Norda Backpack</a></h4>
                                <span> 1 × $49.00 </span>
                            </div>
                            <div class="cart-delete">
                                <a href="#">×</a>
                            </div>
                        </li>
                    </ul>
                    <div class="cart-total">
                        <h4>Subtotal: <span>$170.00</span></h4>
                    </div>
                    <div class="cart-checkout-btn">
                        <a class="btn-hover cart-btn-style" href="cart.html">view cart</a>
                        <a class="no-mrg btn-hover cart-btn-style" href="checkout.html">checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile menu start -->
        <div class="mobile-header-active mobile-header-wrapper-style">
            <div class="clickalbe-sidebar-wrap">
                <a class="sidebar-close"><i class="icon_close"></i></a>
                <div class="mobile-header-content-area">
                    <div class="header-offer-wrap mobile-header-padding-border-4">
                        <p><i class="icon-paper-plane"></i> FREE SHIPPING world wide for all orders over <span>$199</span></p>
                    </div>
                    <div class="mobile-search mobile-header-padding-border-1">
                        <form class="search-form" action="#">
                            <input type="text" placeholder="Search here…">
                            <button class="button-search"><i class="icon-magnifier"></i></button>
                        </form>
                    </div>
                    <div class="mobile-menu-wrap mobile-header-padding-border-2">
                        <!-- mobile menu start -->
                        <nav>
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children"><a href="index.html">Home</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">Home version 1 </a></li>
                                        <li><a href="index-2.html">Home version 2</a></li>
                                        <li><a href="index-3.html">Home version 3</a></li>
                                        <li><a href="index-4.html">Home version 4</a></li>
                                        <li><a href="index-5.html">Home version 5</a></li>
                                        <li><a href="index-6.html">Home version 6</a></li>
                                        <li><a href="index-7.html">Home version 7</a></li>
                                        <li><a href="index-8.html">Home version 8</a></li>
                                        <li><a href="index-9.html">Home version 9</a></li>
                                        <li><a href="index-10.html">Home version 10</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children "><a href="#">shop</a>
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children"><a href="#">shop layout</a>
                                            <ul class="dropdown">
                                                <li><a href="shop.html">standard style</a></li>
                                                <li><a href="shop-list.html">shop list style</a></li>
                                                <li><a href="shop-fullwide.html">shop fullwide</a></li>
                                                <li><a href="shop-no-sidebar.html">grid no sidebar</a></li>
                                                <li><a href="shop-list-no-sidebar.html">list no sidebar</a></li>
                                                <li><a href="shop-right-sidebar.html">shop right sidebar</a></li>
                                                <li><a href="store-location.html">store location</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Products Layout</a>
                                            <ul class="dropdown">
                                                <li><a href="product-details.html">tab style 1</a></li>
                                                <li><a href="product-details-2.html">tab style 2</a></li>
                                                <li><a href="product-details-sticky.html">sticky style</a></li>
                                                <li><a href="product-details-gallery.html">gallery style </a></li>
                                                <li><a href="product-details-affiliate.html">affiliate style</a></li>
                                                <li><a href="product-details-group.html">group style</a></li>
                                                <li><a href="product-details-fixed-img.html">fixed image style </a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="about-us.html">about us </a></li>
                                        <li><a href="cart.html">cart page</a></li>
                                        <li><a href="checkout.html">checkout </a></li>
                                        <li><a href="my-account.html">my account</a></li>
                                        <li><a href="wishlist.html">wishlist </a></li>
                                        <li><a href="compare.html">compare </a></li>
                                        <li><a href="contact.html">contact us </a></li>
                                        <li><a href="order-tracking.html">order tracking</a></li>
                                        <li><a href="login-register.html">login / register </a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children "><a href="#">Blog</a>
                                    <ul class="dropdown">
                                        <li><a href="blog.html">blog standard </a></li>
                                        <li><a href="blog-no-sidebar.html">blog no sidebar </a></li>
                                        <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                                        <li><a href="blog-details.html">blog details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact us</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu end -->
                    </div>
                    <div class="mobile-header-info-wrap mobile-header-padding-border-3">
                        <div class="single-mobile-header-info">
                            <a href="order-tracking.html"><i class="lastudioicon-pin-3-2"></i> Track Your Order </a>
                        </div>
                        <div class="single-mobile-header-info">
                            <a class="mobile-language-active" href="#">Language <span><i class="icon-arrow-down"></i></span></a>
                            <div class="lang-curr-dropdown lang-dropdown-active">
                                <ul>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-mobile-header-info">
                            <a class="mobile-currency-active" href="#">Currency <span><i class="icon-arrow-down"></i></span></a>
                            <div class="lang-curr-dropdown curr-dropdown-active">
                                <ul>
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">EUR</a></li>
                                    <li><a href="#">Real</a></li>
                                    <li><a href="#">BDT</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-contact-info mobile-header-padding-border-4">
                        <ul>
                            <li><i class="icon-phone "></i> (+612) 2531 5600</li>
                            <li><i class="icon-envelope-open "></i> norda@domain.com</li>
                            <li><i class="icon-home"></i> PO Box 1622 Colins Street West Australia</li>
                        </ul>
                    </div>
                    <div class="mobile-social-icon">
                        <a class="facebook" href="#"><i class="icon-social-facebook"></i></a>
                        <a class="twitter" href="#"><i class="icon-social-twitter"></i></a>
                        <a class="pinterest" href="#"><i class="icon-social-pinterest"></i></a>
                        <a class="instagram" href="#"><i class="icon-social-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')

        <div class="instagram-area">
            <div class="container">
                <div class="section-title-tag-wrap mb-45">
                    <div class="section-title">
                        <h2>Our Instagram</h2>
                    </div>
                    <div class="instagram-tag">
                        <span>#monkeylover</span>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col">
                        <div class="instagram-item">
                            <a class="instagram-image" href="#">
                                <img src="{{asset('assets/images/instagram/1.jpg')}}" alt="Instagram Image">
                            </a>
                            <ul class="add-action">
                                <li>
                                    <a href="#">
                                        <i class="icon_plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="instagram-item">
                            <a class="instagram-image" href="#">
                                <img src="{{asset('assets/images/instagram/2.jpg')}}" alt="Instagram Image">
                            </a>
                            <ul class="add-action">
                                <li>
                                    <a href="#">
                                        <i class="icon_plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="instagram-item">
                            <a class="instagram-image" href="#">
                                <img src="{{asset('assets/images/instagram/3.jpg')}}" alt="Instagram Image">
                            </a>
                            <ul class="add-action">
                                <li>
                                    <a href="#">
                                        <i class="icon_plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="instagram-item">
                            <a class="instagram-image" href="#">
                                <img src="{{asset('assets/images/instagram/4.jpg')}}" alt="Instagram Image">
                            </a>
                            <ul class="add-action">
                                <li>
                                    <a href="#">
                                        <i class="icon_plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="instagram-item">
                            <a class="instagram-image" href="#">
                                <img src="{{asset('assets/images/instagram/5.jpg')}}" alt="Instagram Image">
                            </a>
                            <ul class="add-action">
                                <li>
                                    <a href="#">
                                        <i class="icon_plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="brand-logo-area pt-100 pb-100">
            <div class="container">
                <div class="brand-logo-wrap brand-logo-mrg">
                    <div class="single-brand-logo mb-10">
                        <img src="{{asset('assets/images/brand-logo/brand-logo-1.png')}}" alt="brand-logo">
                    </div>
                    <div class="single-brand-logo mb-10">
                        <img src="{{asset('assets/images/brand-logo/brand-logo-2.png')}}" alt="brand-logo">
                    </div>
                    <div class="single-brand-logo mb-10">
                        <img src="{{asset('assets/images/brand-logo/brand-logo-3.png')}}" alt="brand-logo">
                    </div>
                    <div class="single-brand-logo mb-10">
                        <img src="{{asset('assets/images/brand-logo/brand-logo-4.png')}}" alt="brand-logo">
                    </div>
                    <div class="single-brand-logo mb-10">
                        <img src="{{asset('assets/images/brand-logo/brand-logo-5.png')}}" alt="brand-logo">
                    </div>
                </div>
            </div>
        </div>
        <div class="subscribe-area bg-gray pt-115 pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="section-title">
                            <h2>keep connected</h2>
                            <p>Get updates by subscribe our weekly newsletter</p>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div id="mc_embed_signup" class="subscribe-form">
                            <form id="mc-embedded-subscribe-form" class="validate subscribe-form-style" novalidate="" target="_blank" name="mc-embedded-subscribe-form" method="post" action="https://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef">
                                <div id="mc_embed_signup_scroll" class="mc-form">
                                    <input class="email" type="email" required="" placeholder="Enter your email address" name="EMAIL" value="">
                                    <div class="mc-news" aria-hidden="true">
                                        <input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef">
                                    </div>
                                    <div class="clear">
                                        <input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe" value="Subscribe">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer-area bg-gray pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="contact-info-wrap">
                            <div class="footer-logo">
                                <a href="#"><img src="{{asset('assets/images/logo/logo.png')}}" alt="logo"></a>
                            </div>
                            <div class="single-contact-info">
                                <span>Our Location</span>
                                <p>869 General Village Apt. 645, Moorebury, USA</p>
                            </div>
                            <div class="single-contact-info">
                                <span>24/7 hotline:</span>
                                <p>(+99) 052 128 2399</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer-right-wrap">
                            <div class="footer-menu">
                                <nav>
                                    <ul>
                                        <li><a href="index.html">home</a></li>
                                        <li><a href="shop.html">Shop</a></li>
                                        <li><a href="shop.html">Product </a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="blog.html">Blog.</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="social-style-2 social-style-2-mrg">
                                <a href="#"><i class="social_twitter"></i></a>
                                <a href="#"><i class="social_facebook"></i></a>
                                <a href="#"><i class="social_googleplus"></i></a>
                                <a href="#"><i class="social_instagram"></i></a>
                                <a href="#"><i class="social_youtube"></i></a>
                            </div>
                            <div class="copyright">
                                <p>Copyright © 2024 Customwatch.id | <a href="https://webwirausaha.com/">Built with ❤️ by <span>Webwirausaha.com</span></a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-12 col-sm-12">
                                <!-- Tempat gambar besar -->
                                <div id="product-images" class="mb-3">
                                    <!-- Gambar besar akan dimasukkan di sini oleh JavaScript -->
                                    <img id="main-image" src="" alt="product image" class="img-fluid mb-3 w-100" />
                                </div>
                                <div id="product-thumbnails" class="d-flex justify-content-start">
                                    <!-- Thumbnails akan ditempatkan di sini oleh JavaScript -->
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6 col-12 col-sm-12">
                                <div class="product-details-content quickview-content">
                                    <h2 id="product-name"></h2>
                                    <p id="product-description">Seamlessly predominate enterprise metrics without performance based process improvements.</p>
                                    <div class="pro-details-price">
                                        <span class="new-price" id="product-price"></span>
                                        <!-- <span class="old-price">$95.72</span> -->
                                    </div>
                                    <div class="pro-details-color-wrap">
                                        <span>Color:</span>
                                        <div class="pro-details-color-content">
                                            <ul id="product-colors">
                                                <!-- Warna produk akan ditambahkan oleh JavaScript -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pro-details-quality">
                                        <span>Quantity:</span>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                                        </div>
                                    </div>
                                    <div class="product-details-meta">
                                        <ul>
                                            <li>
                                                <span>Categories:</span>
                                                <p id="product-categories"></p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="pro-details-action-wrap">
                                        <div class="pro-details-add-to-cart">
                                            <a id="buyNowModalButton" title="Buy Now" href="javascript:void(0)">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
    </div>

    <!-- All JS is here
============================================ -->

    <script src="{{asset('assets/js/vendor/modernizr-3.11.7.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-v3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-migrate-v3.3.2.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/slick.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/wow.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{asset('assets/js/plugins/sticky-sidebar.js')}}"></script>
    <script src="{{asset('assets/js/plugins/easyzoom.js')}}"></script>
    <script src="{{asset('assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{asset('assets/js/plugins/ajax-mail.js')}}"></script>
    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    <!-- JavaScript untuk AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Event handler untuk klik pada tab kategori
            $('.tab-style-1 a').on('click', function(e) {
                e.preventDefault();

                // Hapus class 'active' dari semua tab dan tambahkan ke tab yang diklik
                $('.tab-style-1 a').removeClass('active');
                $(this).addClass('active');

                var categoryId = $(this).data('category-id');

                // AJAX request untuk memuat produk berdasarkan kategori
                $.ajax({
                    url: "{{ route('filter.products') }}",
                    type: "GET",
                    data: {
                        category_id: categoryId
                    },
                    success: function(data) {
                        $('#productContainer').html(data);
                    },
                    error: function() {
                        $('#productContainer').html('<p>Terjadi kesalahan. Silakan coba lagi.</p>');
                    }
                });
            });

            // Event handler untuk klik pada tombol "Quick View"
            $('.quick-view-btn').on('click', function() {
                var productId = $(this).data('product-id');

                // AJAX request untuk mendapatkan detail produk
                $.ajax({
                    url: '/product/' + productId,
                    method: 'GET',
                    success: function(data) {
                        // Kosongkan konten sebelumnya
                        $('#product-thumbnails').empty();
                        $('#product-colors').empty();
                        $('#product-categories').empty();

                        // Menampilkan gambar pertama sebagai gambar utama
                        var firstImage = data.images[0];
                        $('#main-image').attr('src', '/storage/' + firstImage);

                        // Tambahkan thumbnail untuk semua gambar
                        data.images.forEach(function(image, index) {
                            var isActive = (index === 0) ? 'border border-primary' : '';
                            $('#product-thumbnails').append(`
                            <img src="/storage/${image}" alt="product-thumbnail" class="img-thumbnail me-2 ${isActive}" style="width: 50px; cursor: pointer;" data-image="/storage/${image}">
                        `);
                        });

                        // Event listener untuk mengganti gambar utama saat thumbnail diklik
                        $('.img-thumbnail').on('click', function() {
                            var newImage = $(this).data('image');
                            $('#main-image').attr('src', newImage);
                            $('.img-thumbnail').removeClass('border border-primary');
                            $(this).addClass('border border-primary');
                        });

                        // Tampilkan warna produk
                        if (data.color && data.color.length > 0) {
                            data.color.forEach(function(color) {
                                $('#product-colors').append('<li><a href="#" style="background-color: ' + color.hex_color + ';"></a></li>');
                            });
                        } else {
                            $('#product-colors').append('<li>No colors available</li>');
                        }

                        // Tampilkan kategori produk
                        if (data.categories && data.categories.length > 0) {
                            data.categories.forEach(function(category) {
                                $('#product-categories').append('<span class="badge bg-secondary me-1">' + category + '</span>');
                            });
                        } else {
                            $('#product-categories').append('<p>No categories available</p>');
                        }

                        // Update konten lainnya
                        $('#product-name').text(data.name);
                        $('#product-price').text('Rp ' + data.formatted_price);
                        $('#product-description').html(data.description);

                        // Tampilkan modal
                        $('#exampleModal').modal('show');
                    },
                    error: function() {
                        alert('Terjadi kesalahan saat memuat data produk. Silakan coba lagi.');
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tombol Buy Now di modal
            const buyNowModalButton = document.getElementById('buyNowModalButton');
            const qtyInputModal = document.querySelector('.modal .cart-plus-minus-box');
            const productNameModal = document.getElementById('product-name');
            const productPriceModal = document.getElementById('product-price');
            const colorListModal = document.querySelectorAll('#product-colors li a');

            if (buyNowModalButton) {
                buyNowModalButton.addEventListener('click', function() {
                    const productName = productNameModal.textContent.trim();
                    const productPrice = parseFloat(productPriceModal.textContent.replace('Rp ', '').replace('.', '').replace(',', ''));
                    const qty = parseInt(qtyInputModal.value);
                    let selectedColor = 'Belum memilih warna';

                    colorListModal.forEach(colorElement => {
                        if (colorElement.classList.contains('active')) {
                            selectedColor = colorElement.style.backgroundColor;
                        }
                    });

                    const totalPrice = productPrice * qty;
                    const message = `Halo, saya tertarik membeli produk berikut:\n\n` +
                        `Nama Produk: ${productName}\n` +
                        `Jumlah: ${qty}\n` +
                        `Harga Total: Rp ${totalPrice.toLocaleString('id-ID')}\n` +
                        `Warna: ${selectedColor}`;

                    const whatsappUrl = `https://wa.me/6285101578882?text=${encodeURIComponent(message)}`;
                    window.open(whatsappUrl, '_blank');
                });
            }
        });
    </script>

</body>

</html>
