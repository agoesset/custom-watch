@extends('web.base')
@section('title', 'Kustom Jam - Customwatch.id')
@section('content')

<div class="mt-100">
    <div class="breadcrumb-area bg-gray">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="active">Kustom Jam </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="product-details-area pt-120 pb-115">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <!-- Bagian Kiri: Preview Jam -->
                    <div class="product-details-tab" id="previewContainer">
                        <!-- Layer paling bawah: Strap -->
                        @if($straps->isNotEmpty())
                        <div class="layer layer1">
                            <img src="{{ asset('storage/' . $straps->first()->image) }}" id="preview-strap" alt="Strap Layer">
                        </div>
                        @endif

                        <!-- Setelah itu: Dial -->
                        @if($dials->isNotEmpty())
                        <div class="layer layer2">
                            <img src="{{ asset('storage/' . $dials->first()->image) }}" id="preview-dial" alt="Dial Layer">
                        </div>
                        @endif

                        <!-- Setelah itu: Case -->
                        @if($allCases->isNotEmpty())
                        <div class="layer layer3">
                            <img src="{{ asset('storage/' . $allCases->first()->image) }}" id="preview-case" alt="Case Layer">
                        </div>
                        @endif

                        <!-- Layer paling atas: Ring -->
                        @if($rings->isNotEmpty())
                        <div class="layer layer4">
                            <img src="{{ asset('storage/' . $rings->first()->image) }}" id="preview-ring" alt="Ring Layer">
                        </div>
                        @endif
                    </div>

                </div>

                <!-- Bagian Kanan: Tab untuk Memilih Part -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="dec-review-topbar nav mb-45">
                        @if($allCases->isNotEmpty())
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
                        @if($allCases->isNotEmpty())
                        <div id="cases-tab" class="tab-pane active">
                            <div class="row" id="casesList">
                                @foreach($allCases as $case)
                                @if($case->watchTypes->isNotEmpty())
                                @php $watchType = $case->watchTypes->first(); @endphp
                                <div class="col-md-3 mb-3">
                                    <div class="card part-item" data-type="cases" data-image="{{ asset('storage/' . $case->image) }}" data-watch-type-id="{{ $watchType->id }}">
                                        <div class="card-body text-center">
                                            <img src="{{ asset('storage/' . $case->image) }}" alt="{{ $case->name }}" class="img-fluid mb-2" style="max-width: 80px;">
                                            <li class="list-unstyled mt-2">{{ $case->name }}</li>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Tab untuk Dials, Rings, Straps -->
                        <div id="dials-tab" class="tab-pane">
                            <div class="row" id="dialsList"></div>
                        </div>

                        <div id="rings-tab" class="tab-pane">
                            <div class="row" id="ringsList"></div>
                        </div>

                        <div id="straps-tab" class="tab-pane">
                            <div class="row" id="strapsList"></div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    function attachPartItemClickEvents() {
                        document.querySelectorAll('.part-item').forEach(item => {
                            item.addEventListener('click', function() {
                                const type = this.getAttribute('data-type');
                                const image = this.getAttribute('data-image');

                                document.querySelectorAll('.part-item').forEach(part => {
                                    part.classList.remove('active');
                                });
                                this.classList.add('active');

                                // Update gambar preview berdasarkan tipe
                                if (type === 'cases') {
                                    document.getElementById('preview-case').src = image;
                                } else if (type === 'dials') {
                                    document.getElementById('preview-dial').src = image;
                                } else if (type === 'rings') {
                                    document.getElementById('preview-ring').src = image;
                                } else if (type === 'straps') {
                                    document.getElementById('preview-strap').src = image;
                                }

                                const watchTypeId = this.getAttribute('data-watch-type-id');
                                if (watchTypeId) {
                                    loadParts(watchTypeId);
                                }
                            });
                        });
                    }

                    function loadParts(watchTypeId) {
                        fetch(`/configurator/load-parts/${watchTypeId}`)
                            .then(response => response.json())
                            .then(data => {
                                // Update dials
                                const dialsList = document.getElementById('dialsList');
                                dialsList.innerHTML = '';
                                data.dials.forEach(dial => {
                                    dialsList.innerHTML += `
                                    <div class="col-md-3 mb-3">
                                        <div class="card part-item" data-type="dials" data-image="/storage/${dial.image}">
                                            <div class="card-body text-center">
                                                <img src="/storage/${dial.image}" alt="${dial.name}" class="img-fluid mb-2" style="max-width: 80px;">
                                                <li class="list-unstyled mt-2">${dial.name}</li>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                });

                                // Update rings
                                const ringsList = document.getElementById('ringsList');
                                ringsList.innerHTML = '';
                                data.rings.forEach(ring => {
                                    ringsList.innerHTML += `
                                    <div class="col-md-3 mb-3">
                                        <div class="card part-item" data-type="rings" data-image="/storage/${ring.image}">
                                            <div class="card-body text-center">
                                                <img src="/storage/${ring.image}" alt="${ring.name}" class="img-fluid mb-2" style="max-width: 80px;">
                                                <li class="list-unstyled mt-2">${ring.name}</li>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                });

                                // Update straps
                                const strapsList = document.getElementById('strapsList');
                                strapsList.innerHTML = '';
                                data.straps.forEach(strap => {
                                    strapsList.innerHTML += `
                                    <div class="col-md-3 mb-3">
                                        <div class="card part-item" data-type="straps" data-image="/storage/${strap.image}">
                                            <div class="card-body text-center">
                                                <img src="/storage/${strap.image}" alt="${strap.name}" class="img-fluid mb-2" style="max-width: 80px;">
                                                <li class="list-unstyled mt-2">${strap.name}</li>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                });

                                attachPartItemClickEvents();
                            })
                            .catch(error => {
                                console.error('Error loading parts:', error);
                            });
                    }

                    attachPartItemClickEvents();
                });
            </script>
        </div>
    </div>
</div>

@endsection