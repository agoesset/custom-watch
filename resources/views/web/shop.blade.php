@extends('web.base')
@section('title', 'Shop - Customwatch.id')
@section('content')
<div class="mt-100">
    <div class="breadcrumb-area bg-gray">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="active">Jam Siap Pakai </li>
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
                            <p>Showing 1 - 20 of 30 results </p>
                        </div>
                        <div class="product-sorting-wrapper">
                            <div class="product-shorting shorting-style">
                                <label>View :</label>
                                <select>
                                    <option value=""> 20</option>
                                    <option value=""> 23</option>
                                    <option value=""> 30</option>
                                </select>
                            </div>
                            <div class="product-show shorting-style">
                                <label>Sort by :</label>
                                <select>
                                    <option value="">Default</option>
                                    <option value=""> Name</option>
                                    <option value=""> price</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="shop-bottom-area">
                        <div class="tab-content jump">
                            <div id="shop-1" class="tab-pane active">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="single-product-wrap mb-35">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-13.jpg" alt="">
                                                </a>
                                                <div class="product-action-2 tooltip-style-2">
                                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                                    <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(2)</span>
                                                </div>
                                                <h3><a href="product-details.html">Basic Joggin Shorts</a></h3>
                                                <div class="product-price-2">
                                                    <span>$20.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-position text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(2)</span>
                                                </div>
                                                <h3><a href="product-details.html">Basic Joggin Shorts</a></h3>
                                                <div class="product-price-2">
                                                    <span>$20.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="single-product-wrap mb-35">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-14.jpg" alt="">
                                                </a>
                                                <span class="pro-badge left bg-red">-20%</span>
                                                <div class="product-action-2 tooltip-style-2">
                                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                                    <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                    </div>
                                                    <span>(5)</span>
                                                </div>
                                                <h3><a href="product-details.html">Make Thing Happen T-Shirt</a></h3>
                                                <div class="product-price-2">
                                                    <span class="new-price">$35.45</span>
                                                    <span class="old-price">$45.80</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-position text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                    </div>
                                                    <span>(5)</span>
                                                </div>
                                                <h3><a href="product-details.html">Make Thing Happen T-Shirt</a></h3>
                                                <div class="product-price-2">
                                                    <span class="new-price">$35.45</span>
                                                    <span class="old-price">$45.80</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="single-product-wrap mb-35">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-15.jpg" alt="">
                                                </a>
                                                <div class="product-action-2 tooltip-style-2">
                                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                                    <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                    </div>
                                                    <span>(4)</span>
                                                </div>
                                                <h3><a href="product-details.html">Basic White Simple Sneaker</a></h3>
                                                <div class="product-price-2">
                                                    <span>$35.45</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-position text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                    </div>
                                                    <span>(4)</span>
                                                </div>
                                                <h3><a href="product-details.html">Basic White Simple Sneaker</a></h3>
                                                <div class="product-price-2">
                                                    <span>$35.45</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="single-product-wrap mb-35">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-16.jpg" alt="">
                                                </a>
                                                <div class="product-action-2 tooltip-style-2">
                                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                                    <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(3)</span>
                                                </div>
                                                <h3><a href="product-details.html">Simple Rounded Sunglasses</a></h3>
                                                <div class="product-price-2">
                                                    <span>$45.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-position text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(3)</span>
                                                </div>
                                                <h3><a href="product-details.html">Simple Rounded Sunglasses</a></h3>
                                                <div class="product-price-2">
                                                    <span>$45.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="single-product-wrap mb-35">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-17.jpg" alt="">
                                                </a>
                                                <span class="pro-badge left bg-red">-20%</span>
                                                <div class="product-action-2 tooltip-style-2">
                                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                                    <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(5)</span>
                                                </div>
                                                <h3><a href="product-details.html">Vintage Socks X3</a></h3>
                                                <div class="product-price-2">
                                                    <span class="new-price">$35.45</span>
                                                    <span class="old-price">$45.80</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-position text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(5)</span>
                                                </div>
                                                <h3><a href="product-details.html">Vintage Socks X3</a></h3>
                                                <div class="product-price-2">
                                                    <span class="new-price">$35.45</span>
                                                    <span class="old-price">$45.80</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="single-product-wrap mb-35">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-18.jpg" alt="">
                                                </a>
                                                <div class="product-action-2 tooltip-style-2">
                                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                                    <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(3)</span>
                                                </div>
                                                <h3><a href="product-details.html">Tie-up Sute Sandals</a></h3>
                                                <div class="product-price-2">
                                                    <span>$55.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-position text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(3)</span>
                                                </div>
                                                <h3><a href="product-details.html">Tie-up Sute Sandals</a></h3>
                                                <div class="product-price-2">
                                                    <span>$55.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="single-product-wrap mb-35">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-19.jpg" alt="">
                                                </a>
                                                <div class="product-action-2 tooltip-style-2">
                                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                                    <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                    </div>
                                                    <span>(5)</span>
                                                </div>
                                                <h3><a href="product-details.html">Faded Grey T-Shirt</a></h3>
                                                <div class="product-price-2">
                                                    <span>$65.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-position text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                    </div>
                                                    <span>(5)</span>
                                                </div>
                                                <h3><a href="product-details.html">Faded Grey T-Shirt</a></h3>
                                                <div class="product-price-2">
                                                    <span>$65.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="single-product-wrap mb-35">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-20.jpg" alt="">
                                                </a>
                                                <div class="product-action-2 tooltip-style-2">
                                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                                    <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(2)</span>
                                                </div>
                                                <h3><a href="product-details.html">Snakeskin print belt</a></h3>
                                                <div class="product-price-2">
                                                    <span>$75.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-position text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(2)</span>
                                                </div>
                                                <h3><a href="product-details.html">Snakeskin print belt</a></h3>
                                                <div class="product-price-2">
                                                    <span>$75.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="single-product-wrap mb-35">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-95.jpg" alt="">
                                                </a>
                                                <div class="product-action-2 tooltip-style-2">
                                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                                    <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(2)</span>
                                                </div>
                                                <h3><a href="product-details.html">Simple Black T-Shirt</a></h3>
                                                <div class="product-price-2">
                                                    <span>$20.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-position text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(2)</span>
                                                </div>
                                                <h3><a href="product-details.html">Simple Black T-Shirt</a></h3>
                                                <div class="product-price-2">
                                                    <span>$20.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="single-product-wrap mb-35">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-96.jpg" alt="">
                                                </a>
                                                <span class="pro-badge left bg-red">-20%</span>
                                                <div class="product-action-2 tooltip-style-2">
                                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                                    <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                    </div>
                                                    <span>(5)</span>
                                                </div>
                                                <h3><a href="product-details.html">Norda Simple Backpack</a></h3>
                                                <div class="product-price-2">
                                                    <span class="new-price">$35.45</span>
                                                    <span class="old-price">$45.80</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-position text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                    </div>
                                                    <span>(5)</span>
                                                </div>
                                                <h3><a href="product-details.html">Norda Simple Backpack</a></h3>
                                                <div class="product-price-2">
                                                    <span class="new-price">$35.45</span>
                                                    <span class="old-price">$45.80</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="single-product-wrap mb-35">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-97.jpg" alt="">
                                                </a>
                                                <div class="product-action-2 tooltip-style-2">
                                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                                    <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                    </div>
                                                    <span>(4)</span>
                                                </div>
                                                <h3><a href="product-details.html">Simple Blue T-Shirt</a></h3>
                                                <div class="product-price-2">
                                                    <span>$35.45</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-position text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                    </div>
                                                    <span>(4)</span>
                                                </div>
                                                <h3><a href="product-details.html">Simple Blue T-Shirt</a></h3>
                                                <div class="product-price-2">
                                                    <span>$35.45</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="single-product-wrap mb-35">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-99.jpg" alt="">
                                                </a>
                                                <div class="product-action-2 tooltip-style-2">
                                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                                    <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(3)</span>
                                                </div>
                                                <h3><a href="product-details.html">Basic Sneaker</a></h3>
                                                <div class="product-price-2">
                                                    <span>$45.50</span>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-position text-center">
                                                <div class="product-rating-wrap">
                                                    <div class="product-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(3)</span>
                                                </div>
                                                <h3><a href="product-details.html">Basic Sneaker</a></h3>
                                                <div class="product-price-2">
                                                    <span>$45.50</span>
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <button title="Add to Cart">Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="shop-2" class="tab-pane">
                                <div class="shop-list-wrap mb-30">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
                                            <div class="product-list-img">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-13.jpg" alt="Product Style">
                                                </a>
                                                <div class="product-list-quickview">
                                                    <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
                                            <div class="shop-list-content">
                                                <h3><a href="product-details.html">Basic Joggin Shorts</a></h3>
                                                <div class="pro-list-price">
                                                    <span class="new-price">$35.45</span>
                                                    <span class="old-price">$45.80</span>
                                                </div>
                                                <div class="product-list-rating-wrap">
                                                    <div class="product-list-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(3)</span>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor labor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                                <div class="product-list-action">
                                                    <button title="Add To Cart"><i class="icon-basket-loaded"></i></button>
                                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shop-list-wrap mb-30">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
                                            <div class="product-list-img">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-14.jpg" alt="Product Style">
                                                </a>
                                                <div class="product-list-quickview">
                                                    <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
                                            <div class="shop-list-content">
                                                <h3><a href="product-details.html">Make Thing Happen T-Shirt</a></h3>
                                                <div class="pro-list-price">
                                                    <span class="new-price">$35.45</span>
                                                    <span class="old-price">$45.80</span>
                                                </div>
                                                <div class="product-list-rating-wrap">
                                                    <div class="product-list-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(3)</span>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor labor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                                <div class="product-list-action">
                                                    <button title="Add To Cart"><i class="icon-basket-loaded"></i></button>
                                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shop-list-wrap mb-30">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
                                            <div class="product-list-img">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-15.jpg" alt="Product Style">
                                                </a>
                                                <div class="product-list-quickview">
                                                    <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
                                            <div class="shop-list-content">
                                                <h3><a href="product-details.html">Basic White Simple Sneaker</a></h3>
                                                <div class="pro-list-price">
                                                    <span class="new-price">$35.45</span>
                                                    <span class="old-price">$45.80</span>
                                                </div>
                                                <div class="product-list-rating-wrap">
                                                    <div class="product-list-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(3)</span>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor labor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                                <div class="product-list-action">
                                                    <button title="Add To Cart"><i class="icon-basket-loaded"></i></button>
                                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shop-list-wrap mb-30">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
                                            <div class="product-list-img">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-16.jpg" alt="Product Style">
                                                </a>
                                                <div class="product-list-quickview">
                                                    <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
                                            <div class="shop-list-content">
                                                <h3><a href="product-details.html">Simple Rounded Sunglasses</a></h3>
                                                <div class="pro-list-price">
                                                    <span class="new-price">$35.45</span>
                                                    <span class="old-price">$45.80</span>
                                                </div>
                                                <div class="product-list-rating-wrap">
                                                    <div class="product-list-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(3)</span>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor labor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                                <div class="product-list-action">
                                                    <button title="Add To Cart"><i class="icon-basket-loaded"></i></button>
                                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shop-list-wrap mb-30">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
                                            <div class="product-list-img">
                                                <a href="product-details.html">
                                                    <img src="assets/images/product/product-17.jpg" alt="Product Style">
                                                </a>
                                                <div class="product-list-quickview">
                                                    <button title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
                                            <div class="shop-list-content">
                                                <h3><a href="product-details.html">Vintage Socks X3</a></h3>
                                                <div class="pro-list-price">
                                                    <span class="new-price">$35.45</span>
                                                    <span class="old-price">$45.80</span>
                                                </div>
                                                <div class="product-list-rating-wrap">
                                                    <div class="product-list-rating">
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star gray"></i>
                                                        <i class="icon_star gray"></i>
                                                    </div>
                                                    <span>(3)</span>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipic it, sed do eiusmod tempor labor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                                <div class="product-list-action">
                                                    <button title="Add To Cart"><i class="icon-basket-loaded"></i></button>
                                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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