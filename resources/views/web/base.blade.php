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
            /* Layer paling bawah: Strap */
        }

        .layer2 {
            z-index: 2;
            /* Setelah itu: Dial */
        }

        .layer3 {
            z-index: 3;
            /* Setelah itu: Case */
        }

        .layer4 {
            z-index: 4;
            /* Layer paling atas: Ring */
        }

        .selected-case {                                                                                
            border: 2px solid #000;
        }

        .part-item {   
            cursor: pointer;
        }

        .part-item.active {
            border: 2px solid #007bff;
            /* Ganti dengan warna atau gaya yang diinginkan */
            background-color: #f0f8ff;
            /* Ganti dengan warna atau gaya yang diinginkan */
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
                                    <a href="/">
                                        <img src="{{asset('assets/images/logo/Customwatch.png')}}" alt="logo">
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
                                                <a href="{{ route('configurator') }}">CUSTOM JAM </a>
                                            </li>
                                            <li><a href="{{ route('shop') }}">JAM SIAP PAKAI </a></li>
                                            <li>
                                                <a href="{{ route('history') }}">TENTANG KAMI </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('contact') }}">KONTAK KAMI </a>
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
                                    <img alt="" src="{{asset('assets/images/logo/Customwatch.png')}}">
                                </a>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="header-action header-action-flex">
                                <div class="same-style-2 main-menu-icon">
                                    <a class="mobile-header-button-active" href="#"><i class="icon-menu"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Mobile menu start -->
        <div class="mobile-header-active mobile-header-wrapper-style">
            <div class="clickalbe-sidebar-wrap">
                <a class="sidebar-close"><i class="icon_close"></i></a>
                <div class="mobile-header-content-area">
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
                                <li class="menu-item-has-children"><a href="index.html">Home</a></li>
                                <li class="menu-item-has-children "><a href="#">Custom Jam</a></li>
                                <li class="menu-item-has-children"><a href="#">Jam Siap Pakai</a></li>
                                <li class="menu-item-has-children "><a href="#">Tentang Kami</a></li>
                                <li><a href="contact.html">Kontak Kami</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu end -->
                    </div>
                    <div class="mobile-contact-info mobile-header-padding-border-4">
                        <ul>
                            <li><i class="icon-phone "></i> +62 851-0157-8882</li>
                            <li><i class="icon-envelope-open "></i> admin@customwatch.id</li>
                            <li><i class="icon-home"></i> AEON Mall Sentul City Lantai 1 Unit 1-49, Jl. MH. Thamrin No.49, Citaringgul, Babakan Madang, Bogor Regency, West Java 16810</li>
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
        <footer class="footer-area bg-gray pt-50 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="contact-info-wrap">
                            <div class="footer-logo">
                                <a href="#"><img src="{{asset('assets/images/logo/Customwatch.png')}}" alt="logo"></a>
                            </div>
                            <div class="single-contact-info">
                                <span>Lokasi Kami</span>
                                <p>AEON Mall Sentul City Lantai 1 Unit 1-49, Jl. MH. Thamrin No.49, Citaringgul, Babakan Madang, Bogor Regency, West Java 16810</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer-right-wrap">
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
