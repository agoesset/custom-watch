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
                <!-- Preview Container -->
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <div class="product-details-tab" id="previewContainer">
                        <div class="layer layer1">
                            <img id="preview-strap" style="display: none;" alt="">
                        </div>
                        <div class="layer layer2">
                            <img id="preview-dial" style="display: none;" alt="">
                        </div>
                        <div class="layer layer3">
                            <img id="preview-case" style="display: none;" alt="">
                        </div>
                        <div class="layer layer4">
                            <img id="preview-ring" style="display: none;" alt="">
                        </div>
                    </div>
                </div>

                <!-- Part Selection -->
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="dec-review-topbar nav mb-45">
                        <a class="active" data-bs-toggle="tab" href="#cases-tab">Cases</a>
                        <a class="d-none" data-bs-toggle="tab" href="#dials-tab">Dials</a>
                        <a class="d-none" data-bs-toggle="tab" href="#rings-tab">Rings</a>
                        <a class="d-none" data-bs-toggle="tab" href="#straps-tab">Straps</a>
                        <a data-bs-toggle="tab" href="#checkout-tab">Checkout</a>
                    </div>

                    <div class="tab-content dec-review-bottom">
                        <!-- Tab Cases -->
                        <div id="cases-tab" class="tab-pane active">
                            <div class="row" id="casesList">
                                @foreach($allCases as $case)
                                @if($case->watchTypes->isNotEmpty())
                                @php $watchType = $case->watchTypes->first(); @endphp
                                <div class="card part-item"
                                    data-type="cases"
                                    data-image="{{ asset('storage/' . $case->image) }}"
                                    data-watch-type-id="{{ $watchType->id }}"
                                    data-name="{{ $case->name }}"
                                    data-price="{{ $case->price }}">
                                    <div class="card-body text-center part-content">
                                        <img src="{{ asset('storage/' . $case->image) }}"
                                            alt="{{ $case->name }}"
                                            class="img-fluid mb-3">
                                        <h5 class="part-name">{{ $case->name }}</h5>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>

                        <!-- Tab Dials -->
                        <div id="dials-tab" class="tab-pane">
                            <div class="row" id="dialsList"></div>
                        </div>

                        <!-- Tab Rings -->
                        <div id="rings-tab" class="tab-pane">
                            <div class="row" id="ringsList"></div>
                        </div>

                        <!-- Tab Straps -->
                        <div id="straps-tab" class="tab-pane">
                            <div class="row" id="strapsList"></div>
                        </div>

                        <!-- Tab Checkout -->
                        <div id="checkout-tab" class="tab-pane">
                            <div class="checkout-content p-4">
                                <h4 class="mb-4">Detail Pesanan</h4>
                                <div id="selectedPartsPreview" class="selected-parts-container mb-4"></div>
                                <div class="total-price-container mb-4">
                                    <h5>Total Harga:</h5>
                                    <div id="totalPrice" class="h4 text-primary"></div>
                                </div>
                                <button id="checkoutButton" class="btn btn-primary">Lanjutkan ke WhatsApp</button>
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
                    margin: 10px 0;
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

                .selected-parts-container {
                    background: #f8f9fa;
                    border-radius: 8px;
                    padding: 20px;
                }

                .selected-part-item {
                    padding: 15px;
                    border-bottom: 1px solid #dee2e6;
                }

                .selected-part-item:last-child {
                    border-bottom: none;
                }

                .total-price-container {
                    text-align: right;
                    padding: 20px;
                    background: #f8f9fa;
                    border-radius: 8px;
                }

                @media (max-width: 768px) {

                    #casesList,
                    #dialsList,
                    #ringsList,
                    #strapsList {
                        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                    }
                }
            </style>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    let isLoading = false;

                    function formatPrice(price) {
                        return new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR',
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0
                        }).format(price);
                    }

                    function attachPartItemClickEvents() {
                        document.querySelectorAll('.part-item').forEach(item => {
                            item.addEventListener('click', handlePartClick);
                        });
                    }

                    function handlePartClick(event) {
                        if (isLoading) return;

                        const item = event.currentTarget;
                        const type = item.dataset.type;
                        const partData = {
                            image: item.dataset.image,
                            name: item.dataset.name,
                            price: parseFloat(item.dataset.price) || 0,
                            watchTypeId: item.dataset.watchTypeId
                        };

                        localStorage.setItem(`custom_${type}`, JSON.stringify(partData));
                        updatePartSelection(type, item);
                        updatePreview(type, partData.image);

                        if (type === 'cases' && partData.watchTypeId) {
                            loadRelatedParts(partData.watchTypeId);
                        }

                        updateCheckoutPreview();
                    }

                    function updatePartSelection(type, selectedItem) {
                        document.querySelectorAll(`.part-item[data-type="${type}"]`)
                            .forEach(item => item.classList.remove('active'));
                        selectedItem.classList.add('active');
                    }

                    function updatePreview(type, imageSrc) {
                        const previewId = `preview-${type.slice(0, -1)}`;
                        const previewElement = document.getElementById(previewId);
                        if (previewElement) {
                            previewElement.src = imageSrc;
                            previewElement.style.display = 'block';
                        }
                    }

                    async function loadRelatedParts(watchTypeId) {
                        if (isLoading) return;
                        isLoading = true;

                        try {
                            const response = await fetch(`/configurator/load-parts/${watchTypeId}`);
                            if (!response.ok) throw new Error('Network response was not ok');

                            const data = await response.json();

                            ['dials', 'rings', 'straps'].forEach(type => {
                                const tab = document.querySelector(`[href="#${type}-tab"]`);
                                if (tab) {
                                    tab.classList.toggle('d-none', !(data[type] && data[type].length > 0));
                                }
                            });

                            updatePartsLists(data);
                        } catch (error) {
                            console.error('Error loading parts:', error);
                        } finally {
                            isLoading = false;
                        }
                    }

                    function updatePartsLists(data) {
                        ['dials', 'rings', 'straps'].forEach(type => {
                            const container = document.getElementById(`${type}List`);
                            if (!container) return;

                            const items = data[type];
                            if (!items || !items.length) {
                                container.innerHTML = '<p>Tidak ada item tersedia</p>';
                                return;
                            }

                            container.innerHTML = items.map(item => `
                                <div class="card part-item"
                                     data-type="${type}"
                                     data-image="/storage/${item.image}"
                                     data-name="${item.name}"
                                     data-price="${item.price || 0}">
                                    <div class="card-body text-center part-content">
                                        <img src="/storage/${item.image}"
                                             alt="${item.name}"
                                             class="img-fluid mb-3">
                                        <h5 class="part-name">${item.name}</h5>
                                    </div>
                                </div>
                            `).join('');

                            attachPartItemClickEvents();
                        });
                    }

                    function updateCheckoutPreview() {
                        const container = document.getElementById('selectedPartsPreview');
                        let totalPrice = 0;
                        let html = '';

                        ['cases', 'dials', 'rings', 'straps'].forEach(type => {
                            const savedData = JSON.parse(localStorage.getItem(`custom_${type}`)) || {
                                name: 'Belum dipilih',
                                price: 0
                            };

                            totalPrice += savedData.price;

                            html += `
                                <div class="selected-part-item">
                                    <div class="part-details">
                                        <div>
                                            <strong>${type.charAt(0).toUpperCase() + type.slice(1, -1)}:</strong>
                                            ${savedData.name}
                                        </div>
                                        <div class="part-price">
                                            ${formatPrice(savedData.price)}
                                        </div>
                                    </div>
                                </div>
                            `;
                        });

                        container.innerHTML = html;
                        document.getElementById('totalPrice').textContent = formatPrice(totalPrice);
                    }

                    async function createMergedImage() {
                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');

                        canvas.width = 550;
                        canvas.height = 550;

                        const layers = ['strap', 'dial', 'case', 'ring'];

                        for (const layer of layers) {
                            const img = document.getElementById(`preview-${layer}`);
                            if (img && img.style.display !== 'none' && img.src) {
                                await new Promise((resolve, reject) => {
                                    const tempImg = new Image();
                                    tempImg.crossOrigin = "anonymous";
                                    tempImg.onload = () => {
                                        ctx.drawImage(tempImg, 0, 0, canvas.width, canvas.height);
                                        resolve();
                                    };
                                    tempImg.onerror = reject;
                                    tempImg.src = img.src;
                                });
                            }
                        }

                        return canvas.toDataURL('image/png');
                    }

                    async function handleCheckout() {
                        try {
                            const selectedParts = ['cases', 'dials', 'rings', 'straps'].reduce((acc, type) => {
                                const data = JSON.parse(localStorage.getItem(`custom_${type}`)) || {
                                    name: 'Belum dipilih',
                                    price: 0
                                };
                                acc[type] = data;
                                return acc;
                            }, {});

                            const totalPrice = Object.values(selectedParts)
                                .reduce((sum, part) => sum + part.price, 0);

                            const mergedImage = await createMergedImage();

                            const response = await fetch('/save-merged-image', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify({
                                    image: mergedImage
                                })
                            });

                            if (!response.ok) throw new Error('Failed to save merged image');

                            const result = await response.json();

                            const message = `Halo Admin,%0ASaya ingin custom jam dengan rincian:%0A%0A` +
                                `*Detail Komponen*%0A` +
                                `• Case: ${selectedParts.cases.name} (${formatPrice(selectedParts.cases.price)})%0A` +
                                `• Dial: ${selectedParts.dials.name} (${formatPrice(selectedParts.dials.price)})%0A` +
                                `• Ring: ${selectedParts.rings.name} (${formatPrice(selectedParts.rings.price)})%0A` +
                                `• Strap: ${selectedParts.straps.name} (${formatPrice(selectedParts.straps.price)})%0A%0A` +
                                `*Total: ${formatPrice(totalPrice)}*%0A%0A` +
                                `Preview Jam: ${result.imageUrl}`;

                            window.open(
                                `https://wa.me/6285804686544?text=${message}`,
                                '_blank'
                            );
                        } catch (error) {
                            console.error('Error during checkout:', error);
                            alert('Terjadi kesalahan saat checkout. Silakan coba lagi.');
                        }
                    }

                    // Initialize
                    attachPartItemClickEvents();
                    updateCheckoutPreview();

                    // Event Listeners
                    document.getElementById('checkoutButton')?.addEventListener('click', handleCheckout);

                    document.querySelectorAll('[data-bs-toggle="tab"]').forEach(tab => {
                        tab.addEventListener('shown.bs.tab', () => {
                            if (tab.getAttribute('href') === '#checkout-tab') {
                                updateCheckoutPreview();
                            }
                        });
                    });

                    // Load saved selections if any
                    function loadSavedSelections() {
                        ['cases', 'dials', 'rings', 'straps'].forEach(type => {
                            const saved = localStorage.getItem(`custom_${type}`);
                            if (saved) {
                                try {
                                    const data = JSON.parse(saved);
                                    updatePreview(type, data.image);

                                    const item = document.querySelector(
                                        `.part-item[data-type="${type}"][data-image="${data.image}"]`
                                    );
                                    if (item) {
                                        item.classList.add('active');
                                    }

                                    if (type === 'cases' && data.watchTypeId) {
                                        loadRelatedParts(data.watchTypeId);
                                    }
                                } catch (e) {
                                    console.error('Error loading saved selection:', e);
                                }
                            }
                        });
                        updateCheckoutPreview();
                    }

                    loadSavedSelections();
                });
            </script>
        </div>
    </div>
</div>
@endsection
