<div class="row">
    @foreach ($allProduct as $product)
    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="single-product-wrap mb-35">
            <div class="product-img product-img-zoom mb-20">
                <a href="{{ route('product.show', $product->id) }}">
                    <img src="{{ asset('storage/' . $product->image[0]) }}" alt="{{ $product->name }}">
                </a>
                <div class="product-action-wrap">
                    <div class="product-action-left">
                        <button><i class="icon-basket-loaded"></i>Buy Now</button>
                    </div>
                    <div class="product-action-right tooltip-style">
                        <button class="quick-view-btn" data-product-id="{{ $product->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="icon-size-fullscreen icons"></i><span>Quick View</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="product-content-wrap">
                <div class="product-content-left">
                    <h4><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></h4>
                    <div class="product-price">
                        <span>{{ $product->formatted_price }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @if ($allProduct->isEmpty())
    <p>Produk Tidak tersedia</p>
    @endif
</div>