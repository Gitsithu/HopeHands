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
            <a href="#" class="flex items-center" style="margin-right: 20px !important">
                <img src="/frontend/assets/images/logo.png" alt="MyApp Logo" class="w-32">
            </a>

            <!-- Search Bar & Buttons -->
            <div class="flex flex-row items-center gap-4">
                <!-- Search Inputs -->
                <div class="grid grid-cols-4 gap-4">
                    <!-- Division Search -->
                    <!-- <div class="relative">
                        <input type="text" id="division-search"
                            class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                            placeholder="တိုင်းဒေသကြီး/ပြည်နယ်" readonly onclick="showDropdown('division-dropdown')" />
                        <div id="division-dropdown"
                            class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                        </div>
                    </div> -->

                    <!-- City Search -->
                    <div class="relative">
                        <input type="text" id="city-search"
                            class="px-2 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                            placeholder="တိုင်း/ပြည်နယ်" readonly onclick="showDropdown('city-dropdown')" />
                        <div id="city-dropdown"
                            class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
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

                    <!-- Type Search -->
                    <div class="relative">
                        <!-- <input type="text" id="type-search"
                            class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                            placeholder="" readonly/>
                        <div id="category-dropdown"
                            class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                        </div> -->
                        <select name="donator-dropdown" class="px-2 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400">
                            <option class="px-4 py-2 hover:bg-gray-700" value="donator">အလှူရှင်</option>
                            <option class="px-4 py-2 hover:bg-gray-700" value="help-seeker">အလှူခံပုဂ္ဂိုလ်</option>
                        </select>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-row gap-4">
                    <button id="search-button"
                        class="w-50 px-10 py-3 bg-blue-600 text-white rounded-lg transition-all duration-300 font-medium shadow-md">
                        ရှာဖွေရန်
                    </button>
                    {{-- <button
                        class="w-50 px-10 border-2 border-blue-500 text-white rounded-lg hover:bg-blue-500 transition-all duration-300 font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        စာရင်းသွင်းရန်
                    </button> --}}
                    <button id="openModal"
                        class="w-50 px-10 py-3 border-2 border-blue-500 text-blue-500 rounded-lg hover:bg-blue-500 hover:text-white transition-all duration-300 font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        စာရင်းသွင်းရန်
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Content -->
        <div id="mobile-menu-content" class="hidden md:hidden p-4 space-y-4">
            <!-- Search Inputs -->
            <div class="space-y-4">
                <!-- <div class="relative">
                    <input type="text" id="mobile-division-search"
                        class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                        placeholder="တိုင်းဒေသကြီး/ပြည်နယ်" readonly
                        onclick="showDropdown('mobile-division-dropdown')" />
                    <div id="mobile-division-dropdown"
                        class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                    </div>
                </div> -->

                <div class="relative">
                    <input type="text" id="mobile-city-search"
                        class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                        placeholder="တိုင်း/ပြည်နယ်" readonly onclick="showDropdown('mobile-city-dropdown')" />
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
                <button
                    class="px-6 py-3 border-2 border-blue-500 text-white rounded-lg hover:bg-blue-500 transition-all duration-300 font-medium shadow-md hover:shadow-lg">
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
    const DIVISIONS_API_URL = BASE_API_URL + "/city";
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

    // function selectItem(inputId, value, dropdownId, itemId = null) {
    //     document.getElementById(inputId).value = value;
    //     document.getElementById(dropdownId).classList.add('hidden');

    //     // If this is a division selection, fetch cities for that division
    //     if (inputId.includes('division') && itemId) {
    //         fetchCities(itemId);
    //         clearDependentFields(inputId, ['city', 'township']);
    //     }
    //     // If this is a city selection, fetch townships for that city
    //     else if (inputId.includes('city') && itemId) {
    //         fetchTownships(itemId);
    //         clearDependentFields(inputId, ['township']);
    //     }

    //     checkSelections();
    // }

    function selectItem(inputId, value, dropdownId, itemId = null) {
        const inputElement = document.getElementById(inputId);

        // Store the selected value and its ID
        inputElement.value = value;
        inputElement.setAttribute('data-id', itemId || '');

        // Hide the dropdown
        document.getElementById(dropdownId).classList.add('hidden');

        // Fetch dependent data if applicable
        if (inputId.includes('division') && itemId) {
            fetchCities(itemId);
            clearDependentFields(['city-search', 'township-search']);
        } else if (inputId.includes('city') && itemId) {
            fetchTownships(itemId);
            clearDependentFields(['township-search']);
        }

        checkSelections();
    }

    // function clearDependentFields(inputId, fields) {
    //     const isMobile = inputId.includes('mobile');
    //     const prefix = isMobile ? 'mobile-' : '';

    //     fields.forEach(field => {
    //         document.getElementById(`${prefix}${field}-search`).value = '';
    //         document.getElementById(`${prefix}${field}-dropdown`).innerHTML = '';
    //     });
    // }

    function clearDependentFields(fieldIds) {
        fieldIds.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            field.value = '';        // Clear text
            field.setAttribute('data-id', '');  // Clear stored ID
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

        // const searchButton = document.getElementById('search-button');
        // const mobileSearchButton = document.getElementById('mobile-search-button');

        // // Update button states without hiding them
        // const isComplete = city;

        // if (searchButton) {
        //     searchButton.disabled = !isComplete;
        //     if (isComplete) {
        //         searchButton.classList.add('hover:bg-blue-700', 'transform', 'hover:-translate-y-0.5',
        //             'hover:shadow-lg');
        //         searchButton.classList.remove('opacity-75', 'cursor-not-allowed');
        //     } else {
        //         searchButton.classList.remove('hover:bg-blue-700', 'transform', 'hover:-translate-y-0.5',
        //             'hover:shadow-lg');
        //         searchButton.classList.add('opacity-75', 'cursor-not-allowed');
        //     }
        // }

        // if (mobileSearchButton) {
        //     mobileSearchButton.disabled = !isComplete;
        //     if (isComplete) {
        //         mobileSearchButton.classList.add('hover:bg-blue-700', 'hover:shadow-lg');
        //         mobileSearchButton.classList.remove('opacity-75', 'cursor-not-allowed');
        //     } else {
        //         mobileSearchButton.classList.remove('hover:bg-blue-700', 'hover:shadow-lg');
        //         mobileSearchButton.classList.add('opacity-75', 'cursor-not-allowed');
        //     }
        // }
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
                populateDropdown('city-dropdown', divisions, 'city-search');

                // Populate mobile division dropdown
                populateDropdown('mobile-city-dropdown', divisions, 'mobile-city-search');

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
</script>

<!-- Store API -->
<script>

    // document.getElementById('search-button').addEventListener('click', function () {

    //     const localUrl = "http://localhost:8000/";

    //     let getUrl = window.location.href;;
    //     let result = getUrl.replace(localUrl,'');

    //     let searchData = {
    //         type: result,
    //         // division: document.getElementById('division-search').value,
    //         city: document.getElementById('city-search').value,
    //         township: document.getElementById('township-search').value,
    //         category: document.getElementById('category-search').value
    //     };

    //     sendSearchRequest(searchData);
    // });


    // function sendSearchRequest(searchData) {
    //     console.log(searchData, 'searchData');

    //     axios.post(`${BASE_API_URL}/filter`, searchData)
    //         .then(response => {
    //             // console.log('Search results:', response.data);
    //         })
    //         .catch(error => {
    //             // console.error('Error fetching search results:', error);
    //         });
    // }


    document.getElementById('search-button').addEventListener('click', function () {

        let searchData = {
            type: window.location.href.replace("http://localhost:8000/", ""),
            division: document.getElementById('city-search').getAttribute('data-id'),
            township: document.getElementById('township-search').getAttribute('data-id'),
            category: document.getElementById('category-search').getAttribute('data-id')
        };

        sendSearchRequest(searchData);
    });


    function sendSearchRequest(searchData) {
        const queryString = new URLSearchParams(searchData).toString();
        axios.post(`${BASE_API_URL}/filter`, searchData)
            .then(response => {
                // Redirect to results page with search data in the URL
                window.location.href = `/receivers?${queryString}`;  // Pass search data in the query string
            })
            .catch(error => {
                console.error('Error fetching search results:', error);
            });
    }

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