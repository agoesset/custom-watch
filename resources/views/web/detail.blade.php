@extends('web.base')

@section('title', $product->name . ' - Customwatch.id')

@section('content')
<div class="mt-100">
    <div class="breadcrumb-area bg-gray">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li class="active">{{ $product->name }} </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="product-details-area pt-120 pb-115">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">
                        <!-- Gambar Besar -->
                        <div id="product-images" class="mb-3">
                            <img id="main-image" src="{{ asset('storage/' . ($product->image[0] ?? 'assets/images/no-image.png')) }}" alt="{{ $product->name }}" class="img-fluid mb-3 w-100">
                        </div>
                    </div>
                    <!-- Thumbnail -->
                    <div id="product-thumbnails" class="d-flex justify-content-center">
                        @foreach ($product->image as $index => $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="product-thumbnail" class="img-thumbnail me-2 {{ $index === 0 ? 'border border-primary' : '' }}" style="width: 60px; cursor: pointer;" data-image="{{ asset('storage/' . $image) }}">
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-content pro-details-content-mrg">
                        <h2>{{ $product->name }}</h2>
                        <p class="mt-2">{!! $product->description !!}</p>
                        <div class="pro-details-price">
                            <span class="new-price">{{ $product->formatted_price }}</span>
                        </div>
                        <div class="pro-details-color-wrap">
                            <span>Color:</span>
                            <div class="pro-details-color-content">
                                <ul>
                                    @if (is_array($product->color) && count($product->color) > 0)
                                    @foreach ($product->color as $color)
                                    <li><a href="#" style="background-color: {{ $color['hex_color'] }};"></a></li>
                                    @endforeach
                                    @else
                                    <li><span>No colors available</span></li>
                                    @endif
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
                                    @foreach($product->categories as $category)
                                    <a href="#" class="badge bg-secondary me-1">{{ $category->name }}</a>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                        <div class="pro-details-action-wrap">
                            <div class="pro-details-add-to-cart">
                                <a id="buyNowDetailButton" title="Buy Now" href="javascript:void(0)">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const thumbnails = document.querySelectorAll('#product-thumbnails img');
            const mainImage = document.getElementById('main-image');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    const newImageSrc = this.getAttribute('data-image');
                    mainImage.setAttribute('src', newImageSrc);
                    thumbnails.forEach(img => img.classList.remove('border', 'border-primary'));
                    this.classList.add('border', 'border-primary');
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tombol Buy Now di halaman detail produk
            const buyNowDetailButton = document.getElementById('buyNowDetailButton');
            const qtyInputDetail = document.querySelector('.cart-plus-minus-box');
            const productNameDetail = document.querySelector('.product-details-content h2');
            const productPriceDetail = document.querySelector('.pro-details-price .new-price');
            const colorListDetail = document.querySelectorAll('.pro-details-color-content ul li a');

            if (buyNowDetailButton) {
                buyNowDetailButton.addEventListener('click', function() {
                    const productName = productNameDetail.textContent.trim();
                    const productPrice = parseFloat(productPriceDetail.textContent.replace('Rp ', '').replace('.', '').replace(',', ''));
                    const qty = parseInt(qtyInputDetail.value);
                    let selectedColor = 'Belum memilih warna';

                    colorListDetail.forEach(colorElement => {
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
    @endsection
