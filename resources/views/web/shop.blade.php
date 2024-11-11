@extends('web.base')
@section('title', 'Shop - Customwatch.id')
@section('content')

<div class="mt-100">
    <div class="breadcrumb-area bg-gray">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active">Jam Siap Pakai</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="shop-area pt-120 pb-120">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-12">
                    <div class="shop-topbar-wrapper">
                        <div class="shop-topbar-left">
                            <div class="view-mode nav">
                                <a class="active" href="#shop-1" data-bs-toggle="tab"><i class="icon-grid"></i></a>
                                <a href="#shop-2" data-bs-toggle="tab"><i class="icon-menu"></i></a>
                            </div>
                            <p>Menampilkan {{ count($allProduct) }} hasil</p>
                        </div>
                        <div class="product-sorting-wrapper">
                            <div class="product-shorting shorting-style">
                                <label>View :</label>
                                <select>
                                    <option value="">20</option>
                                    <option value="">23</option>
                                    <option value="">30</option>
                                </select>
                            </div>
                            <div class="product-show shorting-style">
                                <label>Sort by :</label>
                                <select>
                                    <option value="">Default</option>
                                    <option value="">Nama</option>
                                    <option value="">Harga</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="shop-bottom-area">
                        <div class="tab-content jump">
                            <div id="shop-1" class="tab-pane active">
                                <div class="row">
                                    @foreach($allProduct as $product)
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="single-product-wrap mb-35">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="{{ route('product.detail', $product->id) }}">
                                                    <img src="{{ asset('storage/' . $product->image[0]) }}" alt="{{ $product->name }}">
                                                </a>
                                                <div class="product-action-2 tooltip-style-2">
                                                    <button class="quick-view-btn" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal" data-product-id="{{ $product->id }}">
                                                        <i class="icon-size-fullscreen icons"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></h3>
                                                <div class="product-price-2">
                                                    <span>Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-position text-center">
                                                <h3><a href="{{ route('product.detail', $product->id) }}">{{ $product->name }}</a></h3>
                                                <div class="product-price-2">
                                                    <span>Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                                </div>
                                                <div class="pro-add-to-cart product-action-left">
                                                    <button title="Add to Cart">Buy Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div id="shop-2" class="tab-pane">
                                @foreach($allProduct as $product)
                                <div class="shop-list-wrap mb-30">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
                                            <div class="product-list-img">
                                                <a href="{{ route('product.detail', $product->id) }}">
                                                    <img src="{{ asset('storage/' . $product->image[0]) }}" alt="{{ $product->name }}">
                                                </a>
                                                <div class="product-list-quickview">
                                                    <button class="quick-view-btn" data-product-id="{{ $product->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <i class="icon-size-fullscreen icons"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
                                            <div class="shop-list-content">
                                                <h3><a href="{{ route('product.detail', $product->id) }}">{{ $product->name }}</a></h3>
                                                <div class="pro-list-price">
                                                    <span class="new-price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                                </div>
                                                <p>{!! Str::limit($product->description, 100) !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="pro-pagination-style text-center mt-10">
                            <ul>
                                <li><a class="prev" href="#"><i class="icon-arrow-left"></i></a></li>
                                <li><a class="active" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a class="next" href="#"><i class="icon-arrow-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection