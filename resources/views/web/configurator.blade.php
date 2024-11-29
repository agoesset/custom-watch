@extends('web.base')
@section('title', 'Kustom Jam - Customwatch.id')
@section('content')

<div class="mt-100">
    <div class="breadcrumb-area bg-gray">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="active">Custom Jam</li>
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
                                <div class="card part-item"
                                    data-type="cases"
                                    data-image="{{ asset('storage/' . $case->image) }}"
                                    data-watch-type-id="{{ $watchType->id }}"
                                    data-price="{{ $case->price }}">
                                    <div class="card-body text-center part-content">
                                        <img src="{{ asset('storage/' . $case->image) }}" alt="{{ $case->name }}" class="img-fluid mb-3">
                                        <h5 class="part-name">{{ $case->name }}</h5>
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

            <style>
                .part-item {
                    cursor: pointer;
                    transition: all 0.3s ease;
                    border: 1px solid #e0e0e0;
                    border-radius: 8px;
                    margin: 10px;
                    background: white;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
                }

                .part-item:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                }

                .part-content {
                    padding: 20px;
                }

                .part-item img {
                    width: 120px;
                    height: 120px;
                    object-fit: contain;
                    margin: 0 auto;
                    display: block;
                }

                .part-name {
                    font-family: 'Poppins', sans-serif;
                    font-size: 16px;
                    font-weight: 500;
                    color: #333;
                    margin: 0;
                    text-transform: capitalize;
                    letter-spacing: 0.5px;
                }

                .part-item.active {
                    border: 2px solid #007bff;
                    background-color: #f8f9ff;
                }

                #casesList,
                #dialsList,
                #ringsList,
                #strapsList {
                    display: grid;
                    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                    gap: 20px;
                    padding: 20px;
                }
            </style>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Attach events to initial case items
                    attachPartItemClickEvents();

                    // Load saved parts if any
                    loadSelectedParts();

                    function attachPartItemClickEvents() {
                        document.querySelectorAll('.part-item').forEach(item => {
                            item.addEventListener('click', function() {
                                const type = this.getAttribute('data-type');
                                const image = this.getAttribute('data-image');
                                const name = this.querySelector('.part-name').textContent;
                                const price = this.getAttribute('data-price');
                                const watchTypeId = this.getAttribute('data-watch-type-id');

                                // Save selection
                                localStorage.setItem(`${type}-selected`, JSON.stringify({
                                    image,
                                    name,
                                    price,
                                    watchTypeId
                                }));

                                // Update UI
                                document.querySelectorAll(`.part-item[data-type="${type}"]`).forEach(part => {
                                    part.classList.remove('active');
                                });
                                this.classList.add('active');

                                // Update preview
                                updatePreview(type, image, name);

                                // Load related parts if it's a case
                                if (type === 'cases' && watchTypeId) {
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
                                updatePartsList('dials', data.dials);
                                updatePartsList('rings', data.rings);
                                updatePartsList('straps', data.straps);
                            })
                            .catch(error => console.error('Error loading parts:', error));
                    }

                    function updatePartsList(type, items) {
                        const container = document.getElementById(`${type}List`);
                        if (!container) return;

                        container.innerHTML = '';

                        if (items && items.length > 0) {
                            items.forEach(item => {
                                const div = document.createElement('div');
                                div.className = 'card part-item';
                                div.setAttribute('data-type', type);
                                div.setAttribute('data-image', '/storage/' + item.image);
                                div.setAttribute('data-price', item.price || 0);

                                div.innerHTML = `
                                    <div class="card-body text-center part-content">
                                        <img src="/storage/${item.image}" alt="${item.name}" class="img-fluid mb-3">
                                        <h5 class="part-name">${item.name}</h5>
                                    </div>
                                `;

                                container.appendChild(div);
                            });

                            // Attach events to new items
                            container.querySelectorAll('.part-item').forEach(item => {
                                attachPartItemClickEvents();
                            });
                        }
                    }

                    function loadSelectedParts() {
                        ['cases', 'dials', 'rings', 'straps'].forEach(type => {
                            const selectedData = JSON.parse(localStorage.getItem(`${type}-selected`));
                            if (selectedData) {
                                updatePreview(type, selectedData.image, selectedData.name);

                                // Also highlight the selected item
                                const selectedItem = document.querySelector(
                                    `.part-item[data-type="${type}"][data-image="${selectedData.image}"]`
                                );
                                if (selectedItem) {
                                    selectedItem.classList.add('active');
                                }
                            }
                        });
                    }

                    // Checkout handler
                    const checkoutButton = document.getElementById('checkoutButton');
                    if (checkoutButton) {
                        checkoutButton.addEventListener('click', async function() {
                            try {
                                // Check if any part is selected
                                const hasSelectedParts = ['cases', 'dials', 'rings', 'straps'].some(type =>
                                    localStorage.getItem(`${type}-selected`)
                                );

                                if (!hasSelectedParts) {
                                    alert('Silakan pilih minimal satu part jam terlebih dahulu');
                                    return;
                                }

                                // Create merged image
                                const canvas = document.getElementById('mergedCanvas');
                                const ctx = canvas.getContext('2d');

                                canvas.width = 550;
                                canvas.height = 550;

                                // Load and draw each layer
                                for (const part of ['strap', 'dial', 'case', 'ring']) {
                                    const img = document.getElementById(`preview-${part}`);
                                    if (img && img.style.display !== 'none' && img.src) {
                                        await new Promise((resolve) => {
                                            const tempImg = new Image();
                                            tempImg.crossOrigin = "anonymous";
                                            tempImg.onload = () => {
                                                ctx.drawImage(tempImg, 0, 0, canvas.width, canvas.height);
                                                resolve();
                                            };
                                            tempImg.src = img.src;
                                        });
                                    }
                                }

                                // Get selected parts data
                                const selectedParts = {
                                    case: JSON.parse(localStorage.getItem('cases-selected')) || {
                                        name: "Tidak Dipilih",
                                        price: 0
                                    },
                                    dial: JSON.parse(localStorage.getItem('dials-selected')) || {
                                        name: "Tidak Dipilih",
                                        price: 0
                                    },
                                    ring: JSON.parse(localStorage.getItem('rings-selected')) || {
                                        name: "Tidak Dipilih",
                                        price: 0
                                    },
                                    strap: JSON.parse(localStorage.getItem('straps-selected')) || {
                                        name: "Tidak Dipilih",
                                        price: 0
                                    }
                                };

                                // Calculate total price
                                const totalPrice = Object.values(selectedParts)
                                    .reduce((sum, part) => sum + (parseFloat(part.price) || 0), 0);

                                // Format price function
                                const formatPrice = price => new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR',
                                    minimumFractionDigits: 0,
                                    maximumFractionDigits: 0
                                }).format(price);

                                // Save merged image
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

                                // Prepare WhatsApp message
                                const message = `Halo Admin,%0ASaya ingin custom jam dengan rincian:%0A%0A` +
                                    `*Detail Part*%0A` +
                                    `• Case: ${selectedParts.case.name}%0A` +
                                    `• Dial: ${selectedParts.dial.name}%0A` +
                                    `• Ring: ${selectedParts.ring.name}%0A` +
                                    `• Strap: ${selectedParts.strap.name}%0A%0A` +
                                    `*Rincian Harga*%0A` +
                                    `• Case: ${formatPrice(selectedParts.case.price)}%0A` +
                                    `• Dial: ${formatPrice(selectedParts.dial.price)}%0A` +
                                    `• Ring: ${formatPrice(selectedParts.ring.price)}%0A` +
                                    `• Strap: ${formatPrice(selectedParts.strap.price)}%0A` +
                                    `━━━━━━━━━━━━━━%0A` +
                                    `*Total: ${formatPrice(totalPrice)}*%0A%0A` +
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
                });
            </script>
        </div>
    </div>
</div>
@endsection