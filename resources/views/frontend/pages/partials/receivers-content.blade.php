<style>
    /* Add this to your existing styles */
    .floating-button {
        animation: float 3s ease-in-out infinite;
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
        class="floating-button fixed bottom-12 right-6 flex items-center justify-center w-14 h-14 rounded-full bg-blue-600 text-white hover:bg-blue-700 transition shadow-lg z-40">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
    </button>
</div>

<!-- Detail Modal -->
<!-- Detail Modal -->
<div id="helpSeekerModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="absolute inset-0 bg-black/70 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>

    <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-4xl mx-4 max-h-[90vh] overflow-y-auto">
        <button onclick="closeModal()" class="absolute top-4 right-4 p-2 rounded-full hover:bg-gray-100 transition">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <div class="p-8">
            <!-- Header -->
            <div class="flex items-start gap-4 mb-6">
                <div class="bg-blue-100 p-3 rounded-full flex-shrink-0">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-800" id="modalName"></h3>
                    <div class="flex items-center gap-2 mt-1">
                        <span id="modalCategory" class="text-blue-600 font-medium"></span>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="space-y-6">
                <!-- Location Section -->
                <div class="space-y-4">
                    <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">လိပ်စာအချက်အလက်</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <p class="text-xs font-medium text-gray-500 mb-1">မြို့နယ်</p>
                            <p id="modalTownship" class="text-base font-medium text-gray-800"></p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <p class="text-xs font-medium text-gray-500 mb-1">တိုင်းဒေသကြီး</p>
                            <p id="modalCity" class="text-base font-medium text-gray-800"></p>
                        </div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <p class="text-xs font-medium text-gray-500 mb-1">တည်နေရာ အသေးစိတ်</p>
                        <p id="modalLocation" class="text-base font-medium text-gray-800"></p>
                    </div>
                </div>

                <!-- Urgent Level Section -->
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <p class="text-xs font-medium text-gray-500 mb-1">အရေးပေါ်သတ်မှတ်ချက်</p>
                    <p id="modalUrgentLevel" class="text-base font-medium"></p>
                </div>

                <!-- Contact Section -->
                <div class="space-y-4">
                    <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">ဆက်သွယ်ရန်လိပ်စာ</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <p class="text-xs font-medium text-gray-500 mb-1">ဖုန်းနံပါတ်</p>
                            <p id="modalPhone" class="text-base font-medium text-gray-800"></p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <p class="text-xs font-medium text-gray-500 mb-1">Viber</p>
                            <p id="modalViber" class="text-base font-medium text-gray-800"></p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <p class="text-xs font-medium text-gray-500 mb-1">Telegram</p>
                            <p id="modalTelegram" class="text-base font-medium text-gray-800"></p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <p class="text-xs font-medium text-gray-500 mb-1">Telegram Username</p>
                            <p id="modalTelegramUsername" class="text-base font-medium text-gray-800"></p>
                        </div>
                    </div>
                </div>

                <!-- Help Section -->
                <div class="space-y-4">
                    <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">လိုအပ်သောအကူအညီ</h4>
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <p class="text-xs font-medium text-gray-500 mb-1">အကူအညီအမျိုးအစား</p>
                        <p id="modalHelpType" class="text-base font-medium text-gray-800"></p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <p class="text-xs font-medium text-gray-500 mb-2">အကြောင်းအရာ</p>
                        <p id="modalContent" class="text-gray-700"></p>
                    </div>
                </div>
            </div>

            <!-- Footer Buttons -->
            <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8">
                <button onclick="closeModal()"
                    class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition font-medium">
                    ပိတ်မည်
                </button>
                <button onclick="copyPhoneNumber()"
                    class="px-5 py-2.5 rounded-lg text-white bg-[#44991a] transition font-medium flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3">
                        </path>
                    </svg>
                    ဖုန်းနံပါတ်ကူးရန်
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Create Help Seeker Modal -->
<div id="createHelpSeekerModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeCreateModal()"></div>

    <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-4xl mx-4 max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="sticky top-0 bg-white z-10 border-b border-gray-200 px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-100 p-2 rounded-full">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">အကူအညီတောင်းခံသူ ဖြည့်စွက်ရန်</h3>
                </div>
                <button onclick="closeCreateModal()" class="p-1 rounded-full hover:bg-gray-100 transition">
                    <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <p class="mt-1 text-sm text-gray-500 ml-11">အောက်ပါအကြောင်းအရာများကိုဖြည့်စွက်ပါ</p>
        </div>

        <!-- Modal Content -->
        <div class="p-6">
            <form id="createHelpSeekerForm" class="space-y-6">
                <!-- Basic Information Section -->
                <div class="bg-gray-50 p-5 rounded-lg">
                    <h4 class="text-base font-semibold text-gray-700 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        ဖြည့်စွက်ရန်
                    </h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                အမည်အပြည့်အစုံ <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="space-y-2">
                            <label for="category" class="block text-sm font-medium text-gray-700">
                                အကူအညီအမျိုးအစား <span class="text-red-500">*</span>
                            </label>
                            <select id="category" name="category_id" required
                                class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value=""></option>
                                <!-- Categories will be loaded via JavaScript -->
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label for="urgent_level" class="block text-sm font-medium text-gray-700">
                                အရေးပေါ်သတ်မှတ်ချက် <span class="text-red-500">*</span>
                            </label>
                            <select id="urgent_level" name="urgent_level" required
                                class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Select urgent level</option>
                                <option value="high">High (အရေးတကြီး)</option>
                                <option value="medium">Medium (သာမန်ထက်ပို)</option>
                                <option value="low">Low (စောင့်ဆိုင်း၍ရ)</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-4 space-y-2">
                        <label for="content" class="block text-sm font-medium text-gray-700">
                            အကြောင်းအရာ <span class="text-red-500">*</span>
                        </label>
                        <textarea id="content" name="content" rows="4" required
                            class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                </div>

                <!-- Location Information Section -->
                <div class="bg-gray-50 p-5 rounded-lg">
                    <h4 class="text-base font-semibold text-gray-700 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        လိပ်စာအချက်အလက်
                    </h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="space-y-2">
                            <label for="city" class="block text-sm font-medium text-gray-700">
                                တိုင်းဒေသကြီး/ပြည်နယ် <span class="text-red-500">*</span>
                            </label>
                            <select id="city" name="city_id" required
                                class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Select a city</option>
                                <!-- Cities will be loaded via JavaScript -->
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label for="township" class="block text-sm font-medium text-gray-700">
                                မြို့နယ် <span class="text-red-500">*</span>
                            </label>
                            <select id="township" name="township_id" required
                                class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Select a township</option>
                                <!-- Townships will be loaded via JavaScript -->
                            </select>
                        </div>
                    </div>

                    <div class="mt-4 space-y-2">
                        <label for="location" class="block text-sm font-medium text-gray-700">
                            တည်နေရာအသေးစိတ် <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="location" name="location" required
                            class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <!-- Contact Information Section -->
                <div class="bg-gray-50 p-5 rounded-lg">
                    <h4 class="text-base font-semibold text-gray-700 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        ဆက်သွယ်ရန်နံပါတ်များ
                    </h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="space-y-2">
                            <label for="phone" class="block text-sm font-medium text-gray-700">
                                Primary Phone <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" id="phone" name="phone" required
                                class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="space-y-2">
                            <label for="viber" class="block text-sm font-medium text-gray-700">
                                Viber Number
                            </label>
                            <input type="text" id="viber" name="viber"
                                class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="space-y-2">
                            <label for="telegram_username" class="block text-sm font-medium text-gray-700">
                                Telegram Username
                            </label>
                            <input type="text" id="telegram_username" name="telegram_username"
                                class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div class="space-y-2">
                            <label for="telegram" class="block text-sm font-medium text-gray-700">
                                Telegram Phone Number
                            </label>
                            <input type="text" id="telegram" name="telegram"
                                class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4 border-t border-gray-200">
                    <button type="button" onclick="closeCreateModal()"
                        class="px-5 py-2.5 bg-white text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium border border-gray-300 flex items-center justify-center">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 rounded-lg text-white bg-blue-600 hover:bg-blue-700 transition font-medium flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Submit Request
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('frontend/assets/js/app.js') }}"></script>
<script>
    // API Configuration
    const HELP_SEEKERS_API_URL = BASE_API_URL + "/donator";
    const FILTER_API_URL = BASE_API_URL + "/filter";


    // Global variables
    let currentPage = 1;
    let currentData = null;
    let currentSearchData = {}; // Add this to store current search parameters

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
                type: searchData.type || '',
                division: searchData.division || '',
                township: searchData.township || '',
                category: searchData.category || ''
            };

            var response = await axios.get(`${FILTER_API_URL}/search?page=${page}`, {
                params: params,
            });
            var data = response.data;
            if (data.status && data.data) {
                currentData = data.data;
                renderResults(currentData.data);
                renderPagination(currentData);
            }

        } catch (error) {
            console.error('Error fetching help seekers:', error);
            showErrorToast("Error loading help seekers data");
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
            <h3 class="text-lg font-medium text-gray-900">အလှူရှင်များမရှိသေးပါ</h3>
        </div>
    `;
            return;
        }


        data.forEach(item => {
            const card = document.createElement('div');
            card.className = 'bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-all';
            card.innerHTML = `
                <div class="p-5">
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">${item.user?.name || 'N/A'}</h3>
                        </div>
                         <span class="inline-block mt-1 px-2 py-2 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                ${item.category?.name || 'Donor'}
                            </span>
                    </div>
                    
                    <div class="mt-4 space-y-3">
                    </div><div class="mt-4 space-y-4">
    <!-- Township -->
                    <div class="flex items-start">
                        <svg class="flex-shrink-0 mt-0.5 mr-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-gray-800">
                                <span class="text-gray-500">မြို့နယ် - </span>
                                ${item.township?.name || 'N/A'}
                            </p>
                        </div>
                    </div>
                                       
                    
                    <!-- Phone Number -->
                    <div class="flex items-start">
                        <svg class="flex-shrink-0 mt-0.5 mr-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-gray-800">
                                <span class="text-gray-500">ဖုန်းနံပါတ် - </span>
                                ${item.phone || 'မရှိပါ'}
                            </p>
                        </div>
                    </div>
                </div>
                    
                    <button onclick="showDonatorDetail(${JSON.stringify(item).replace(/"/g, '&quot;')})"
                        class="mt-4 w-full py-2 text-white bg-[#44991a] rounded-md  transition flex items-center justify-center gap-2">
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
        prevButton.className = `px-3 py-1.5 rounded-md ${data.prev_page_url ? 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-300' : 'bg-gray-100 text-gray-400 cursor-not-allowed border border-gray-200'}`;
        prevButton.innerHTML = `
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        `;
        prevButton.disabled = !data.prev_page_url;
        prevButton.onclick = () => {
            if (data.prev_page_url) {
                currentPage--;
                bindSearchData(currentSearchData, currentPage);
            }
        };
        paginationContainer.appendChild(prevButton);

        // Page numbers
        const maxVisiblePages = 5;
        let startPage = Math.max(1, data.current_page - Math.floor(maxVisiblePages / 2));
        let endPage = Math.min(data.last_page, startPage + maxVisiblePages - 1);

        if (endPage - startPage + 1 < maxVisiblePages) {
            startPage = Math.max(1, endPage - maxVisiblePages + 1);
        }

        if (startPage > 1) {
            const firstPageButton = document.createElement('button');
            firstPageButton.className = 'px-3.5 py-1.5 rounded-md bg-white text-gray-700 hover:bg-gray-50 border border-gray-300';
            firstPageButton.textContent = '1';
            firstPageButton.onclick = () => {
                currentPage = 1;
                bindSearchData(currentSearchData, currentPage);
            };
            paginationContainer.appendChild(firstPageButton);

            if (startPage > 2) {
                const ellipsis = document.createElement('span');
                ellipsis.className = 'px-1 text-gray-500';
                ellipsis.textContent = '...';
                paginationContainer.appendChild(ellipsis);
            }
        }

        for (let i = startPage; i <= endPage; i++) {
            const pageButton = document.createElement('button');
            pageButton.className = `px-3.5 py-1.5 rounded-md ${i === data.current_page ? 'bg-blue-600 text-white border border-blue-600' : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-300'}`;
            pageButton.textContent = i;
            pageButton.onclick = () => {
                currentPage = i;
                bindSearchData(currentSearchData, currentPage);
            };
            paginationContainer.appendChild(pageButton);
        }

        if (endPage < data.last_page) {
            if (endPage < data.last_page - 1) {
                const ellipsis = document.createElement('span');
                ellipsis.className = 'px-1 text-gray-500';
                ellipsis.textContent = '...';
                paginationContainer.appendChild(ellipsis);
            }

            const lastPageButton = document.createElement('button');
            lastPageButton.className = 'px-3.5 py-1.5 rounded-md bg-white text-gray-700 hover:bg-gray-50 border border-gray-300';
            lastPageButton.textContent = data.last_page;
            lastPageButton.onclick = () => {
                currentPage = data.last_page;
                bindSearchData(currentSearchData, currentPage);
            };
            paginationContainer.appendChild(lastPageButton);
        }

        // Next button
        const nextButton = document.createElement('button');
        nextButton.className = `px-3 py-1.5 rounded-md ${data.next_page_url ? 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-300' : 'bg-gray-100 text-gray-400 cursor-not-allowed border border-gray-200'}`;
        nextButton.innerHTML = `
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        `;
        nextButton.disabled = !data.next_page_url;
        nextButton.onclick = () => {
            if (data.next_page_url) {
                currentPage++;
                bindSearchData(currentSearchData, currentPage);
            }
        };
        paginationContainer.appendChild(nextButton);
    }

    // Show donator detail modal
    function showDonatorDetail(donator) {
        document.getElementById('modalName').textContent = donator.user?.name || 'မရှိပါ';
        document.getElementById('modalCategory').textContent = donator.category?.name || 'မရှိပါ';
        document.getElementById('modalTownship').textContent = donator.township?.name_mm || donator.township?.name || 'မရှိပါ';
        document.getElementById('modalState').textContent = donator.city?.name_mm || donator.city?.name || 'မရှိပါ';
        document.getElementById('modalPhone').textContent = donator.phone || 'မရှိပါ';
        document.getElementById('modalViber').textContent = donator.contact?.viber || 'မရှိပါ';
        document.getElementById('modalTelegram').textContent = donator.contact?.telegram || donator.contact?.telegram || 'မရှိပါ';
        document.getElementById('modalTelegramUsername').textContent = donator.contact?.telegram || donator.contact?.telegram_usename || 'မရှိပါ';
        document.getElementById('modalNotes').textContent = donator.remark || 'မရှိပါ';

        document.getElementById('donatorModal').classList.remove('hidden');

        const donatorData = {
            name: donator.user?.name || null,
            category: donator.category?.name || null,
            township: donator.township?.name || null,
            city: donator.city?.name || null,
            phone: donator.phone || null,
            viber: donator.contact?.viber || null,
            telegram: donator.contact?.telegram || donator.contact?.telegram_usename || null,
            remark: donator.remark || null
        };
    }

    // Close modal
    function closeModal() {
        document.getElementById('donatorModal').classList.add('hidden');
    }

    // Copy phone number
    function copyPhoneNumber() {
        const phoneNumber = document.getElementById('modalPhone').textContent;
        if (phoneNumber && phoneNumber !== 'Not provided') {
            navigator.clipboard.writeText(phoneNumber);
            showSuccessToast("ဖုန်းနံပါတ်ကူးယူပြီးပါပြီ");
        } else {
            showErrorToast("ဖုန်းနံပါတ်မရှိပါ");
        }
    }

    // Show success toast
    function showSuccessToast(message) {
        const toast = document.createElement('div');
        toast.className = 'fixed bottom-4 right-4 flex items-center bg-green-500 text-white px-4 py-2 rounded-md shadow-lg z-50 animate-fade-in';
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
        toast.className = 'fixed bottom-4 right-4 flex items-center bg-red-500 text-white px-4 py-2 rounded-md shadow-lg z-50 animate-fade-in';
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
        document.getElementById('createHelpSeekerModal').classList.remove('hidden');
        loadFormSelectOptions();
    }

    function closeCreateModal() {
        document.getElementById('createHelpSeekerModal').classList.add('hidden');
    }

    async function loadFormSelectOptions() {
        try {
            // Load categories
            const categoriesResponse = await fetch(`${BASE_API_URL}/category`);
            const categoriesData = await categoriesResponse.json();
            const categorySelect = document.getElementById('category');

            if (categoriesData.status && categoriesData.data) {
                categorySelect.innerHTML = '<option value="">Select a category</option>' +
                    categoriesData.data.map(cat =>
                        `<option value="${cat.id}">${cat.name}</option>`
                    ).join('');
            }

            // Load cities
            const citiesResponse = await fetch(`${BASE_API_URL}/city`);
            const citiesData = await citiesResponse.json();
            const citySelect = document.getElementById('city');

            if (citiesData.status && citiesData.data) {
                citySelect.innerHTML = '<option value="">Select a city</option>' +
                    citiesData.data.map(city =>
                        `<option value="${city.id}">${city.name}</option>`
                    ).join('');
            }

            // Load townships when city is selected
            document.getElementById('city').addEventListener('change', async function () {
                const cityId = this.value;
                const townshipSelect = document.getElementById('township');

                if (cityId) {
                    const townshipsResponse = await fetch(
                        `${BASE_API_URL}/division/township-fetch/${cityId}`);
                    const townshipsData = await townshipsResponse.json();

                    if (townshipsData.status && townshipsData.data) {
                        townshipSelect.innerHTML = '<option value="">Select a township</option>' +
                            townshipsData.data.map(township =>
                                `<option value="${township.id}">${township.name}</option>`
                            ).join('');
                    }
                } else {
                    townshipSelect.innerHTML = '<option value="">Select a township</option>';
                }
            });
        } catch (error) {
            console.error('Error loading form options:', error);
            showErrorToast("Error loading form data");
        }
    }

    // Handle form submission
    // Handle form submission
    document.getElementById('createHelpSeekerForm').addEventListener('submit', async function (e) {
        e.preventDefault();

        // Get form data
        const formData = new FormData(this);
        const formObject = Object.fromEntries(formData.entries());

        for (let key in formObject) {
            if (formObject[key] === "" || formObject[key] === undefined) {
                formObject[key] = null; 
            }
        }

        // Add CSRF token if needed (assuming you're using Laravel)
        // formObject._token = document.querySelector('meta[name="csrf-token"]').content;

        try {
            // Show loading state
            const submitButton = this.querySelector('button[type="submit"]');
            const originalButtonText = submitButton.innerHTML;
            submitButton.innerHTML = `
            <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Processing...
        `;
            submitButton.disabled = true;

            // Make the API request
            const response = await fetch(`${BASE_API_URL}/help-seeker/store`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    // Add CSRF token header if needed
                    // 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(formObject)
            });

            const data = await response.json();

            if (response.ok && data.status) {
                showSuccessToast("Help seeker created successfully!");
                closeCreateModal();
                this.reset();
                bindSearchData(currentPage); // Refresh the list
            } else {
                // Handle validation errors or other errors
                if (data.errors) {
                    const errorMessages = Object.values(data.errors).join('<br>');
                    showErrorToast(errorMessages);
                } else {
                    showErrorToast(data.message || "Error creating help seeker");
                }
            }
        } catch (error) {
            console.error('Error creating help seeker:', error);
            showErrorToast("Network error. Please try again.");
        } finally {
            // Reset button state
            if (submitButton) {
                submitButton.innerHTML = originalButtonText;
                submitButton.disabled = false;
            }
        }
    });
</script>