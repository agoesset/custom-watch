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
                            <img id="preview-strap" style="display: none;">
                        </div>
                        @endif

                        <!-- Setelah itu: Dial -->
                        @if($dials->isNotEmpty())
                        <div class="layer layer2">
                            <img id="preview-dial" style="display: none;">
                        </div>
                        @endif

                        <!-- Setelah itu: Case -->
                        @if($allCases->isNotEmpty())
                        <div class="layer layer3">
                            <img id="preview-case" style="display: none;">
                        </div>
                        @endif

                        <!-- Layer paling atas: Ring -->
                        @if($rings->isNotEmpty())
                        <div class="layer layer4">
                            <img id="preview-ring" style="display: none;">
                        </div>
                        @endif
                    </div>
                    <!-- Canvas untuk merged image -->
                    <canvas id="mergedCanvas" style="display: none;"></canvas>
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
                                <div class="card part-item" data-type="cases" data-image="{{ asset('storage/' . $case->image) }}" data-watch-type-id="{{ $watchType->id }}">
                                    <div class="card-body text-center">
                                        <img src="{{ asset('storage/' . $case->image) }}" alt="{{ $case->name }}" class="img-fluid mb-2" style="max-width: 80px;">
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
                                const name = this.querySelector('li').textContent;
                                const watchTypeId = this.getAttribute('data-watch-type-id');

                                localStorage.setItem(`${type}-selected`, JSON.stringify({
                                    image,
                                    name,
                                    watchTypeId
                                }));

                                document.querySelectorAll('.part-item').forEach(part => {
                                    part.classList.remove('active');
                                });
                                this.classList.add('active');

                                updatePreview(type, image, name);

                                if (watchTypeId) {
                                    loadParts(watchTypeId);
                                }
                            });
                        });
                    }

                    function updatePreview(type, image, name) {
                        const elementMap = {
                            'cases': 'preview-case',
                            'dials': 'preview-dial',
                            'rings': 'preview-ring',
                            'straps': 'preview-strap'
                        };

                        const previewElement = document.getElementById(elementMap[type]);
                        if (previewElement) {
                            previewElement.src = image;
                            previewElement.alt = name;
                            previewElement.style.display = 'block';
                        }
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
                                        <div class="card part-item" data-type="dials" data-image="${'/storage/' + dial.image}">
                                            <div class="card-body text-center">
                                                <img src="${'/storage/' + dial.image}" alt="${dial.name}" class="img-fluid mb-2" style="max-width: 80px;">
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
                                        <div class="card part-item" data-type="rings" data-image="${'/storage/' + ring.image}">
                                            <div class="card-body text-center">
                                                <img src="${'/storage/' + ring.image}" alt="${ring.name}" class="img-fluid mb-2" style="max-width: 80px;">
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
                                        <div class="card part-item" data-type="straps" data-image="${'/storage/' + strap.image}">
                                            <div class="card-body text-center">
                                                <img src="${'/storage/' + strap.image}" alt="${strap.name}" class="img-fluid mb-2" style="max-width: 80px;">
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
                        const selectedTypes = ['cases', 'dials', 'rings', 'straps'];
                        selectedTypes.forEach(type => {
                            const selectedData = JSON.parse(localStorage.getItem(`${type}-selected`));
                            if (selectedData) {
                                updatePreview(type, selectedData.image, selectedData.name);
                            }
                        });
                    }

                    const checkoutButton = document.getElementById('checkoutButton');
                    if (checkoutButton) {
                        checkoutButton.addEventListener('click', async function() {
                            try {
                                // Cek apakah ada part yang dipilih
                                const hasSelectedParts = ['cases', 'dials', 'rings', 'straps'].some(type =>
                                    localStorage.getItem(`${type}-selected`)
                                );

                                if (!hasSelectedParts) {
                                    alert('Silakan pilih minimal satu part jam terlebih dahulu');
                                    return;
                                }

                                const canvas = document.getElementById('mergedCanvas');
                                const ctx = canvas.getContext('2d');

                                canvas.width = 550;
                                canvas.height = 550;

                                // Fungsi untuk memuat gambar yang dimodifikasi
                                const loadImage = (src) => {
                                    return new Promise((resolve, reject) => {
                                        if (!src || src === "undefined") {
                                            resolve(null);
                                            return;
                                        }
                                        const img = new Image();
                                        img.crossOrigin = "anonymous"; // Perbaiki ke lowercase
                                        img.onload = () => resolve(img);
                                        img.onerror = (e) => {
                                            console.error('Error loading image:', src, e);
                                            reject(new Error(`Failed to load image: ${src}`));
                                        };
                                        img.src = src;
                                    });
                                };

                                // Load gambar secara berurutan
                                const layers = [{
                                        type: 'strap',
                                        element: document.getElementById('preview-strap')
                                    },
                                    {
                                        type: 'dial',
                                        element: document.getElementById('preview-dial')
                                    },
                                    {
                                        type: 'case',
                                        element: document.getElementById('preview-case')
                                    },
                                    {
                                        type: 'ring',
                                        element: document.getElementById('preview-ring')
                                    }
                                ];

                                // Gambar setiap layer
                                for (const layer of layers) {
                                    if (layer.element && layer.element.style.display !== 'none' && layer.element.src) {
                                        try {
                                            const img = await loadImage(layer.element.src);
                                            if (img) {
                                                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                                            }
                                        } catch (e) {
                                            console.error(`Error loading ${layer.type}:`, e);
                                        }
                                    }
                                }

                                const mergedImage = canvas.toDataURL('image/png');
                                const formData = new FormData();
                                formData.append('image', mergedImage);

                                const response = await fetch('/save-merged-image', {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                        'Accept': 'application/json'
                                    },
                                    body: formData
                                });

                                const data = await response.json();

                                const selectedParts = {
                                    case: JSON.parse(localStorage.getItem('cases-selected'))?.name || "Tidak Dipilih",
                                    dial: JSON.parse(localStorage.getItem('dials-selected'))?.name || "Tidak Dipilih",
                                    ring: JSON.parse(localStorage.getItem('rings-selected'))?.name || "Tidak Dipilih",
                                    strap: JSON.parse(localStorage.getItem('straps-selected'))?.name || "Tidak Dipilih",
                                };

                                const message = `Halo Admin,%0ASaya ingin custom jam dengan rincian:%0A` +
                                    `- Case: ${selectedParts.case}%0A` +
                                    `- Dial: ${selectedParts.dial}%0A` +
                                    `- Ring: ${selectedParts.ring}%0A` +
                                    `- Strap: ${selectedParts.strap}%0A%0A` +
                                    `Preview: ${data.imageUrl}`;

                                const whatsappNumber = "6285804686544";
                                const whatsappURL = `https://wa.me/${whatsappNumber}?text=${message}`;

                                window.open(whatsappURL, '_blank');
                            } catch (error) {
                                console.error('Error:', error);
                                alert('Terjadi kesalahan: ' + error.message);
                            }
                        });
                    }

                    // Initialize
                    loadSelectedParts();
                    attachPartItemClickEvents();
                });
            </script>
        </div>
    </div>
</div>
@endsection