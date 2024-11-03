@extends('web.base')
@section('title', 'Configurator - Customwatch.id')
@section('content')
<div class="product-details-area pt-120 pb-115">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab">
                    <div class="layer layer1">
                        <img src="{{('assets/images/1.png')}}" id="case" alt="Layer 1">
                    </div>

                    <div class="layer layer2">
                        <img src="{{('assets/images/2.png')}}" id="dial" alt="Layer 2">
                    </div>

                    <div class="layer layer3">
                        <img src="{{('assets/images/4.png')}}" id="hand" alt="Layer 3">
                    </div>

                    <div class="layer layer4">
                        <img src="{{('assets/images/3.png')}}" id="second-hand" alt="Layer 4">
                    </div>

                    <div class="layer layer5">
                        <img src="" id="bracelet" alt="Layer 5">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="dec-review-topbar nav mb-45">
                    <a class="active" data-bs-toggle="tab" href="#des-details1">Cases</a>
                    <a data-bs-toggle="tab" href="#des-details2">Dials</a>
                    <a data-bs-toggle="tab" href="#des-details3">Hands</a>
                    <a data-bs-toggle="tab" href="#des-details4">Second Hands</a>
                    <a data-bs-toggle="tab" href="#des-details4">Bracelet</a>
                </div>
                <div class="tab-content dec-review-bottom">
                    <div id="des-details1" class="tab-pane active">
                        <div class="row">
                            @foreach ($cases as $case)
                            <div class="specification-wrap table-responsive">
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <!-- Membatasi ukuran gambar maksimal 50px menggunakan inline style -->
                                            <img src="{{ asset('storage/' . $case->image) }}" alt="{{ $case->name }}" class="img-fluid">
                                            <li class="list-unstyled mt-2">{{$case->name}}</li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div id="des-details2" class="tab-pane">
                        <div class="row">
                            @foreach ($dials as $dial)
                            <div class="specification-wrap table-responsive">
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <!-- Membatasi ukuran gambar maksimal 50px menggunakan inline style -->
                                            <img src="{{ asset('storage/' . $dial->image) }}" alt="{{ $dial->name }}" class="img-fluid">
                                            <li class="list-unstyled mt-2">{{$dial->name}}</li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="des-details3" class="tab-pane">
                        <div class="specification-wrap table-responsive">

                        </div>
                    </div>
                    <div id="des-details4" class="tab-pane">
                        <div class="review-wrapper">
                            <div class="single-review">
                                @foreach ($cases as $case)
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <!-- Membatasi ukuran gambar maksimal 50px menggunakan inline style -->
                                            <img src="{{ asset('storage/' . $case->image) }}" alt="{{ $case->name }}" class="img-fluid">
                                            <li class="list-unstyled mt-2">{{$case->name}}</li>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection