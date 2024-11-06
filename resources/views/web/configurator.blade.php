@extends('web.base')
@section('title', 'Custom Jam - Customwatch.id')
@section('content')

<div class="product-details-area pt-120 pb-115">
    <div class="container">
        <div class="row mt-5">
            <!-- Bagian Kiri: Preview Jam -->
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab" id="previewContainer">
                    <!-- Layer Preview untuk masing-masing Part -->

                    @if($cases->isNotEmpty())
                    <div class="layer layer1">
                        <img src="{{ asset('storage/' . $cases->first()->image) }}" id="preview-case" alt="Case Layer">
                    </div>
                    @endif
                    @if($dials->isNotEmpty())
                    <div class="layer layer2">
                        <img src="{{ asset('storage/' . $dials->first()->image) }}" id="preview-dial" alt="Dial Layer">
                    </div>
                    @endif
                    @if($rings->isNotEmpty())
                    <div class="layer layer3">
                        <img src="{{ asset('storage/' . $rings->first()->image) }}" id="preview-ring" alt="Ring Layer">
                    </div>
                    @endif
                    @if($straps->isNotEmpty())
                    <div class="layer layer4">
                        <img src="{{ asset('storage/' . $straps->first()->image) }}" id="preview-strap" alt="Strap Layer">
                    </div>
                    @endif

                </div>
            </div>

            <!-- Bagian Kanan: Tab untuk Memilih Part -->
            <div class="col-lg-6 col-md-6">
                <!-- Navigasi Tab -->
                <div class="dec-review-topbar nav mb-45">
                    @if($cases->isNotEmpty())
                    <a class="active" data-bs-toggle="tab" href="#cases-tab">Cases</a>
                    @endif
                    @if($dials->isNotEmpty())
                    <a data-bs-toggle="tab" href="#dials-tab">Dials</a>
                    @endif
                    @if($rings->isNotEmpty())
                    <a data-bs-toggle="tab" href="#rings-tab">Rings</a>
                    @endif
                    @if($straps->isNotEmpty())
                    <a data-bs-toggle="tab" href="#straps-tab">Straps</a>
                    @endif
                </div>

                <!-- Konten Tab -->
                <div class="tab-content dec-review-bottom">
                    <!-- Tab untuk Cases -->
                    @if($cases->isNotEmpty())
                    <div id="cases-tab" class="tab-pane active">
                        <div class="row" id="casesList">
                            @foreach($cases as $case)
                            <div class="col-md-3 mb-3">
                                <div class="card part-item" data-type="cases" data-image="{{ asset('storage/' . $case->image) }}">
                                    <div class="card-body text-center">
                                        <img src="{{ asset('storage/' . $case->image) }}" alt="{{ $case->name }}" class="img-fluid mb-2" style="max-width: 80px;">
                                        <li class="list-unstyled mt-2">{{ $case->name }}</li>
                                    </div>
                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Tab untuk Dials -->
                    @if($dials->isNotEmpty())
                    <div id="dials-tab" class="tab-pane">
                        <div class="row" id="dialsList">
                            @foreach($dials as $dial)
                            <div class="col-md-3 mb-3">
                                <div class="card part-item" data-type="dials" data-image="{{ asset('storage/' . $dial->image) }}">
                                    <div class="card-body text-center">
                                        <img src="{{ asset('storage/' . $dial->image) }}" alt="{{ $dial->name }}" class="img-fluid mb-2" style="max-width: 80px;">
                                        <li class="list-unstyled mt-2">{{ $dial->name }}</li>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Tab untuk Rings -->
                        @if($rings->isNotEmpty())
                        <div id="rings-tab" class="tab-pane">
                            <div class="row" id="ringsList">
                                @foreach($rings as $ring)
                                <div class="col-md-3 mb-3">
                                    <div class="card part-item" data-type="rings" data-image="{{ asset('storage/' . $ring->image) }}">
                                        <div class="card-body text-center">
                                            <img src="{{ asset('storage/' . $ring->image) }}" alt="{{ $ring->name }}" class="img-fluid mb-2" style="max-width: 80px;">
                                            <li class="list-unstyled mt-2">{{ $ring->name }}</li>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            <!-- Tab untuk Straps -->
                            @if($straps->isNotEmpty())
                            <div id="straps-tab" class="tab-pane">
                                <div class="row" id="strapsList">
                                    @foreach($straps as $strap)
                                    <div class="col-md-3 mb-3">
                                        <div class="card part-item" data-type="straps" data-image="{{ asset('storage/' . $strap->image) }}">
                                            <div class="card-body text-center">
                                                <img src="{{ asset('storage/' . $strap->image) }}" alt="{{ $strap->name }}" class="img-fluid mb-2" style="max-width: 80px;">
                                                <li class="list-unstyled mt-2">{{ $strap->name }}</li>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.querySelectorAll('.part-item').forEach(item => {
                        item.addEventListener('click', function() {
                            // Hapus kelas 'active' dari semua .part-item
                            document.querySelectorAll('.part-item').forEach(part => {
                                part.classList.remove('active');
                            });

                            // Tambahkan kelas 'active' ke item yang diklik
                            this.classList.add('active');

                            // Perbarui gambar preview
                            const type = this.getAttribute('data-type');
                            const image = this.getAttribute('data-image');

                            if (type === 'cases' && document.getElementById('preview-case')) {
                                document.getElementById('preview-case').src = image;
                            } else if (type === 'dials' && document.getElementById('preview-dial')) {
                                document.getElementById('preview-dial').src = image;
                            } else if (type === 'rings' && document.getElementById('preview-ring')) {
                                document.getElementById('preview-ring').src = image;
                            } else if (type === 'straps' && document.getElementById('preview-strap')) {
                                document.getElementById('preview-strap').src = image;
                            }
                        });
                    });
                });
            </script>
            @endsection
