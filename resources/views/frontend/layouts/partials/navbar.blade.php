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
                    <!-- City Search -->
                    <div class="relative">
                        <input type="text" id="city-search"
                            class="px-2 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                            placeholder="တိုင်း/ပြည်နယ်" onclick="showDropdown('city-dropdown')" />
                        <div id="city-dropdown"
                            class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                        </div>
                    </div>

                    <!-- Township Search -->
                    <div class="relative">
                        <input type="text" id="township-search"
                            class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                            placeholder="မြို့နယ်" onclick="showDropdown('township-dropdown')" />
                        <div id="township-dropdown"
                            class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                            <!-- Options will be populated by JavaScript -->
                        </div>
                    </div>

                    <!-- Category Search -->
                    <div class="relative">
                        <input type="text" id="category-search"
                            class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                            placeholder="အမျိုးအစား" onclick="showDropdown('category-dropdown')" />
                        <div id="category-dropdown"
                            class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                            <!-- Options will be populated by JavaScript -->
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-row gap-4">
                    <button id="search-button"
                        class="w-50 px-10 py-3 bg-[#66D230] text-white rounded-lg transition-all duration-300 font-medium shadow-md">
                        ရှာဖွေရန်
                    </button>
                    <button id="openModal"
                        class="w-50 px-10 py-3 border-2 border-[#66D230] text-[#66D230] rounded-lg hover:bg-[#66D230] hover:text-white transition-all duration-300 font-medium shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        စာရင်းသွင်းရန်
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Content -->
        <div id="mobile-menu-content" class="hidden md:hidden p-4 space-y-4">
            <!-- Search Inputs -->
            <div class="space-y-4">
                <div class="relative">
                    <input type="text" id="mobile-city-search"
                        class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                        placeholder="တိုင်း/ပြည်နယ်" onclick="showDropdown('mobile-city-dropdown')" />
                    <div id="mobile-city-dropdown"
                        class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                        <!-- Options will be populated by JavaScript -->
                    </div>
                </div>

                <div class="relative">
                    <input type="text" id="mobile-township-search"
                        class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                        placeholder="မြို့နယ်" onclick="showDropdown('mobile-township-dropdown')" />
                    <div id="mobile-township-dropdown"
                        class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                        <!-- Options will be populated by JavaScript -->
                    </div>
                </div>

                <div class="relative">
                    <input type="text" id="mobile-category-search"
                        class="px-4 py-3 w-full bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg text-white placeholder-gray-400"
                        placeholder="အမျိုးအစား" onclick="showDropdown('mobile-category-dropdown')" />
                    <div id="mobile-category-dropdown"
                        class="hidden absolute z-20 mt-1 w-full bg-gray-800 text-white rounded-lg shadow-xl max-h-60 overflow-y-auto border border-gray-700">
                        <!-- Options will be populated by JavaScript -->
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col space-y-4">
                <button id="mobile-search-button"
                    class="px-6 py-3 bg-[#66D230] text-white rounded-lg transition-all duration-300 font-medium shadow-md">
                    ရှာဖွေရန်
                </button>
                <button id="mobile-register-button"
                    class="px-6 py-3 border-2 border-[#66D230] text-[#66D230] rounded-lg hover:bg-[#66D230] hover:text-white transition-all duration-300 font-medium shadow-md hover:shadow-lg">
                    စာရင်းသွင်းရန်
                </button>
            </div>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script  src="{{asset('frontend/assets/js/app.js')}}"></script>
<script>
    // API Configuration
    
    const DIVISIONS_API_URL = BASE_API_URL + "/city";
    const CITIES_API_URL = BASE_API_URL + "/division/city-fetch/";
    const TOWNSHIPS_API_URL = BASE_API_URL + "/division/township-fetch/";
    const CATEGORIES_API_URL = BASE_API_URL + "/category";

    // Store selected IDs for reference
    const selectedItems = {
        city: null,
        township: null,
        category: null
    };

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

        // Store the selected ID
        if (itemId) {
            if (inputId.includes('city')) {
                selectedItems.city = itemId;
                fetchTownships(itemId);
                clearDependentFields(inputId, ['township']);
            } else if (inputId.includes('township')) {
                selectedItems.township = itemId;
            } else if (inputId.includes('category')) {
                selectedItems.category = itemId;
            }
        }

        checkSelections();
    }

    function clearDependentFields(inputId, fields) {
        const isMobile = inputId.includes('mobile');
        const prefix = isMobile ? 'mobile-' : '';

        fields.forEach(field => {
            document.getElementById(`${prefix}${field}-search`).value = '';
            document.getElementById(`${prefix}${field}-dropdown`).innerHTML = '';
            
            // Also clear the selected ID
            if (field === 'township') {
                selectedItems.township = null;
            }
        });
    }

    function checkSelections() {
        // Check desktop inputs
        const city = document.getElementById('city-search')?.value || document.getElementById('mobile-city-search')?.value;
        const township = document.getElementById('township-search')?.value || document.getElementById('mobile-township-search')?.value;
        const category = document.getElementById('category-search')?.value || document.getElementById('mobile-category-search')?.value;
    }

    function performSearch() {
        const city = document.getElementById('city-search')?.value || document.getElementById('mobile-city-search')?.value;
        const township = document.getElementById('township-search')?.value || document.getElementById('mobile-township-search')?.value;
        const category = document.getElementById('category-search')?.value || document.getElementById('mobile-category-search')?.value;

        if (!city || !township || !category) {
            showErrorToast("Please fill all search fields");
            return;
        }

        const localUrl = "http://localhost:8000/";
        let getUrl = window.location.href;
        let result = getUrl.replace(localUrl, '');

        let searchData = {
            type: result,
            city: city,
            township: township,
            category: category
        };

        let queryParams = new URLSearchParams(searchData).toString();
        window.location.href = `${localUrl}api/admin/fetch?${queryParams}`;
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

    // Add manual search functionality
    function setupManualSearch() {
        // For city search
        const citySearchElements = ['city-search', 'mobile-city-search'];
        citySearchElements.forEach(id => {
            const element = document.getElementById(id);
            if (element) {
                element.addEventListener('input', function() {
                    filterDropdownOptions(id, 'city');
                });
            }
        });
        
        // For township search
        const townshipSearchElements = ['township-search', 'mobile-township-search'];
        townshipSearchElements.forEach(id => {
            const element = document.getElementById(id);
            if (element) {
                element.addEventListener('input', function() {
                    filterDropdownOptions(id, 'township');
                });
            }
        });
        
        // For category search
        const categorySearchElements = ['category-search', 'mobile-category-search'];
        categorySearchElements.forEach(id => {
            const element = document.getElementById(id);
            if (element) {
                element.addEventListener('input', function() {
                    filterDropdownOptions(id, 'category');
                });
            }
        });
    }

    // Filter dropdown options based on search term
    function filterDropdownOptions(inputId, type) {
        const searchInput = document.getElementById(inputId);
        const searchTerm = searchInput.value.toLowerCase();
        const dropdownId = inputId.replace('-search', '-dropdown');
        const dropdown = document.getElementById(dropdownId);
        
        // Show dropdown on typing
        if (dropdown.classList.contains('hidden')) {
            showDropdown(dropdownId);
        }
        
        // Store the original options if not already stored
        if (!dropdown.hasAttribute('data-original')) {
            const originalOptions = dropdown.innerHTML;
            dropdown.setAttribute('data-original', originalOptions);
        }
        
        // If search term is empty, restore original dropdown
        if (searchTerm === '') {
            dropdown.innerHTML = dropdown.getAttribute('data-original');
            return;
        }
        
        // Determine which API to call based on type
        let apiPromise;
        switch (type) {
            case 'city':
                apiPromise = fetchAndFilterCities(searchTerm);
                break;
            case 'township':
                // Need the selected city ID
                if (selectedItems.city) {
                    apiPromise = fetchAndFilterTownships(selectedItems.city, searchTerm);
                } else {
                    showErrorToast("Please select a city first");
                    return;
                }
                break;
            case 'category':
                apiPromise = fetchAndFilterCategories(searchTerm);
                break;
            default:
                return;
        }
        
        // Show loading state
        dropdown.innerHTML = '<div class="px-4 py-2 text-gray-400">Searching...</div>';
        
        // Fetch and filter items
        apiPromise.then(filteredItems => {
            populateFilteredDropdown(dropdownId, filteredItems, inputId);
        }).catch(error => {
            console.error(`Error filtering ${type}:`, error);
            dropdown.innerHTML = '<div class="px-4 py-2 text-red-400">Error loading results</div>';
        });
    }

    // API functions to fetch and filter data
    async function fetchAndFilterCities(searchTerm) {
        try {
            const response = await axios.get(DIVISIONS_API_URL);
            if (response.data.status && response.data.data) {
                return response.data.data.filter(city => 
                    city.name.toLowerCase().includes(searchTerm)
                );
            }
            return [];
        } catch (error) {
            console.error('Error fetching cities:', error);
            return [];
        }
    }

    async function fetchAndFilterTownships(cityId, searchTerm) {
        try {
            const response = await axios.get(TOWNSHIPS_API_URL + cityId);
            if (response.data.status && response.data.data) {
                return response.data.data.filter(township => 
                    township.name.toLowerCase().includes(searchTerm)
                );
            }
            return [];
        } catch (error) {
            console.error('Error fetching townships:', error);
            return [];
        }
    }

    async function fetchAndFilterCategories(searchTerm) {
        try {
            const response = await axios.get(CATEGORIES_API_URL);
            if (response.data.status && response.data.data) {
                return response.data.data.filter(category => 
                    category.name.toLowerCase().includes(searchTerm)
                );
            }
            return [];
        } catch (error) {
            console.error('Error fetching categories:', error);
            return [];
        }
    }

    // Populate dropdown with filtered results
    function populateFilteredDropdown(dropdownId, items, inputId) {
        const dropdown = document.getElementById(dropdownId);
        dropdown.innerHTML = '';
        
        if (items.length === 0) {
            const noOption = document.createElement('div');
            noOption.className = 'px-4 py-2 text-gray-400';
            noOption.textContent = 'No matches found';
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
        
        // Setup manual search functionality
        setupManualSearch();
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