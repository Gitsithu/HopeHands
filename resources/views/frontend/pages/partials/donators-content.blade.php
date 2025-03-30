<!-- Donators Grid -->
<div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
    @foreach($donators as $donator)
        <div class="bg-white rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition duration-300">
            <!-- Image Section -->
            <div class="h-48 bg-gray-100 flex items-center justify-center">
                <svg class="w-20 h-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>

            <!-- Card Content -->
            <div class="p-5">
                <h3 class="text-lg font-semibold text-gray-800">{{ $donator['name'] }}</h3>
                <p class="text-gray-600 mt-2"><strong>မြို့နယ်:</strong> {{ $donator['township'] }}</p>
                <p class="text-gray-600 mt-2"><strong>တိုင်းဒေသကြီး:</strong> {{ $donator['state'] }}</p>
                <p class="text-gray-600 mt-2"><strong>အကူအညီ:</strong> {{ $donator['help_type'] }}</p>

                <!-- See Detail Button -->
                <button onclick="showDonatorDetail({{ json_encode($donator) }})"
                    class="mt-4 w-full py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                    See Detail
                </button>
            </div>
        </div>
    @endforeach
</div>
<!-- Pagination -->
@if($donators->hasPages())
    <div class="mt-8 flex justify-center">
        <nav class="flex items-center space-x-2">
            {{-- Previous Page Link --}}
            @if($donators->onFirstPage())
                <span class="px-3 py-1 rounded-md bg-gray-200 text-gray-500 cursor-not-allowed">
                    &laquo; Previous
                </span>
            @else
                <a href="{{ $donators->previousPageUrl() }}"
                    class="px-3 py-1 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">
                    &laquo; Previous
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach(range(1, $donators->lastPage()) as $page)
                @if($page == $donators->currentPage())
                    <span class="px-3 py-1 rounded-md bg-blue-600 text-white">{{ $page }}</span>
                @else
                    <a href="{{ $donators->url($page) }}"
                        class="px-3 py-1 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300 transition">
                        {{ $page }}
                    </a>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if($donators->hasMorePages())
                <a href="{{ $donators->nextPageUrl() }}"
                    class="px-3 py-1 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">
                    Next &raquo;
                </a>
            @else
                <span class="px-3 py-1 rounded-md bg-gray-200 text-gray-500 cursor-not-allowed">
                    Next &raquo;
                </span>
            @endif
        </nav>
    </div>
@endif

<!-- Donator Detail Modal -->
<div id="donatorModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <!-- Enhanced background overlay with blur effect -->
    <div class="absolute inset-0 bg-black/70 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>

    <!-- Modal Content -->
    <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto">
        <!-- Close Button -->
        <button onclick="closeModal()" class="absolute top-4 right-4 p-2 rounded-full hover:bg-gray-100 transition">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <!-- Modal Content -->
        <div class="p-8">
            <!-- Header -->
            <div class="flex items-center gap-4 mb-6">
                <div class="bg-blue-100 p-3 rounded-full">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800" id="modalName"></h3>
            </div>

            <!-- Details in rows -->
            <div class="space-y-6">
                <!-- Row 1 -->
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

                <!-- Row 2 -->
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

                <!-- Notes -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm font-medium text-gray-500 mb-2">မှတ်ချက်</p>
                    <p id="modalNotes" class="text-gray-700"></p>
                </div>
            </div>

            <!-- Buttons -->
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
    let currentDonator = null;

    function showDonatorDetail(donator) {
        currentDonator = donator;
        document.getElementById('modalName').textContent = donator.name;
        document.getElementById('modalTownship').textContent = donator.township;
        document.getElementById('modalState').textContent = donator.state;
        document.getElementById('modalHelpType').textContent = donator.help_type;
        document.getElementById('modalPhone').textContent = donator.phone;
        document.getElementById('modalNotes').textContent = donator.notes;

        document.getElementById('donatorModal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden'); // Prevent scrolling
    }

    function closeModal() {
        document.getElementById('donatorModal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden'); // Allow scrolling again
    }

    function copyPhoneNumber() {
        if (currentDonator) {
            navigator.clipboard.writeText(currentDonator.phone)
                .then(() => alert('Copied: ' + currentDonator.phone))
                .catch(err => console.error('Copy failed:', err));
        }
    }

    // Close modal on Escape key
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeModal();
        }
    });
</script>

<style>
    /* Modal transition effects */
    #donatorModal {
        opacity: 0;
        transform: scale(0.95);
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    #donatorModal:not(.hidden) {
        opacity: 1;
        transform: scale(1);
    }
</style>