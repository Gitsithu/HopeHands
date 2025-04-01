<style>
    /* Add this to your existing styles */
    .floating-button {
        animation: float 3s ease-in-out infinite;
        background: #44991a;
    }

    @keyframes float {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-5px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    .floating-button:hover {
        animation: none;
    }

    .error-text {
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    input:invalid,
    select:invalid {
        border-color: #ef4444;
    }

    input:invalid:focus,
    select:invalid:focus {
        border-color: #ef4444;
        box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.2);
    }

    .aspect-w-16 {
        position: relative;
        padding-bottom: 56.25%;
        /* 16:9 Aspect Ratio */
    }

    .aspect-w-16>* {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<div class="mt-6">
    <!-- Search Results Container -->
    <div id="results-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"></div>

    <!-- Pagination -->
    <div id="pagination-container" class="mt-8 flex justify-center items-center gap-2"></div>

    <!-- Loading Indicator -->
    <div id="loading-indicator" class="text-center py-8 hidden">
        <div
            class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-blue-600 border-r-transparent">
        </div>
        <p class="mt-2 text-gray-600">Loading help seekers...</p>
    </div>
    <button onclick="openCreateModal()"
        class="floating-button fixed bottom-6 right-6 flex items-center justify-center w-14 h-14 rounded-full bg-blue-600 text-white bg-[#44991a] hover:bg-blue-700 transition shadow-lg z-40">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
    </button>
</div>

<!-- Detail Modal -->
<!-- Detail Modal -->
<div id="helpSeekerModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <!-- Background Overlay -->
    <div class="absolute inset-0 bg-black/70 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>

    <!-- Modal Content -->
    <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-4xl mx-4 max-h-[90vh] overflow-y-auto">
        <!-- Sticky Close Button -->
        <div class="sticky top-0 flex justify-end bg-white p-3 z-10 shadow-md">
            <button onclick="closeModal()" class="p-2 bg-red-500 rounded-full hover:bg-red-600 transition">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="p-8">
            <!-- Thumbnail Image -->
            <div id="thumbnailContainer" class="mb-6 rounded-lg overflow-hidden flex justify-center">
                <img id="modalThumbnail" src="{{ asset('frontend/assets/images/no-image.jpg') }}" alt="Article image"
                    class="w-full max-w-3xl h-80 object-contain rounded-lg shadow-md">
            </div>

            <!-- Article Header -->
            <div class="mb-6 text-center ">
                <h3 class="text-3xl font-bold text-gray-900 leading-snug" id="modalName"></h3>
                <div class="flex items-center justify-center text-sm text-gray-600 mt-4 gap-6">
                    <span id="modalDate" class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                        <span></span>
                    </span>
                    <span id="modalLocation" class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span></span>
                    </span>
                </div>
            </div>

            <!-- Article Content -->
            <div class="prose max-w-none mb-6 text-lg leading-relaxed text-gray-700">
                <p id="modalContent" class="text-left whitespace-pre-line"></p>
            </div>

            <!-- Additional Images -->
            <div id="extraImagesContainer" class="mb-6 space-y-4 hidden"></div>
        </div>
    </div>
</div>


<!-- Create Help Seeker Modal -->
<!-- Create Article Modal -->

<div id="createArticleModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity"></div>

    <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-4xl mx-4 max-h-[90vh] overflow-y-auto">

        <div class="sticky top-0 bg-white z-10 border-b border-gray-200 px-6 py-4 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="bg-blue-100 p-2 rounded-full">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800">သတင်း အသစ်ဖန်တီးပါ။</h3>
            </div>
            <button onclick="closeCreateModal()" class="p-1 rounded-full hover:bg-gray-100 transition">
                <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Modal Content -->
        <div class="p-6 space-y-6">
            <form id="createArticleForm" class="space-y-6">
                <!-- Title Section -->
                <div class="space-y-2">
                    <label for="title" class="block text-sm font-medium text-gray-700">
                        သတင်းခေါင်းစဉ် <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="title" name="title" placeholder="သတင်းခေါင်းစဉ်ထည့်ပါ။"
                        class="w-full px-4 py-3 text-base text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                    <p class="text-red-500 text-sm mt-1 error-text" id="error-title"></p>
                </div>

                <!-- Content Section -->
                <div class="space-y-2">
                    <label for="content" class="block text-sm font-medium text-gray-700">
                    သတင်းအကြောင်းအရာ <span class="text-red-500">*</span>
                    </label>
                    <textarea id="content" name="content" rows="6"
                        placeholder="သင့်သတင်းအကြောင်းအရာကို ဤနေရာတွင် ရေးပါ။..."
                        class="w-full px-4 py-3 text-base text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"></textarea>
                    <p class="text-red-500 text-sm mt-1 error-text" id="error-content"></p>
                </div>

                <!-- Location Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label for="city_id" class="block text-sm font-medium text-gray-700">
                        တိုင်း/ပြည်နယ် <span class="text-red-500">*</span>
                        </label>
                        <select id="city_id" name="city_id"
                            class="w-full px-4 py-3 text-base text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            <option value="">တိုင်း/ပြည်နယ် ရွေးပါ။</option>
                            <!-- Options will be loaded via JavaScript -->
                        </select>
                        <p class="text-red-500 text-sm mt-1 error-text" id="error-city_id"></p>
                    </div>

                    <div class="space-y-2">
                        <label for="township_id" class="block text-sm font-medium text-gray-700">
                        မြို့နယ်
                        </label>
                        <select id="township_id" name="township_id"
                            class="w-full px-4 py-3 text-base text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            <option value="">မြို့နယ်ကို ရွေးပါ။</option>
                            <!-- Options will be loaded via JavaScript -->
                        </select>
                        <p class="text-red-500 text-sm mt-1 error-text" id="error-township_id"></p>
                    </div>
                </div>

                <!-- Image Upload Section -->
                <div class="space-y-4">
                    <!-- Thumbnail Image Upload -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">
                        မျက်နှာစာပုံ <span class="text-red-500">*</span>
                        </label>
                        <div class="mt-1">
                            <label for="thumbnail" class="cursor-pointer">
                                <div
                                    class="group relative border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition">
                                    <div id="thumbnail-upload-area" class="flex flex-col items-center justify-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400 group-hover:text-blue-500 transition"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span
                                            class="mt-2 block text-sm font-medium text-gray-700 group-hover:text-blue-500 transition">
                                            မျက်နှာစာပုံကို အပ်လုဒ်လုပ်ရန် နှိပ်ပါ။
                                        </span>
                                        <span class="mt-1 block text-xs text-gray-500">
                                            PNG, JPG, JPEG up to 5MB
                                        </span>
                                    </div>
                                    <div id="thumbnail-preview-container" class="hidden mt-4">
                                        <div class="relative">
                                            <img id="thumbnail-preview" src="#" alt="Thumbnail Preview"
                                                class="w-full h-48 object-contain rounded border border-gray-200">
                                            <button type="button" onclick="removeImage('thumbnail')"
                                                class="relative top-2 right-2 bg-red-500 text-white px-2 py-2 rounded hover:bg-red-600 transition">
                                                ပုံကို ဖယ်ရှားပါ။
                                            </button>
                                        </div>
                                    </div>
                                    <input id="thumbnail" name="thumbnail" type="file" accept="image/*" class="sr-only"
                                        onchange="previewImage(event, 'thumbnail')">

                                </div>
                            </label>
                        </div>
                        <p class="text-red-500 text-sm mt-1 error-text" id="error-thumbnail"></p>
                    </div>

                    <!-- Additional Images -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">
                            အပိုပုံများ (ချန်လှပ်ထားနိုင်သည်)
                        </label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- Image 1 -->
                            <div>
                                <label for="image_1" class="cursor-pointer">
                                    <div
                                        class="group relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-blue-500 transition">
                                        <div id="image_1-upload-area" class="flex flex-col items-center justify-center">
                                            <svg class="mx-auto h-10 w-10 text-gray-400 group-hover:text-blue-500 transition"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            <span
                                                class="mt-1 block text-xs text-gray-700 group-hover:text-blue-500 transition">
                                                ပုံထည့်ပါ။ </span>
                                        </div>
                                        <div id="image_1-preview-container" class="hidden mt-4">
                                            <div class="relative">
                                                <img id="image_1-preview" src="#" alt="Image 1 Preview"
                                                    class="w-full h-40 object-contain rounded border border-gray-200">
                                                <button type="button" onclick="removeImage('image_1')"
                                                    class="relative top-2 right-2 bg-red-500 text-white px-2 py-2 rounded hover:bg-red-600 transition">
                                                    ပုံကို ဖယ်ရှားပါ။
                                                </button>
                                                </button>
                                            </div>
                                        </div>
                                        <input id="image_1" name="image_1" type="file" accept="image/*" class="sr-only"
                                            onchange="previewImage(event, 'image_1')">
                                    </div>
                                </label>
                            </div>

                            <!-- Image 2 -->
                            <div>
                                <label for="image_2" class="cursor-pointer">
                                    <div
                                        class="group relative border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-blue-500 transition">
                                        <div id="image_2-upload-area" class="flex flex-col items-center justify-center">
                                            <svg class="mx-auto h-10 w-10 text-gray-400 group-hover:text-blue-500 transition"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            <span
                                                class="mt-1 block text-xs text-gray-700 group-hover:text-blue-500 transition">
                                                ပုံထည့်ပါ။
                                            </span>
                                        </div>
                                        <div id="image_2-preview-container" class="hidden mt-4">
                                            <div class="relative">
                                                <img id="image_2-preview" src="#" alt="Image 2 Preview"
                                                    class="w-full h-40 object-contain rounded border border-gray-200">
                                                <button type="button" onclick="removeImage('image_2')"
                                                    class="relative top-2 right-2 bg-red-500 text-white px-2 py-2 rounded hover:bg-red-600 transition">
                                                    ပုံကို ဖယ်ရှားပါ။
                                                </button>
                                            </div>
                                        </div>
                                        <input id="image_2" name="image_2" type="file" accept="image/*" class="sr-only"
                                            onchange="previewImage(event, 'image_2')">
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 pt-6 border-t border-gray-200">
                    <button type="button" onclick="closeCreateModal()"
                        class="px-5 py-2.5 bg-white text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium border border-gray-300 flex items-center justify-center">
                        မလုပ်ပါ
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 rounded-lg text-white bg-[#44991a] hover:bg-[#44991a] transition font-medium flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        သတင်းဖန်တီးပါ။
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<script src="{{ asset('frontend/assets/js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // API Configuration
    const ARTICLES_API_URL = BASE_API_URL + "/article";


    // Global variables
    let currentPage = 1;
    let currentData = null;
    let currentSearchData = {}; // Add this to store current search parameters

    function formatDate(dateString) {
        if (!dateString) return '';
        const date = new Date(dateString);
        const options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        return date.toLocaleDateString('my-MM', options);
    }

    function previewImage(event, imageType) {
        const input = event.target;
        const preview = document.getElementById(`${imageType}-preview`);
        const previewContainer = document.getElementById(`${imageType}-preview-container`);
        const uploadArea = document.getElementById(`${imageType}-upload-area`);

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                previewContainer.classList.remove('hidden');
                uploadArea.classList.add('hidden');
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeImage(imageType) {
        const input = document.getElementById(imageType);
        const preview = document.getElementById(`${imageType}-preview`);
        const previewContainer = document.getElementById(`${imageType}-preview-container`);
        const uploadArea = document.getElementById(`${imageType}-upload-area`);

        input.value = '';
        preview.src = '#';
        previewContainer.classList.add('hidden');
        uploadArea.classList.remove('hidden');
    }


    // DOM elements
    const resultsContainer = document.getElementById('results-container');
    const paginationContainer = document.getElementById('pagination-container');
    const loadingIndicator = document.getElementById('loading-indicator');


    function cleanUrl() {
        window.history.replaceState({}, document.title, window.location.pathname);
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Extract the search data from the URL
        const queryParams = new URLSearchParams(window.location.search);
        currentSearchData = {
            type: queryParams.get('type') ?? null,
            division: queryParams.get('division') ?? null,
            township: queryParams.get('township') ?? null,
            category: queryParams.get('category') ?? null
        };

        bindSearchData(currentSearchData);

    });

    async function bindSearchData(searchData = {}, page = 1) {
        try {
            loadingIndicator.classList.remove('hidden');
            resultsContainer.innerHTML = '';

            let params = {
                page: page,
                type: searchData.type || '',
                division: searchData.division || '',
                township: searchData.township || '',
                category: searchData.category || ''
            };
            Object.keys(params).forEach(key => {
                if (params[key] === '') {
                    delete params[key];
                }
            });

            // var response = await axios.get(`${FILTER_API_URL}/search?page=${page}`, {
            //     params: params,
            // });
            var response = await axios.get(ARTICLES_API_URL, {
                params: params
            });
            var data = response.data;
            if (data.status && data.data) {
                currentData = data.data;
                renderResults(currentData.data);
                renderPagination(currentData);
                currentPage = page;
            }

        } catch (error) {
            console.error('Error fetching articles data', error);
            showErrorToast("Error loading articles data");
        } finally {
            loadingIndicator.classList.add('hidden');
            cleanUrl();
        }
    }



    // Render results
    function renderResults(data) {
        resultsContainer.innerHTML = '';
        let footerAdjust = document.getElementById('heightAdjust');

        if (data.length === 0) {
            resultsContainer.innerHTML = `
        <div class="col-span-full text-center py-12 flex-1 h-500"> <!-- Added flex-1 here -->
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900">လတ်တလော သတင်းများမရှိသေးပါ</h3>
        </div>
    `;
            return;
        }

        data.forEach(item => {
            const card = document.createElement('div');
            const defaultImage = "{{ asset('frontend/assets/images/no-image.jpg') }}";
            const thumbnail = item.thumbnail ? `/storage/${item.thumbnail}` : defaultImage;
            card.className =
                'bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-all';
            card.innerHTML = `
             <div class="p-5 h-full flex flex-col">
    <!-- Thumbnail Image with Fixed Aspect Ratio (16:9) -->
    <div class="aspect-w-16 aspect-h-9 w-full overflow-hidden rounded-md bg-gray-100">
        <img src="${thumbnail}" class="w-full h-full object-cover" alt="${item.title || 'No title'}" />
    </div>

    <!-- Title with Fixed Height -->
    <div class="flex items-start justify-between mt-3 min-h-[3.5rem]">
        <h3 class="text-lg font-bold text-gray-800 line-clamp-2">
            ${item.title || 'N/A'}
        </h3>
    </div>

    <!-- Location, Township, Date - Fixed Height Section -->
    <div class="mt-2 space-y-3 flex-grow">
        <div class="flex items-start min-h-[1.5rem]">
            <svg class="flex-shrink-0 mt-0.5 mr-2 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <p class="text-sm font-medium text-gray-800 truncate">
                <span class="text-gray-500">တိုင်း / ပြည်နယ် - </span>
                ${item.city?.name || 'မရှိပါ'}
            </p>
        </div>
        <div class="flex items-start min-h-[1.5rem]">
            <svg class="flex-shrink-0 mt-0.5 mr-2 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <p class="text-sm font-medium text-gray-800 truncate">
                <span class="text-gray-500">မြို့နယ် - </span>
                ${item.township?.name || 'မရှိပါ'}
            </p>
        </div>
        <div class="flex items-start min-h-[1.5rem]">
            <svg class="flex-shrink-0 mt-0.5 mr-2 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <p class="text-sm font-medium text-gray-800 truncate">
                <span class="text-gray-500">ရက်စွဲ - </span>
                ${formatDate(item.created_at) || 'မရှိပါ'}
            </p>
        </div>
    </div>

    <!-- Button - Fixed at Bottom -->
    <button onclick="showDonatorDetail(${JSON.stringify(item).replace(/"/g, '&quot;')})"
        class="mt-4 w-full py-2 text-white bg-[#44991a] rounded-md transition flex items-center justify-center gap-2 hover:bg-[#3a8515]">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
        </svg>
        အသေးစိတ်ကြည့်ရန်
    </button>
</div>
            `;
            resultsContainer.appendChild(card);
        });
    }

    // Render pagination
    function renderPagination(data) {
        paginationContainer.innerHTML = '';

        if (data.last_page <= 1) return;

        // Previous button
        const prevButton = document.createElement('button');
        prevButton.className =
            `px-3 py-1.5 rounded-md ${data.current_page > 1 ? 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-300' : 'bg-gray-100 text-gray-400 cursor-not-allowed border border-gray-200'}`;
        prevButton.innerHTML = `
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    `;
        prevButton.disabled = data.current_page === 1;
        prevButton.onclick = () => {
            if (data.current_page > 1) {
                bindSearchData(currentSearchData, data.current_page - 1);
            }
        };
        paginationContainer.appendChild(prevButton);

        // Page numbers
        const maxVisiblePages = 5;
        let startPage = Math.max(1, data.current_page - Math.floor(maxVisiblePages / 2));
        let endPage = Math.min(data.last_page, startPage + maxVisiblePages - 1);

        // Adjust if we're at the start or end
        if (endPage - startPage + 1 < maxVisiblePages) {
            startPage = Math.max(1, endPage - maxVisiblePages + 1);
        }

        // First page and ellipsis if needed
        if (startPage > 1) {
            const firstPageButton = document.createElement('button');
            firstPageButton.className =
                'px-3.5 py-1.5 rounded-md bg-white text-gray-700 hover:bg-gray-50 border border-gray-300';
            firstPageButton.textContent = '1';
            firstPageButton.onclick = () => bindSearchData(currentSearchData, 1);
            paginationContainer.appendChild(firstPageButton);

            if (startPage > 2) {
                const ellipsis = document.createElement('span');
                ellipsis.className = 'px-1 text-gray-500';
                ellipsis.textContent = '...';
                paginationContainer.appendChild(ellipsis);
            }
        }

        // Page buttons
        for (let i = startPage; i <= endPage; i++) {
            const pageButton = document.createElement('button');
            pageButton.className =
                `px-3.5 py-1.5 rounded-md ${i === data.current_page ? 'bg-[#44991a] text-white border border-[#44991a]' : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-300'}`;
            pageButton.textContent = i;
            pageButton.onclick = () => bindSearchData(currentSearchData, i);
            paginationContainer.appendChild(pageButton);
        }

        // Last page and ellipsis if needed
        if (endPage < data.last_page) {
            if (endPage < data.last_page - 1) {
                const ellipsis = document.createElement('span');
                ellipsis.className = 'px-1 text-gray-500';
                ellipsis.textContent = '...';
                paginationContainer.appendChild(ellipsis);
            }

            const lastPageButton = document.createElement('button');
            lastPageButton.className =
                'px-3.5 py-1.5 rounded-md bg-white text-gray-700 hover:bg-gray-50 border border-gray-300';
            lastPageButton.textContent = data.last_page;
            lastPageButton.onclick = () => bindSearchData(currentSearchData, data.last_page);
            paginationContainer.appendChild(lastPageButton);
        }

        // Next button
        const nextButton = document.createElement('button');
        nextButton.className =
            `px-3 py-1.5 rounded-md ${data.current_page < data.last_page ? 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-300' : 'bg-gray-100 text-gray-400 cursor-not-allowed border border-gray-200'}`;
        nextButton.innerHTML = `
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    `;
        nextButton.disabled = data.current_page === data.last_page;
        nextButton.onclick = () => {
            if (data.current_page < data.last_page) {
                bindSearchData(currentSearchData, data.current_page + 1);
            }
        };
        paginationContainer.appendChild(nextButton);
    }

    // Show donator detail modal
    function showDonatorDetail(article) {
        // Set article title
        document.getElementById('modalName').textContent = article.title || 'မရှိပါ';

        // Format date and set under title
        document.getElementById('modalDate').textContent = formatDate(article.created_at) || 'မရှိပါ';

        // Combine city & township in one line
        document.getElementById('modalLocation').textContent =
            (article.city?.name || 'မရှိပါ') + ' | ' + (article.township?.name || 'မရှိပါ');

        // Set article content
        document.getElementById('modalContent').textContent = article.content || 'မရှိပါ';

        // Handle thumbnail image
        const thumbnailImg = document.getElementById('modalThumbnail');
        const thumbnailContainer = document.getElementById('thumbnailContainer');

        if (article.thumbnail) {
            thumbnailImg.src = `/storage/${article.thumbnail}`;
        } else {
            thumbnailImg.src = '{{ asset('frontend/assets/images/no-image.jpg') }}';
        }
        thumbnailContainer.classList.remove('hidden');

        // Handle additional images
        const extraImagesContainer = document.getElementById('extraImagesContainer');
        extraImagesContainer.innerHTML = ''; // Clear previous images

        if (article.image_url.image_1 || article.image_url.image_2) {
            extraImagesContainer.classList.remove('hidden');

            let imagesHTML = '<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">';

            if (article.image_url.image_1) {
                imagesHTML += `
            <div class="flex justify-center">
                <img src="/storage/${article.image_url.image_1}" class="w-full max-w-xl h-auto rounded-lg shadow-md">
            </div>`;
            }

            if (article.image_url.image_2) {
                imagesHTML += `
            <div class="flex justify-center">
                <img src="/storage/${article.image_url.image_2}" class="w-full max-w-xl h-auto rounded-lg shadow-md">
            </div>`;
            }

            imagesHTML += '</div>';
            extraImagesContainer.innerHTML = imagesHTML;
        } else {
            extraImagesContainer.classList.add('hidden');
        }
        // Show the modal
        document.getElementById('helpSeekerModal').classList.remove('hidden');
    }

    // Helper function to format date

    // Close modal
    function closeModal() {
        document.getElementById('helpSeekerModal').classList.add('hidden');
    }

    // Copy phone number
    function copyLink() {
        const link = document.getElementById('modalLink').textContent;
        if (link && link !== 'မရှိပါ') {
            navigator.clipboard.writeText(link);
            showSuccessToast("လင့်ကိုကူးယူပြီးပါပြီ");
        } else {
            showErrorToast("လင့်မရှိပါ");
        }
    }

    // Show success toast
    function showSuccessToast(message) {
        const toast = document.createElement('div');
        toast.className =
            'fixed bottom-4 right-4 flex items-center bg-green-500 text-white px-4 py-2 rounded-md shadow-lg z-50 animate-fade-in';
        toast.innerHTML = `
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            ${message}
        `;
        document.body.appendChild(toast);

        setTimeout(() => {
            toast.classList.add('animate-fade-out');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 3000);
    }

    // Show error toast
    function showErrorToast(message) {
        const toast = document.createElement('div');
        toast.className =
            'fixed bottom-4 right-4 flex items-center bg-red-500 text-white px-4 py-2 rounded-md shadow-lg z-50 animate-fade-in';
        toast.innerHTML = `
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            ${message}
        `;
        document.body.appendChild(toast);

        setTimeout(() => {
            toast.classList.add('animate-fade-out');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 3000);
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', () => {
        // bindSearchData(currentPage);

        // Add CSS for animations
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fade-in {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
            }
            @keyframes fade-out {
                from { opacity: 1; transform: translateY(0); }
                to { opacity: 0; transform: translateY(10px); }
            }
            .animate-fade-in {
                animation: fade-in 0.3s ease-out forwards;
            }
            .animate-fade-out {
                animation: fade-out 0.3s ease-out forwards;
            }
        `;
        document.head.appendChild(style);
    });

    function openCreateModal() {
        document.getElementById('createArticleModal').classList.remove('hidden'); // Changed ID
        loadCities();
    }

    function closeCreateModal() {
        document.getElementById('createArticleModal').classList.add('hidden'); // Changed ID
    }

    async function loadCities() {
        try {
            const response = await fetch(`${BASE_API_URL}/city`);
            const data = await response.json();
            const citySelect = document.getElementById('city_id');

            if (data.status && data.data) {
                citySelect.innerHTML = '<option value="">တိုင်း/ပြည်နယ် ရွေးပါ။</option>' +
                    data.data.map(city =>
                        `<option value="${city.id}">${city.name}</option>`
                    ).join('');
            }
        } catch (error) {
            console.error('Error loading cities:', error);
            showErrorToast("Error loading cities");
        }
        document.getElementById('city_id').addEventListener('change', async function () {
            const cityId = this.value;
            const townshipSelect = document.getElementById('township_id');

            if (cityId) {
                try {
                    const response = await fetch(`${BASE_API_URL}/division/township-fetch/${cityId}`);
                    const data = await response.json();

                    if (data.status && data.data) {
                        townshipSelect.innerHTML = '<option value="">Select a township</option>' +
                            data.data.map(township =>
                                `<option value="${township.id}">${township.name}</option>`
                            ).join('');
                    }
                } catch (error) {
                    console.error('Error loading townships:', error);
                    showErrorToast("Error loading townships");
                }
            } else {
                townshipSelect.innerHTML = '<option value="">Select a township</option>';
            }
        });
    }


    document.getElementById('createArticleForm').addEventListener('submit', async function (e) {
        e.preventDefault();
        clearValidationErrors();

        const formData = new FormData(this);

        try {
            const response = await axios.post(`${BASE_API_URL}/article/store`, formData, {
                headers: {
                    "Content-Type": "multipart/form-data"
                }
            });

            if (response.data.data) {
                showSuccessToast("Article created successfully!");
                closeCreateModal();
                // Refresh the articles list
                bindSearchData(currentSearchData, currentPage);
                removeImage('thumbnail');
                removeImage('image_1');
                removeImage('image_2');
            } else {
                showErrorToast(response.data.message || "Failed to create article");
            }
        } catch (error) {
            if (error.response && error.response.data.errors) {
                showValidationErrors(error.response.data.errors);
            } else {
                showErrorToast("Server error! Please try again later.");
                console.error('Error creating article:', error);
            }
        }
    });

    function removeImage(id) {
        const previewContainer = document.getElementById(`${id}-preview-container`);
        const previewImage = document.getElementById(`${id}-preview`);

        if (previewImage) {
            previewImage.src = "#"; // Remove the image source
            previewImage.classList.add("hidden"); // Hide the image
        }

        // Optionally, replace the preview with a default upload UI
        if (id == "thumbnail") {
            var defaultUploadUI = `<div id="thumbnail-upload-area" class="flex flex-col items-center justify-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400 group-hover:text-blue-500 transition"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span
                                            class="mt-2 block text-sm font-medium text-gray-700 group-hover:text-blue-500 transition">
                                            Click to upload thumbnail
                                        </span>
                                        <span class="mt-1 block text-xs text-gray-500">
                                            PNG, JPG, JPEG up to 5MB
                                        </span>
                                    </div>`;
        } else {
            var defaultUploadUI = `<div id="${id}-upload-area"
                                            class="flex flex-col items-center justify-center">
                                            <svg class="mx-auto h-10 w-10 text-gray-400 group-hover:text-blue-500 transition"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            <span
                                                class="mt-1 block text-xs text-gray-700 group-hover:text-blue-500 transition">
                                                Add Image
                                            </span>
                                        </div>`;
        }
        previewContainer.innerHTML = defaultUploadUI;
    }

    //for validation erros
    function clearValidationErrors() {
        document.querySelectorAll('.error-text').forEach(el => {
            el.textContent = '';
        });
    }

    function showValidationErrors(errors) {
        for (const [field, messages] of Object.entries(errors)) {
            const errorElement = document.getElementById(`error-${field}`);
            if (errorElement) {
                // Join multiple error messages with line breaks
                errorElement.textContent = messages.join('\n');
            } else {
                console.warn(`No error element found for field: ${field}`);
            }
        }
    }
</script>