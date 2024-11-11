@extends('web.base')
@section('title','Home - Customwatch.id')
@section('content')
<div class="slider-area bg-gray">
    <div class="hero-slider-1 hero-slider-pt-1 nav-style-1 dot-style-1">
        <div class="single-hero-slider single-animation-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="hero-slider-content-1 hero-slider-content-1-pt-1 slider-animated-1">
                            <h4 class="animated">Tampil Keren dengan</h4>
                            <h1 class="animated">Jam Tangan Custom Eksklusif!</h1>
                            <p class="animated">Koleksi jam tangan kami dirancang khusus untuk mencerminkan gaya pribadi Anda. Pilih, sesuaikan, dan tampil beda.</p>
                            <div class="btn-style-1">
                                <a class="animated btn-1-padding-1" href="product-details.html">Custom Jam Sekarang</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="hero-slider-img-1 slider-animated-1">
                            <img class="animated" src="{{('assets/images/hero.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="service-area">
    <div class="container">
        <div class="service-wrap">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-service-wrap mb-30">
                        <div class="service-icon">
                            <i class="icon-cursor"></i>
                        </div>
                        <div class="service-content">
                            <h3>Gratis Ongkir</h3>
                            <span>Untuk pesanan diatas 1,5 Juta</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-service-wrap mb-30">
                        <div class="service-icon">
                            <i class="icon-reload"></i>
                        </div>
                        <div class="service-content">
                            <h3>Gratis Pengembalian</h3>
                            <span>Dalam waktu 30 Hari</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-service-wrap mb-30">
                        <div class="service-icon">
                            <i class="icon-lock"></i>
                        </div>
                        <div class="service-content">
                            <h3>100% Aman</h3>
                            <span>Pembayaran Online</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-service-wrap mb-30">
                        <div class="service-icon">
                            <i class="icon-tag"></i>
                        </div>
                        <div class="service-content">
                            <h3>Harga Terbaik</h3>
                            <span>Sudah Terbukti</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="about-us-area pt-85">
    <div class="container">
        <div class="border-bottom-1 about-content-pb">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="about-us-logo">
                        <img src="{{('assets/images/about/Customwatch.png')}}" alt="logo">
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="about-us-content">
                        <h3>Tentang Kami</h3>
                        <p>Custom Watch adalah sebuah bisnis yang berfokus pada penyediaan jam tangan custom berkualitas tinggi dengan desain yang modis dan harga yang kompetitif. Sejak didirikan pada tahun 2022, Custom Watch.id telah berkembang menjadi salah satu toko online terbaik yang menawarkan pilihan jam tangan yang dapat disesuaikan sesuai keinginan pelanggan.</p>
                        <div class="signature">
                            <h2>Hadi</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-area section-padding-1 pt-115 pb-75">
    <div class="container">
        <div class="section-title-tab-wrap mb-45">
            <div class="section-title">
                <h2>Produk Kami</h2>
            </div>
            <div class="tab-style-1 nav">
                <a class="active" href="#" data-category-id="">All Categories</a>
                @foreach ($allCategory as $category)
                <a href="#" data-category-id="{{ $category->id }}">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="tab-content jump">
            <div id="productContainer">
                @include('web.partials.products', ['allProduct' => $allProduct])
            </div>
        </div>
    </div>
</div>

</div>
<div class="banner-area pb-85">
    <div class="container">
        <div class="section-title mb-45">
            <h2>Our Collections</h2>
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-7">
                <div class="banner-wrap banner-mr-1 mb-30">
                    <div class="banner-img banner-img-zoom">
                        <a href="product-details.html"><img src="{{('assets/images/banner/banner-1.jpg')}}" alt=""></a>
                    </div>
                    <div class="banner-content-1">
                        <h2>Zara Pattern Boxed <br>Underwear</h2>
                        <p>Stretch, fresh-cool help you alway comfortable</p>
                        <div class="btn-style-1">
                            <a class="animated btn-1-padding-2" href="product-details.html">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="banner-wrap  banner-ml-1 mb-30">
                    <div class="banner-img banner-img-zoom">
                        <a href="product-details.html"><img src="{{('assets/images/banner/banner-2.jpg')}}" alt=""></a>
                    </div>
                    <div class="banner-content-2">
                        <h2>Basic Color Caps</h2>
                        <p>Minimalist never cool, choose and make the simple great again!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection