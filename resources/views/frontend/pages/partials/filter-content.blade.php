<div class="mt-6">
    <!-- Search Results Container -->
    <div id="results-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"></div>

    <!-- Pagination -->
    <div id="pagination-container" class="mt-8 flex justify-center items-center gap-2"></div>

    <!-- Loading Indicator -->
    <div id="loading-indicator" class="text-center py-8 hidden">
        <div class="loading-spinner"></div>
        <p class="mt-2 text-gray-600">Loading data...</p>
    </div>
</div>

<!-- Detail Modal -->
<div id="donatorModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="absolute inset-0 bg-black/70 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>

    <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto">
        <button onclick="closeModal()" class="absolute top-4 right-4 p-2 rounded-full hover:bg-gray-100 transition">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <div class="p-8">
            <div class="flex items-center gap-4 mb-6">
                <div class="bg-blue-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800" id="modalName"></h3>
            </div>

            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm font-medium text-gray-500 mb-1">မြို့နယ်</p>
                        <p id="modalTownship" class="text-lg font-medium text-gray-800"></p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm font-medium text-gray-500 mb-1">တိုင်းဒေသကြီး</p>
                        <p id="modalState" class="text-lg font-medium text-gray-800"></p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm font-medium text-gray-500 mb-1">အကူအညီ</p>
                        <p id="modalHelpType" class="text-lg font-medium text-gray-800"></p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm font-medium text-gray-500 mb-1">ဖုန်းနံပါတ်</p>
                        <p id="modalPhone" class="text-lg font-medium text-gray-800"></p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm font-medium text-gray-500 mb-1">Viber</p>
                        <p id="modalViber" class="text-lg font-medium text-gray-800"></p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm font-medium text-gray-500 mb-1">Telegram</p>
                        <p id="modalTelegram" class="text-lg font-medium text-gray-800"></p>
                    </div>
                </div>

                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm font-medium text-gray-500 mb-2">မှတ်ချက်</p>
                    <p id="modalNotes" class="text-gray-700"></p>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8">
                <button onclick="closeModal()"
                    class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition font-medium">
                    Close
                </button>
                <button onclick="copyPhoneNumber()"
                    class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3">
                        </path>
                    </svg>
                    Copy Phone Number
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // API Configuration
    const HELP_SEEKERS_API_URL = BASE_API_URL + "/help-seeker";

    // Global variables
    let currentPage = 1;
    let currentData = null;

    // DOM elements
    const resultsContainer = document.getElementById('results-container');
    const paginationContainer = document.getElementById('pagination-container');
    const loadingIndicator = document.getElementById('loading-indicator');


    // Fetch help seekers data
    async function fetchHelpSeekers(page = 1) {
        try {
            loadingIndicator.classList.remove('hidden');
            resultsContainer.innerHTML = '';

            const response = await axios.get(`${HELP_SEEKERS_API_URL}?page=${page}`);
            if (response.data.status && response.data.data) {
                currentData = response.data.data;
                renderResults(currentData.data);
                renderPagination(currentData);
            }
        } catch (error) {
            console.error('Error fetching help seekers:', error);
            showErrorToast("Error loading help seekers data");
        } finally {
            loadingIndicator.classList.add('hidden');
        }
    }

    // Render results
    function renderResults(data) {
        resultsContainer.innerHTML = '';

        if (data.length === 0) {
            resultsContainer.innerHTML = `
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500">No help seekers found</p>
                </div>
            `;
            return;
        }

        data.forEach(item => {
            const card = document.createElement('div');
            card.className = 'bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition';
            card.innerHTML = `
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-gray-800">${item.name}</h3>
                    <p class="text-gray-600 mt-2"><strong>မြို့နယ်:</strong> ${item.township?.name || 'N/A'}</p>
                    <p class="text-gray-600 mt-2"><strong>တိုင်းဒေသကြီး:</strong> ${item.division?.name || 'N/A'}</p>
                    <p class="text-gray-600 mt-2"><strong>အရေးပေါ်သတ်မှတ်ချက်:</strong> ${item.urgent_level || 'N/A'}</p>
                    <p class="text-gray-600 mt-2"><strong>အကူအညီ:</strong> ${item.content || 'N/A'}</p>
                    
                    
                    <button onclick="showDonatorDetail(${JSON.stringify(item).replace(/"/g, '&quot;')})"
                        class="mt-4 w-full py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                        See Detail
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
        prevButton.className = `px-4 py-2 rounded-md ${data.prev_page_url ? 'bg-blue-100 text-blue-600 hover:bg-blue-200' : 'bg-gray-100 text-gray-400 cursor-not-allowed'}`;
        prevButton.innerHTML = '&laquo; Previous';
        prevButton.disabled = !data.prev_page_url;
        prevButton.onclick = () => {
            if (data.prev_page_url) {
                currentPage--;
                fetchHelpSeekers(currentPage);
            }
        };
        paginationContainer.appendChild(prevButton);

        // Page numbers
        for (let i = 1; i <= data.last_page; i++) {
            const pageButton = document.createElement('button');
            pageButton.className = `px-4 py-2 rounded-md ${i === data.current_page ? 'bg-blue-600 text-white' : 'bg-blue-100 text-blue-600 hover:bg-blue-200'}`;
            pageButton.textContent = i;
            pageButton.onclick = () => {
                currentPage = i;
                fetchHelpSeekers(currentPage);
            };
            paginationContainer.appendChild(pageButton);
        }

        // Next button
        const nextButton = document.createElement('button');
        nextButton.className = `px-4 py-2 rounded-md ${data.next_page_url ? 'bg-blue-100 text-blue-600 hover:bg-blue-200' : 'bg-gray-100 text-gray-400 cursor-not-allowed'}`;
        nextButton.innerHTML = 'Next &raquo;';
        nextButton.disabled = !data.next_page_url;
        nextButton.onclick = () => {
            if (data.next_page_url) {
                currentPage++;
                fetchHelpSeekers(currentPage);
            }
        };
        paginationContainer.appendChild(nextButton);
    }

    // Show donator detail modal
    function showDonatorDetail(donator) {
        document.getElementById('modalName').textContent = donator.name || 'N/A';
        document.getElementById('modalTownship').textContent = donator.township?.name || 'N/A';
        document.getElementById('modalState').textContent = donator.division?.name || 'N/A';
        document.getElementById('modalHelpType').textContent = donator.content || 'N/A';
        document.getElementById('modalPhone').textContent = donator.phone || 'N/A';
        document.getElementById('modalViber').textContent = donator.contact?.viber || 'N/A';
        document.getElementById('modalTelegram').textContent = donator.contact?.telegram || 'N/A';
        document.getElementById('modalNotes').textContent = donator.notes || 'No additional notes';

        document.getElementById('donatorModal').classList.remove('hidden');
    }

    // Close modal
    function closeModal() {
        document.getElementById('donatorModal').classList.add('hidden');
    }

    // Copy phone number
    function copyPhoneNumber() {
        const phoneNumber = document.getElementById('modalPhone').textContent;
        if (phoneNumber && phoneNumber !== 'N/A') {
            navigator.clipboard.writeText(phoneNumber);
            showSuccessToast("Phone number copied to clipboard");
        }
    }

    // Show success toast
    function showSuccessToast(message) {
        const toast = document.createElement('div');
        toast.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-md shadow-lg z-50';
        toast.textContent = message;
        document.body.appendChild(toast);

        setTimeout(() => {
            toast.remove();
        }, 3000);
    }

    // Show error toast
    function showErrorToast(message) {
        const toast = document.createElement('div');
        toast.className = 'fixed bottom-4 right-4 bg-red-500 text-white px-4 py-2 rounded-md shadow-lg z-50';
        toast.textContent = message;
        document.body.appendChild(toast);

        setTimeout(() => {
            toast.remove();
        }, 3000);
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', () => {
        fetchHelpSeekers(currentPage);
    });
</script>