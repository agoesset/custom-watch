@extends('web.base')
@section('title', 'Kustom Jam - Customwatch.id')
@section('content')

<div class="mt-100">
    <div class="breadcrumb-area bg-gray">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li>
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li class="active">Custom Jam </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="product-details-area pt-120 pb-115">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <!-- Bagian Kiri: Preview Jam -->
                    <div class="product-details-tab" id="previewContainer">
                        <!-- Layer paling bawah: Strap -->
                        @if($straps->isNotEmpty())
                        <div class="layer layer1">
                            <img src="{{ $straps->first()->image }}" id="preview-strap" alt="{{ $straps->first()->name }}">
                        </div>
                        @endif

                        <!-- Setelah itu: Dial -->
                        @if($dials->isNotEmpty())
                        <div class="layer layer2">
                            <img src="{{ $dials->first()->image }}" id="preview-dial" alt="{{ $dials->first()->name }}">
                        </div>
                        @endif

                        <!-- Setelah itu: Case -->
                        @if($allCases->isNotEmpty())
                        <div class="layer layer3">
                            <img src="{{ $allCases->first()->image }}" id="preview-case" alt="{{ $allCases->first()->name }}">
                        </div>
                        @endif

                        <!-- Layer paling atas: Ring -->
                        @if($rings->isNotEmpty())
                        <div class="layer layer4">
                            <img src="{{ $rings->first()->image }}" id="preview-ring" alt="{{ $rings->first()->name }}">
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Bagian Kanan: Tab untuk Memilih Part -->
                <div class="col-lg-7 col-md-7 col-sm-12">
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
                        <a data-bs-toggle="tab" href="#checkout-tab">Checkout</a>
                    </div>

                    <!-- Konten Tab -->
                    <div class="tab-content dec-review-bottom">
                        <!-- Tab untuk Cases -->
                        @if($allCases->isNotEmpty())
                        <div id="cases-tab" class="tab-pane active">
                            <div class="row" id="casesList">
                                @foreach($allCases as $case)
                                @if($case->watchTypes->isNotEmpty())
                                @php
                                $watchType = $case->watchTypes->first();
                                @endphp
                                <div class="card part-item" data-type="cases" data-image="{{ $case->image }}" data-watch-type-id="{{ $watchType->id }}">
                                    <div class="card-body text-center">
                                        <!-- Gambar menggunakan accessor -->
                                        <img src="{{ $case->image }}" alt="{{ $case->name }}" class="img-fluid mb-2" style="max-width: 80px;">
                                        <li class="list-unstyled mt-2">{{ $case->name }}</li>
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

                        <div id="checkout-tab" class="tab-pane">
                            <div class="text-center">
                                <button id="checkoutButton" class="btn btn-primary mt-3">Checkout</button>
                            </div>
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
                                const name = this.querySelector('li').textContent; // Ambil nama dari elemen <li>
                                const watchTypeId = this.getAttribute('data-watch-type-id');

                                // Simpan status pilihan di localStorage
                                localStorage.setItem(`${type}-selected`, JSON.stringify({
                                    image,
                                    name,
                                    watchTypeId
                                }));

                                document.querySelectorAll('.part-item').forEach(part => {
                                    part.classList.remove('active');
                                });
                                this.classList.add('active');

                                // Update gambar dan alt text berdasarkan tipe
                                if (type === 'cases') {
                                    const caseImg = document.getElementById('preview-case');
                                    caseImg.src = image;
                                    caseImg.alt = name;
                                } else if (type === 'dials') {
                                    const dialImg = document.getElementById('preview-dial');
                                    dialImg.src = image;
                                    dialImg.alt = name;
                                } else if (type === 'rings') {
                                    const ringImg = document.getElementById('preview-ring');
                                    ringImg.src = image;
                                    ringImg.alt = name;
                                } else if (type === 'straps') {
                                    const strapImg = document.getElementById('preview-strap');
                                    strapImg.src = image;
                                    strapImg.alt = name;
                                }

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
                                        <div class="card part-item" data-type="dials" data-image="${dial.image}">
                                            <div class="card-body text-center">
                                                <img src="${dial.image}" alt="${dial.name}" class="img-fluid mb-2" style="max-width: 80px;">
                                                <li class="list-unstyled mt-2">${dial.name}</li>
                                            </div>
                                        </div>
                                `;
                                });

                                // Update rings
                                const ringsList = document.getElementById('ringsList');
                                ringsList.innerHTML = '';
                                data.rings.forEach(ring => {
                                    ringsList.innerHTML += `
                                        <div class="card part-item" data-type="rings" data-image="${ring.image}">
                                            <div class="card-body text-center">
                                                <img src="${ring.image}" alt="${ring.name}" class="img-fluid mb-2" style="max-width: 80px;">
                                                <li class="list-unstyled mt-2">${ring.name}</li>
                                            </div>
                                        </div>
                                `;
                                });

                                // Update straps
                                const strapsList = document.getElementById('strapsList');
                                strapsList.innerHTML = '';
                                data.straps.forEach(strap => {
                                    strapsList.innerHTML += `
                                        <div class="card part-item" data-type="straps" data-image="${strap.image}">
                                            <div class="card-body text-center">
                                                <img src="${strap.image}" alt="${strap.name}" class="img-fluid mb-2" style="max-width: 80px;">
                                                <li class="list-unstyled mt-2">${strap.name}</li>
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

                    function loadSelectedParts() {
                        const caseData = JSON.parse(localStorage.getItem('cases-selected'));
                        if (caseData) {
                            document.getElementById('preview-case').src = caseData.image;
                        }

                        const dialData = JSON.parse(localStorage.getItem('dials-selected'));
                        if (dialData) {
                            document.getElementById('preview-dial').src = dialData.image;
                        }

                        const ringData = JSON.parse(localStorage.getItem('rings-selected'));
                        if (ringData) {
                            document.getElementById('preview-ring').src = ringData.image;
                        }

                        const strapData = JSON.parse(localStorage.getItem('straps-selected'));
                        if (strapData) {
                            document.getElementById('preview-strap').src = strapData.image;
                        }
                    }

                    loadSelectedParts();

                    const checkoutButton = document.getElementById('checkoutButton');
                    checkoutButton.addEventListener('click', function() {
                        const selectedParts = {
                            case: JSON.parse(localStorage.getItem('cases-selected'))?.name || "Tidak Dipilih",
                            dial: JSON.parse(localStorage.getItem('dials-selected'))?.name || "Tidak Dipilih",
                            ring: JSON.parse(localStorage.getItem('rings-selected'))?.name || "Tidak Dipilih",
                            strap: JSON.parse(localStorage.getItem('straps-selected'))?.name || "Tidak Dipilih",
                            caseImage: JSON.parse(localStorage.getItem('cases-selected'))?.image || "Tidak Dipilih",
                            dialImage: JSON.parse(localStorage.getItem('dials-selected'))?.image || "Tidak Dipilih",
                            ringImage: JSON.parse(localStorage.getItem('rings-selected'))?.image || "Tidak Dipilih",
                            strapImage: JSON.parse(localStorage.getItem('straps-selected'))?.image || "Tidak Dipilih",
                        };

                        const message = `Halo Admin,%0ASaya ingin custom jam dengan rincian:%0A` +
                            `- Case: ${selectedParts.case} = ${selectedParts.caseImage}%0A` +
                            `- Dial: ${selectedParts.dial} = ${selectedParts.dialImage}%0A` +
                            `- Ring: ${selectedParts.ring} = ${selectedParts.ringImage}%0A` +
                            `- Strap: ${selectedParts.strap} = ${selectedParts.strapImage}`;

                        const whatsappNumber = "6285804686544"; // Format: kode negara tanpa "+"
                        const whatsappURL = `https://wa.me/${whatsappNumber}?text=${message}`;

                        window.open(whatsappURL, '_blank');
                    });

                    attachPartItemClickEvents();
                });
            </script>
        </div>
    </div>
</div>
@endsection
