<div class="mt-6">
    <!-- Search Results Container -->
    <div id="heightAdjust">
        <div id="results-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"></div>
    </div>


    <!-- Pagination -->
    <div id="pagination-container" class="mt-10 flex justify-center items-center gap-2"></div>

    <!-- Loading Indicator -->
    <div id="loading-indicator" class="text-center py-8 hidden">
        <div
            class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-blue-600 border-r-transparent">
        </div>
        <p class="mt-2 text-gray-600">Loading donors...</p>
    </div>
</div>


<!-- Detail Modal -->
<!-- Improved Donor Detail Modal -->
<div id="donatorModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
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
                            <p class="text-xs font-medium text-gray-500 mb-1">တိုင်းဒေသကြီး</p>
                            <p id="modalState" class="text-base font-medium text-gray-800"></p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <p class="text-xs font-medium text-gray-500 mb-1">မြို့နယ်</p>
                            <p id="modalTownship" class="text-base font-medium text-gray-800"></p>
                        </div>
                    </div>
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
                    </div>
                </div>

                <!-- Notes Section -->
                <div class="space-y-4">
                    <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider">အသေးစိတ်အချက်အလက်</h4>
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <p class="text-xs font-medium text-gray-500 mb-2">မှတ်ချက်</p>
                        <p id="modalNotes" class="text-gray-700"></p>
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
                    class="px-5 py-2.5 rounded-lg text-white bg-[#44991a] hover:bg-[#3a8515] transition font-medium flex items-center justify-center gap-2">
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

<script src="{{asset('frontend/assets/js/app.js')}}"></script>
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

            var response = await axios.get(`${FILTER_API_URL}/changes?page=${page}`, {
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
        <div class="col-span-full text-center py-12 flex-1 h-600"> <!-- Added flex-1 here -->
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
        
        // Handle Viber contact
        const viberValue = donator.viber || donator.contact?.viber || 'မရှိပါ';
        document.getElementById('modalViber').textContent = viberValue;
        
        // Handle Telegram contact
        const telegramValue = donator.telegram || 
                            donator.contact?.telegram || 
                            donator.contact?.telegram_username || 
                            donator.telegram_username || 
                            'မရှိပါ';
        document.getElementById('modalTelegram').textContent = telegramValue;
        
        document.getElementById('modalNotes').textContent = donator.remark || 'မရှိပါ';

        document.getElementById('donatorModal').classList.remove('hidden');
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
</script>