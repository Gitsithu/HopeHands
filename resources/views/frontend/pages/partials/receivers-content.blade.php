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
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <p class="text-xs font-medium text-gray-500 mb-1">Link တင်ရန်</p>
                        <p id="modalLink" class="text-base font-medium text-gray-800"></p>
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
                {{-- <button onclick="copyPageURL()"
                    class="px-5 py-2.5 rounded-lg text-white bg-[#44991a] transition font-medium flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                        viewBox="0,0,256,256">
                        <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                            style="mix-blend-mode: normal">
                            <g transform="scale(10.66667,10.66667)">
                                <path
                                    d="M16.70703,2.29297l-1.41406,1.41406l2.29297,2.29297h-0.58594c-6.06341,0 -11,4.93659 -11,11v1h2v-1c0,-4.98259 4.01741,-9 9,-9h0.58594l-2.29297,2.29297l1.41406,1.41406l4.70703,-4.70703zM2,8v1v10c0,1.64497 1.35503,3 3,3h14c1.64497,0 3,-1.35503 3,-3v-1v-1h-2v1v1c0,0.56503 -0.43497,1 -1,1h-14c-0.56503,0 -1,-0.43497 -1,-1v-10v-1z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    ဝေမျှရန်
                </button> --}}
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12">
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
                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
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
                            <input type="text" id="name" name="name"
                                class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <p class="text-red-500 text-sm mt-1 error-text" id="error-name"></p>
                        </div>

                        <div class="space-y-2">
                            <label for="category" class="block text-sm font-medium text-gray-700">
                                အကူအညီအမျိုးအစား <span class="text-red-500">*</span>
                            </label>
                            <select
                                class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                id="category" name="category_ids[]" multiple>
                                <!-- Your other options will go here -->
                            </select>
                            <p class="text-red-500 text-sm mt-1 error-text" id="error-category_id"></p>
                        </div>

                        <div class="space-y-2">
                            <label for="urgent_level" class="block text-sm font-medium text-gray-700">
                                အရေးပေါ်သတ်မှတ်ချက် <span class="text-red-500">*</span>
                            </label>
                            <select id="urgent_level" name="urgent_level"
                                class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Select urgent level</option>
                                <option value="high">High (အရေးတကြီး)</option>
                                <option value="medium">Medium (သာမန်ထက်ပို)</option>
                                <option value="low">Low (စောင့်ဆိုင်း၍ရ)</option>
                            </select>
                            <p class="text-red-500 text-sm mt-1 error-text" id="error-urgent_level"></p>
                        </div>

                    </div>


                    <div class="mt-4 space-y-2">
                        <label for="content" class="block text-sm font-medium text-gray-700">
                            အကြောင်းအရာ <span class="text-red-500">*</span>
                        </label>
                        <textarea id="content" name="content" rows="4"
                            class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                        <p class="text-red-500 text-sm mt-1 error-text" id="error-content"></p>
                    </div>
                </div>

                <!-- Location Information Section -->
                <div class="bg-gray-50 p-5 rounded-lg">
                    <h4 class="text-base font-semibold text-gray-700 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
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
                            <select id="city" name="city_id"
                                class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Select a city</option>
                                <!-- Cities will be loaded via JavaScript -->
                            </select>
                            <p class="text-red-500 text-sm mt-1 error-text" id="error-city_id"></p>
                        </div>

                        <div class="space-y-2">
                            <label for="township" class="block text-sm font-medium text-gray-700">
                                မြို့နယ်
                            </label>
                            <select id="township" name="township_id"
                                class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Select a township</option>
                                <!-- Townships will be loaded via JavaScript -->
                            </select>
                            <p class="text-red-500 text-sm mt-1 error-text" id="error-township_id"></p>
                        </div>
                    </div>

                    <div class="mt-4 space-y-2">
                        <label for="location" class="block text-sm font-medium text-gray-700">
                            တည်နေရာအသေးစိတ် <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="location" name="location"
                            class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <p class="text-red-500 text-sm mt-1 error-text" id="error-location"></p>
                    </div>

                    <div class="mt-4 space-y-2">
                        <label for="link" class="block text-sm font-medium text-gray-700">
                            Link တင်ရန်
                        </label>
                        <input type="text" id="link" name="link"
                            class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <!-- Contact Information Section -->
                <div class="bg-gray-50 p-5 rounded-lg">
                    <h4 class="text-base font-semibold text-gray-700 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                        ဆက်သွယ်ရန်နံပါတ်များ
                    </h4>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                            ဖုန်းနံပါတ်
                        </label>
                        <input
                            class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            id="phone" type="text" name="phone" placeholder="ဖုန်းနံပါတ်...">
                        <p class="text-red-500 text-sm mt-1 error-text" id="error-phone"></p>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="contact-method">
                            ဆက်သွယ်ရန်
                        </label>
                        <select
                            class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            id="contact-method" name="contact_method">
                            <option value="">ဆက်သွယ်ရန် ရွေးချယ်ပါ။</option>
                            <option value="viber">Viber</option>
                            <option value="telegram">Telegram</option>
                        </select>
                    </div>
                    <div id="contact-fields"></div>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4 border-t border-gray-200">
                    <button type="button" onclick="closeCreateModal()"
                        class="px-5 py-2.5 bg-white text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium border border-gray-300 flex items-center justify-center">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 rounded-lg text-white bg-[#44991a] hover:bg-[#44991a] transition font-medium flex items-center justify-center gap-2">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Include Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    // API Configuration
    const HELP_SEEKERS_API_URL = BASE_API_URL + "/donator";
    const FILTER_API_URL = BASE_API_URL + "/filter";


    $('#category').select2({
        placeholder: "ကူညီရန်အမျိုးအစား ရွေးချယ်ပါ။",
        allowClear: true,
        width: '100%',
        multiple: true,
        maximumSelectionLength: 3,
        closeOnSelect: false,
        language: {
            noResults: function() {
                return "ရလဒ်မတွေ့ပါ";
            },
            maximumSelected: function(e) {
                return "အများဆုံး " + e.maximum + " ခုသာ ရွေးချယ်နိုင်ပါသည်";
            }
        }
    });

    // Global variables
    let currentPage = 1;
    let currentData = null;
    let currentSearchData = {}; // Add this to store current search parameters

    // DOM elements
    const resultsContainer = document.getElementById('results-container');
    const paginationContainer = document.getElementById('pagination-container');
    const loadingIndicator = document.getElementById('loading-indicator');

    document.getElementById('contact-method').addEventListener('change', function() {
        const container = document.getElementById('contact-fields');
        container.innerHTML = ''; // Clear previous fields

        if (this.value === 'viber') {
            // Add Viber field
            container.innerHTML = `
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="viber-number">
                    Viber ဖုန်းနံပါတ်
                </label>
                <input
                    class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    type="text" id="viber-number" name="viber" placeholder="+959xxxxxxxx">
                <p class="text-red-500 text-sm mt-1 error-text" id="error-viber"></p>
            </div>
        `;
        } else if (this.value === 'telegram') {
            // Add Telegram fields
            container.innerHTML = `
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="telegram-username">
                    Telegram username
                </label>
                <input
                    class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    type="text" id="telegram-username" name="telegram_username" placeholder="@username">
                <p class="text-red-500 text-sm mt-1 error-text" id="error-telegram_username"></p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="telegram-phone">
                    Telegram ဖုန်းနံပါတ် (optional)
                </label>
                <input
                    class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    type="text" id="telegram-phone" name="telegram" placeholder="+959xxxxxxxx">
                <p class="text-red-500 text-sm mt-1 error-text" id="error-telegram"></p>
            </div>
        `;
        }
    });

    function cleanUrl() {
        window.history.replaceState({}, document.title, window.location.pathname);
    }

    document.addEventListener('DOMContentLoaded', function() {
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
                type: searchData.type || null,
                division: searchData.division || null,
                township: searchData.township || null,
                category: searchData.category || null
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
            <h3 class="text-lg font-medium text-gray-900">လတ်တလော အကူအညီတောင်းခံသူများမရှိသေးပါ</h3>
        </div>
    `;
            return;
        }


        data.forEach(item => {
            const card = document.createElement('div');
            card.className =
                'bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-all';
            card.innerHTML = `
                <div class="p-5">
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">${item.name || 'N/A'}</h3>
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

                    <!-- Urgent Level -->
                    <div class="flex items-start">
                        <svg class="flex-shrink-0 mt-0.5 mr-3 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-gray-800">
                                <span class="text-gray-500">အရေးပေါ်သတ်မှတ်ချက် - </span>
                                <span class="${getUrgentLevelClass(item.urgent_level)}">
                                    ${getUrgentLevelBurmese(item.urgent_level)}
                                </span>
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

    function getUrgentLevelClass(level) {
        switch (level) {
            case 'high':
                return 'text-red-800';
            case 'medium':
                return 'text-yellow-800';
            case 'low':
                return 'text-green-800';
            default:
                return 'text-gray-800';
        }
    }

    // Get Burmese translation for urgent level
    function getUrgentLevelBurmese(level) {
        switch (level) {
            case 'high':
                return 'အရေးတကြီး';
            case 'medium':
                return 'သာမန်ထက်ပို';
            case 'low':
                return 'စောင့်ဆိုင်း၍ရ';
            default:
                return 'မရှိပါ';
        }
    }

    // Render pagination
    function renderPagination(data) {
        paginationContainer.innerHTML = '';

        if (data.last_page <= 1) return;

        // Previous button
        const prevButton = document.createElement('button');
        prevButton.className =
            `px-3 py-1.5 rounded-md ${data.prev_page_url ? 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-300' : 'bg-gray-100 text-gray-400 cursor-not-allowed border border-gray-200'}`;
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
            firstPageButton.className =
                'px-3.5 py-1.5 rounded-md bg-white text-gray-700 hover:bg-gray-50 border border-gray-300';
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
            pageButton.className =
                `px-3.5 py-1.5 rounded-md ${i === data.current_page ? 'bg-[#44991a] text-white border border-[#44991a]' : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-300'}`;
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
            lastPageButton.className =
                'px-3.5 py-1.5 rounded-md bg-white text-gray-700 hover:bg-gray-50 border border-gray-300';
            lastPageButton.textContent = data.last_page;
            lastPageButton.onclick = () => {
                currentPage = data.last_page;
                bindSearchData(currentSearchData, currentPage);
            };
            paginationContainer.appendChild(lastPageButton);
        }

        // Next button
        const nextButton = document.createElement('button');
        nextButton.className =
            `px-3 py-1.5 rounded-md ${data.next_page_url ? 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-300' : 'bg-gray-100 text-gray-400 cursor-not-allowed border border-gray-200'}`;
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
    function showDonatorDetail(helpSeeker) {

        document.getElementById('modalName').textContent = helpSeeker.name || 'မရှိပါ';
        document.getElementById('modalCategory').textContent = helpSeeker.category?.name || 'မရှိပါ';

        const urgentLevelElement = document.getElementById('modalUrgentLevel');
        urgentLevelElement.textContent = getUrgentLevelBurmese(helpSeeker.urgent_level) || 'မရှိပါ';

        document.getElementById('modalTownship').textContent = helpSeeker.township?.name || 'မရှိပါ';
        document.getElementById('modalCity').textContent = helpSeeker.city?.name || 'မရှိပါ';
        document.getElementById('modalLocation').textContent = helpSeeker.location || 'မရှိပါ';
        document.getElementById('modalLink').textContent = helpSeeker.link || 'မရှိပါ';
        document.getElementById('modalPhone').textContent = helpSeeker.phone || 'မရှိပါ';
        document.getElementById('modalViber').textContent = helpSeeker.contact?.viber || 'မရှိပါ';
        document.getElementById('modalTelegram').textContent = helpSeeker.contact?.telegram || helpSeeker.contact
            ?.telegram_username || 'မရှိပါ';
        document.getElementById('modalHelpType').textContent = helpSeeker.category?.name || 'မရှိပါ';
        document.getElementById('modalContent').textContent = helpSeeker.content || 'မရှိပါ';

        document.getElementById('helpSeekerModal').classList.remove('hidden');
    }

    // Close modal
    function closeModal() {
        document.getElementById('helpSeekerModal').classList.add('hidden');
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
            document.getElementById('city').addEventListener('change', async function() {
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


    document.getElementById('createHelpSeekerForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        clearValidationErrors();

        // Get form data
        const formData = new FormData(this);
        const formObject = Object.fromEntries(formData.entries());


        axios.post(`${BASE_API_URL}/help-seeker/store`, formData, {
                headers: {
                    "Content-Type": "multipart/form-data"
                }
            })
            .then(response => {
                if (response.data.data) {

                    window.location.href = "/receivers";

                } else {
                    alert("⚠️ Error: " + (response.data.message || "Something went wrong!"));
                }
            })
            .catch(error => {
                if (error.response && error.response.data.errors) {
                    showValidationErrors(error.response.data.errors);
                } else {
                    alert("⚠️ Server error! Please try again later.");
                }
            });
    });
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
