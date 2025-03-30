<nav class="bg-gray-900 text-white p-1 shadow-lg">
    <div class="max-w-7xl mx-auto">
        <!-- Mobile Header -->
        <div class="flex justify-between items-center md:hidden p-2">
            <!-- Logo -->
            <a href="#" class="flex items-center">
                <img src="/frontend/assets/images/logo.png" alt="MyApp Logo" class="w-28">
            </a>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="text-white focus:outline-none">
                <svg id="menu-icon" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg id="close-icon" class="h-8 w-8 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Desktop Layout -->
        <div class="hidden md:flex flex-row justify-between items-center">
            <!-- Logo -->
            <a href="#" class="flex items-center">
                <img src="/frontend/assets/images/logo.png" alt="MyApp Logo" class="w-32">
            </a>

            <!-- Search Bar & Buttons -->
            <div class="flex flex-row items-center gap-4">
                <!-- Search Inputs -->
                <div class="grid grid-cols-4 gap-4">
                    <!-- Division Search -->
                    <div class="relative">
                        <input type="text" id="division-search"
                            class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                            placeholder="တိုင်းဒေသကြီး/ပြည်နယ်" readonly onclick="showDropdown('division-dropdown')" />
                        <div id="division-dropdown"
                            class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                            <!-- options... -->
                        </div>
                    </div>

                    <!-- City Search -->
                    <div class="relative">
                        <input type="text" id="city-search"
                            class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                            placeholder="မြို့" readonly onclick="showDropdown('city-dropdown')" />
                        <div id="city-dropdown"
                            class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                            <!-- options... -->
                        </div>
                    </div>

                    <!-- Township Search -->
                    <div class="relative">
                        <input type="text" id="township-search"
                            class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                            placeholder="မြို့နယ်" readonly onclick="showDropdown('township-dropdown')" />
                        <div id="township-dropdown"
                            class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                            <!-- options... -->
                        </div>
                    </div>

                    <!-- Category Search -->
                    <div class="relative">
                        <input type="text" id="category-search"
                            class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                            placeholder="အမျိုးအစား" readonly onclick="showDropdown('category-dropdown')" />
                        <div id="category-dropdown"
                            class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                            <!-- options... -->
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-row gap-4">
                    <button id="search-button"
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-300 font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        Search
                    </button>
                    <button
                        class="px-6 py-3 border-2 border-blue-500 text-white rounded-lg hover:bg-blue-500 transition-all duration-300 font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        Register
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Content -->
        <div id="mobile-menu-content" class="hidden md:hidden p-4 space-y-4">
            <!-- Search Inputs -->
            <div class="space-y-4">
                <div class="relative">
                    <input type="text" id="mobile-division-search"
                        class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                        placeholder="တိုင်းဒေသကြီး/ပြည်နယ်" readonly
                        onclick="showDropdown('mobile-division-dropdown')" />
                    <div id="mobile-division-dropdown"
                        class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                        <!-- options... -->
                    </div>
                </div>

                <div class="relative">
                    <input type="text" id="mobile-city-search"
                        class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                        placeholder="မြို့" readonly onclick="showDropdown('mobile-city-dropdown')" />
                    <div id="mobile-city-dropdown"
                        class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                        <!-- options... -->
                    </div>
                </div>

                <div class="relative">
                    <input type="text" id="mobile-township-search"
                        class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                        placeholder="မြို့နယ်" readonly onclick="showDropdown('mobile-township-dropdown')" />
                    <div id="mobile-township-dropdown"
                        class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                        <!-- options... -->
                    </div>
                </div>

                <div class="relative">
                    <input type="text" id="mobile-category-search"
                        class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                        placeholder="အမျိုးအစား" readonly onclick="showDropdown('mobile-category-dropdown')" />
                    <div id="mobile-category-dropdown"
                        class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                        <!-- options... -->
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col space-y-4">
                <button id="mobile-search-button"
                    class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-300 font-medium shadow-md hover:shadow-lg">
                    Search
                </button>
                <button
                    class="px-6 py-3 border-2 border-blue-500 text-white rounded-lg hover:bg-blue-500 transition-all duration-300 font-medium shadow-md hover:shadow-lg">
                    Register
                </button>
            </div>
        </div>
    </div>
</nav>

<script>
    // API Configuration
    const BASE_API_URL = "http://localhost:8000/api/admin";
    const DIVISIONS_API_URL = BASE_API_URL + "/division";

    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenuContent = document.getElementById('mobile-menu-content');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');

    function handleResponsiveLayout() {
        if (window.innerWidth >= 768) {
            mobileMenuContent.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
    }

    // Initialize
    handleResponsiveLayout();
    window.addEventListener('resize', handleResponsiveLayout);

    mobileMenuButton.addEventListener('click', () => {
        mobileMenuContent.classList.toggle('hidden');
        menuIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });

    // Close menu when clicking outside on mobile
    document.addEventListener('click', (e) => {
        if (window.innerWidth < 768 &&
            !e.target.closest('#mobile-menu-content') &&
            !e.target.closest('#mobile-menu-button') &&
            !mobileMenuContent.classList.contains('hidden')) {
            mobileMenuContent.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
    });

    // Dropdown functions
    function showDropdown(dropdownId) {
        // Close all dropdowns first
        document.querySelectorAll('[id$="-dropdown"]').forEach(dropdown => {
            if (dropdown.id !== dropdownId) {
                dropdown.classList.add('hidden');
            }
        });
        // Toggle the clicked dropdown
        document.getElementById(dropdownId).classList.toggle('hidden');
    }

    function selectItem(inputId, value, dropdownId) {
        document.getElementById(inputId).value = value;
        document.getElementById(dropdownId).classList.add('hidden');
        checkSelections();
    }

    function checkSelections() {
        // Check desktop inputs
        const division = document.getElementById('division-search')?.value || document.getElementById('mobile-division-search')?.value;
        const township = document.getElementById('township-search')?.value || document.getElementById('mobile-township-search')?.value;
        const city = document.getElementById('city-search')?.value || document.getElementById('mobile-city-search')?.value;
        const category = document.getElementById('category-search')?.value || document.getElementById('mobile-category-search')?.value;

        const searchButton = document.getElementById('search-button');
        const mobileSearchButton = document.getElementById('mobile-search-button');

        if (division && township && city && category) {
            if (searchButton) searchButton.classList.remove('hidden');
            if (mobileSearchButton) mobileSearchButton.classList.remove('hidden');
        } else {
            if (searchButton) searchButton.classList.add('hidden');
            if (mobileSearchButton) mobileSearchButton.classList.add('hidden');
        }
    }

    function performSearch() {
        const division = document.getElementById('division-search')?.value || document.getElementById('mobile-division-search')?.value;
        const township = document.getElementById('township-search')?.value || document.getElementById('mobile-township-search')?.value;
        const city = document.getElementById('city-search')?.value || document.getElementById('mobile-city-search')?.value;
        const category = document.getElementById('category-search')?.value || document.getElementById('mobile-category-search')?.value;
        alert(`Searching for: ${category} in ${city}, ${township}, ${division}`);
    }

    document.addEventListener('click', (e) => {
        if (!e.target.closest('[id$="-dropdown"]') && !e.target.closest('[id$="-search"]')) {
            document.querySelectorAll('[id$="-dropdown"]').forEach(dropdown => {
                dropdown.classList.add('hidden');
            });
        }
    });

    // Function to fetch divisions from API
    async function fetchDivisions() {
        try {
            const response = await axios.get(DIVISIONS_API_URL);

            if (response.data.status && response.data.data) {
                const divisions = response.data.data;

                // Populate desktop division dropdown
                populateDropdown('division-dropdown', divisions, 'division-search');

                // Populate mobile division dropdown
                populateDropdown('mobile-division-dropdown', divisions, 'mobile-division-search');

                return true;
            } else {
                console.error('API returned false status:', response.data.message);
                return false;
            }
        } catch (error) {
            console.error('Error fetching divisions:', error);
            return false;
        }
    }

    // Function to populate a dropdown with options
    function populateDropdown(dropdownId, items, inputId) {
        const dropdown = document.getElementById(dropdownId);
        if (!dropdown) return;

        dropdown.innerHTML = ''; // Clear existing options

        items.forEach(item => {
            const option = document.createElement('div');
            option.className = 'px-4 py-2 hover:bg-gray-700 cursor-pointer';
            option.textContent = item.name;
            option.onclick = () => {
                selectItem(inputId, item.name, dropdownId);
                // Here you could chain-load cities if needed
                // fetchCities(item.id);
            };
            dropdown.appendChild(option);
        });
    }

    // Initialize when DOM is loaded
    document.addEventListener('DOMContentLoaded', () => {
        fetchDivisions();

        // Add event listeners for search buttons
        document.getElementById('search-button')?.addEventListener('click', performSearch);
        document.getElementById('mobile-search-button')?.addEventListener('click', performSearch);
    });
</script>