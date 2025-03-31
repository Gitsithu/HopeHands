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
                            <!-- Options will be populated by JavaScript -->
                        </div>
                    </div>

                    <!-- City Search -->
                    <div class="relative">
                        <input type="text" id="city-search"
                            class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                            placeholder="မြို့" readonly onclick="showDropdown('city-dropdown')" />
                        <div id="city-dropdown"
                            class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                            <!-- Options will be populated by JavaScript -->
                        </div>
                    </div>

                    <!-- Township Search -->
                    <div class="relative">
                        <input type="text" id="township-search"
                            class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                            placeholder="မြို့နယ်" readonly onclick="showDropdown('township-dropdown')" />
                        <div id="township-dropdown"
                            class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                            <!-- Options will be populated by JavaScript -->
                        </div>
                    </div>

                    <!-- Category Search -->
                    <div class="relative">
                        <input type="text" id="category-search"
                            class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                            placeholder="အမျိုးအစား" readonly onclick="showDropdown('category-dropdown')" />
                        <div id="category-dropdown"
                            class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                            <!-- Options will be populated by JavaScript -->
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-row gap-4">
                    <button id="search-button"
                        class="w-50 px-10 py-3 bg-blue-600 text-white rounded-lg transition-all duration-300 font-medium shadow-md">
                        ရှာဖွေရန်
                    </button>
                    <a href="{{ route('donator.register') }}" id="auth-btn"
                        class="w-50 px-10 h-12 flex items-center justify-center border-2 border-blue-500 text-white rounded-lg hover:bg-blue-500 transition-all duration-300 font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        စာရင်းသွင်းရန်
                    </a>
                    {{-- <button id="openModal"
                        class="w-50 px-10 py-3 border-2 border-blue-500 text-blue-500 rounded-lg hover:bg-blue-500 hover:text-white transition-all duration-300 font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        စာရင်းသွင်းရန်
                    </button> --}}


                    <!-- Modal toggle -->
                    {{-- <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                        class="w-50 px-10 border-2 border-blue-500 text-white rounded-lg hover:bg-blue-500 transition-all duration-300 font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5"
                        type="button">
                        စာရင်းသွင်းရန်
                    </button> --}}

                    <!-- Main modal -->
                    {{-- <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        အကောင့်ဝင်ရန်
                                    </h3>
                                    <button type="button"
                                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="authentication-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5">
                                    <form class="space-y-4" action="#">
                                        <div>
                                            <label for="username"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">အသုံးပြုသူနာမည်</label>
                                            <input type="text" name="username" id="username"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                placeholder="အသုံးပြုသူနာမည်" required />
                                        </div>
                                        <div>
                                            <label for="password"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">စကားဝှက်</label>
                                            <input type="password" name="password" id="password"
                                                placeholder="••••••••"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                required />
                                        </div>

                                        <button type="submit"
                                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ဝင်ပါမည်</button>
                                        <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                                            အကောင့်မရှိပါက? <a href="#"
                                                class="text-blue-700 hover:underline dark:text-blue-500">အကောင့်ဖွင်ရန်...</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full bg-gray-900/50 dark:bg-gray-900/80">
                        <div class="relative p-4 w-full max-w-sm mx-2 max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-700">
                                    <h3 class="text-lg md:text-xl font-semibold text-gray-900 dark:text-white">
                                        အကောင့်ဝင်ရန်
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-700 dark:hover:text-white"
                                        data-modal-hide="authentication-modal">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 space-y-3 md:space-y-4">
                                    <form class="space-y-3 md:space-y-4" action="#">
                                        <div>
                                            <label for="username"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">အသုံးပြုသူနာမည်</label>
                                            <input type="text" name="username" id="username"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                                placeholder="အသုံးပြုသူနာမည်" required />
                                        </div>
                                        <div>
                                            <label for="password"
                                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">စကားဝှက်</label>
                                            <input type="password" name="password" id="password"
                                                placeholder="••••••••"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                                required />
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <div class="flex items-center">
                                                <input id="remember" type="checkbox" value=""
                                                    class="w-3 h-3 md:w-4 md:h-4 border border-gray-300 rounded bg-gray-50 focus:ring-2 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600" />
                                                <label for="remember"
                                                    class="ml-2 text-xs md:text-sm text-gray-900 dark:text-gray-300">Remember
                                                    me</label>
                                            </div>
                                            <a href="#"
                                                class="text-xs md:text-sm text-blue-700 hover:underline dark:text-blue-500">Forgot
                                                password?</a>
                                        </div>
                                        <button type="submit"
                                            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            ဝင်ပါမည်
                                        </button>
                                        <div
                                            class="text-xs md:text-sm font-medium text-gray-500 dark:text-gray-400 text-center">
                                            အကောင့်မရှိပါက? <a href="#"
                                                class="text-blue-700 hover:underline dark:text-blue-500">အကောင့်ဖွင်ရန်...</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> --}}





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
                        <!-- Options will be populated by JavaScript -->
                    </div>
                </div>

                <div class="relative">
                    <input type="text" id="mobile-city-search"
                        class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                        placeholder="မြို့" readonly onclick="showDropdown('mobile-city-dropdown')" />
                    <div id="mobile-city-dropdown"
                        class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                        <!-- Options will be populated by JavaScript -->
                    </div>
                </div>

                <div class="relative">
                    <input type="text" id="mobile-township-search"
                        class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                        placeholder="မြို့နယ်" readonly onclick="showDropdown('mobile-township-dropdown')" />
                    <div id="mobile-township-dropdown"
                        class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                        <!-- Options will be populated by JavaScript -->
                    </div>
                </div>

                <div class="relative">
                    <input type="text" id="mobile-category-search"
                        class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                        placeholder="အမျိုးအစား" readonly onclick="showDropdown('mobile-category-dropdown')" />
                    <div id="mobile-category-dropdown"
                        class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                        <!-- Options will be populated by JavaScript -->
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col space-y-4">
                <button id="mobile-search-button"
                    class="px-6 py-3 bg-blue-600 text-white rounded-lg transition-all duration-300 font-medium shadow-md">
                    ရှာဖွေရန်
                </button>
                {{-- <button
                    class="px-6 py-3 border-2 border-blue-500 text-white rounded-lg hover:bg-blue-500 transition-all duration-300 font-medium shadow-md hover:shadow-lg">
                    စာရင်းသွင်းရန်
                </button> --}}
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                    class="px-6 py-3 border-2 border-blue-500 text-white rounded-lg hover:bg-blue-500 transition-all duration-300 font-medium shadow-md hover:shadow-lg"
                    type="button">
                    စာရင်းသွင်းရန်
                </button>
            </div>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // API Configuration
    const BASE_API_URL = "http://localhost:8000/api/admin";
    const DIVISIONS_API_URL = BASE_API_URL + "/division";
    const CITIES_API_URL = BASE_API_URL + "/division/city-fetch/";
    const TOWNSHIPS_API_URL = BASE_API_URL + "/division/township-fetch/";
    const CATEGORIES_API_URL = BASE_API_URL + "/category";

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

    function selectItem(inputId, value, dropdownId, itemId = null) {
        document.getElementById(inputId).value = value;
        document.getElementById(dropdownId).classList.add('hidden');

        // If this is a division selection, fetch cities for that division
        if (inputId.includes('division') && itemId) {
            fetchCities(itemId);
            clearDependentFields(inputId, ['city', 'township']);
        }
        // If this is a city selection, fetch townships for that city
        else if (inputId.includes('city') && itemId) {
            fetchTownships(itemId);
            clearDependentFields(inputId, ['township']);
        }

        checkSelections();
    }

    function clearDependentFields(inputId, fields) {
        const isMobile = inputId.includes('mobile');
        const prefix = isMobile ? 'mobile-' : '';

        fields.forEach(field => {
            document.getElementById(`${prefix}${field}-search`).value = '';
            document.getElementById(`${prefix}${field}-dropdown`).innerHTML = '';
        });
    }

    function checkSelections() {
        // Check desktop inputs
        const division = document.getElementById('division-search')?.value || document.getElementById(
            'mobile-division-search')?.value;
        const township = document.getElementById('township-search')?.value || document.getElementById(
            'mobile-township-search')?.value;
        const city = document.getElementById('city-search')?.value || document.getElementById('mobile-city-search')
            ?.value;
        const category = document.getElementById('category-search')?.value || document.getElementById(
            'mobile-category-search')?.value;

        const searchButton = document.getElementById('search-button');
        const mobileSearchButton = document.getElementById('mobile-search-button');

        // Update button states without hiding them
        const isComplete = division && township && city && category;

        if (searchButton) {
            searchButton.disabled = !isComplete;
            if (isComplete) {
                searchButton.classList.add('hover:bg-blue-700', 'transform', 'hover:-translate-y-0.5',
                    'hover:shadow-lg');
                searchButton.classList.remove('opacity-75', 'cursor-not-allowed');
            } else {
                searchButton.classList.remove('hover:bg-blue-700', 'transform', 'hover:-translate-y-0.5',
                    'hover:shadow-lg');
                searchButton.classList.add('opacity-75', 'cursor-not-allowed');
            }
        }

        if (mobileSearchButton) {
            mobileSearchButton.disabled = !isComplete;
            if (isComplete) {
                mobileSearchButton.classList.add('hover:bg-blue-700', 'hover:shadow-lg');
                mobileSearchButton.classList.remove('opacity-75', 'cursor-not-allowed');
            } else {
                mobileSearchButton.classList.remove('hover:bg-blue-700', 'hover:shadow-lg');
                mobileSearchButton.classList.add('opacity-75', 'cursor-not-allowed');
            }
        }
    }

    function performSearch() {
        const division = document.getElementById('division-search')?.value || document.getElementById(
            'mobile-division-search')?.value;
        const township = document.getElementById('township-search')?.value || document.getElementById(
            'mobile-township-search')?.value;
        const city = document.getElementById('city-search')?.value || document.getElementById('mobile-city-search')
            ?.value;
        const category = document.getElementById('category-search')?.value || document.getElementById(
            'mobile-category-search')?.value;

        if (!division || !township || !city || !category) {
            showErrorToast("Please fill all search fields");
            return;
        }

        // Here you would typically redirect to search results or make an API call
        console.log(`Searching for: ${category} in ${city}, ${township}, ${division}`);
        // window.location.href = `/search?division=${division}&city=${city}&township=${township}&category=${category}`;
    }

    document.addEventListener('click', (e) => {
        if (!e.target.closest('[id$="-dropdown"]') && !e.target.closest('[id$="-search"]')) {
            document.querySelectorAll('[id$="-dropdown"]').forEach(dropdown => {
                dropdown.classList.add('hidden');
            });
        }
    });

    // Function to show error toast
    function showErrorToast(message) {
        const toast = document.createElement('div');
        toast.className = 'fixed bottom-4 right-4 bg-red-500 text-white px-4 py-2 rounded-md shadow-lg z-50';
        toast.textContent = message;
        document.body.appendChild(toast);

        setTimeout(() => {
            toast.remove();
        }, 3000);
    }

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
            showErrorToast("Error loading divisions");
            return false;
        }
    }

    // Function to fetch cities for a division
    async function fetchCities(divisionId) {
        try {
            const response = await axios.get(CITIES_API_URL + divisionId);

            if (response.data.status && response.data.data) {
                const cities = response.data.data;

                // Populate both desktop and mobile city dropdowns
                populateDropdown('city-dropdown', cities, 'city-search');
                populateDropdown('mobile-city-dropdown', cities, 'mobile-city-search');

                return true;
            } else {
                console.error('API returned false status:', response.data.message);
                showErrorToast("Error loading cities");
                return false;
            }
        } catch (error) {
            console.error('Error fetching cities:', error);
            showErrorToast("Error loading cities");
            return false;
        }
    }

    // Function to fetch townships for a city
    async function fetchTownships(cityId) {
        try {
            const response = await axios.get(TOWNSHIPS_API_URL + cityId);

            if (response.data.status && response.data.data) {
                const townships = response.data.data;

                // Populate both desktop and mobile township dropdowns
                populateDropdown('township-dropdown', townships, 'township-search');
                populateDropdown('mobile-township-dropdown', townships, 'mobile-township-search');

                return true;
            } else {
                console.error('API returned false status:', response.data.message);
                showErrorToast("Error loading townships");
                return false;
            }
        } catch (error) {
            console.error('Error fetching townships:', error);
            showErrorToast("Error loading townships");
            return false;
        }
    }

    // Function to fetch categories
    async function fetchCategories() {
        try {
            const response = await axios.get(CATEGORIES_API_URL);

            if (response.data.status && response.data.data) {
                const categories = response.data.data;

                // Populate both desktop and mobile category dropdowns
                populateDropdown('category-dropdown', categories, 'category-search');
                populateDropdown('mobile-category-dropdown', categories, 'mobile-category-search');

                return true;
            } else {
                console.error('API returned false status:', response.data.message);
                showErrorToast("Error loading categories");
                return false;
            }
        } catch (error) {
            console.error('Error fetching categories:', error);
            showErrorToast("Error loading categories");
            return false;
        }
    }

    // Function to populate a dropdown with options
    function populateDropdown(dropdownId, items, inputId) {
        const dropdown = document.getElementById(dropdownId);
        if (!dropdown) return;

        dropdown.innerHTML = '';

        if (items.length === 0) {
            const noOption = document.createElement('div');
            noOption.className = 'px-4 py-2 text-gray-400';
            noOption.textContent = 'No options available';
            dropdown.appendChild(noOption);
            return;
        }

        items.forEach(item => {
            const option = document.createElement('div');
            option.className = 'px-4 py-2 hover:bg-gray-700 cursor-pointer';
            option.textContent = item.name;
            option.onclick = () => {
                selectItem(inputId, item.name, dropdownId, item.id);
            };
            dropdown.appendChild(option);
        });
    }

    // Initialize when DOM is loaded
    document.addEventListener('DOMContentLoaded', () => {
        fetchDivisions();
        fetchCategories();

        // Add event listeners for search buttons
        document.getElementById('search-button')?.addEventListener('click', performSearch);
        document.getElementById('mobile-search-button')?.addEventListener('click', performSearch);

        // Initial check of selections
        checkSelections();
    });

    document.addEventListener("DOMContentLoaded", function() {
        let authBtn = document.getElementById("auth-btn");
        let token = sessionStorage.getItem("authToken");

        if (token) {
            // If token exists, show logout button
            authBtn.textContent = "ထွက်ရန်"; // Logout in Myanmar
            authBtn.href = "#"; // Prevent navigation
            authBtn.addEventListener("click", function(e) {
                e.preventDefault();
                sessionStorage.removeItem("authToken");
                location.reload(); // Reload page to update UI
            });
        }
    });
</script>

<style>
    /* Button disabled state */
    button:disabled {
        opacity: 0.75;
        cursor: not-allowed;
    }

    button:disabled:hover {
        transform: none !important;
        box-shadow: none !important;
    }

    /* Dropdown animations */
    [id$="-dropdown"] {
        transition: all 0.2s ease;
    }

    /* Loading state for inputs */
    .loading {
        position: relative;
        color: transparent;
    }

    .loading::after {
        content: "";
        position: absolute;
        width: 16px;
        height: 16px;
        top: 50%;
        left: 50%;
        margin: -8px 0 0 -8px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: white;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }
</style>
