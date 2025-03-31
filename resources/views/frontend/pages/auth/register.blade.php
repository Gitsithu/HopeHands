@extends('frontend.layouts.master')

@section('title', 'Create')

@section('content')
    <div class="w-full">
        <div class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4 border border-gray-200">
            <form id="content-form" method="POST" enctype="multipart/form-data">
                @csrf
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">စာရင်းသွင်းရန်</h2>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        အသုံးပြုသူအမည်
                    </label>
                    <input
                        class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        id="username" name="username" type="text" placeholder="အသုံးပြုသူအမည်...">
                    <p class="text-red-500 text-sm mt-1 error-text" id="error-username"></p>
                </div>

                {{-- <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="division">
                        ကူညီရန်အမျိုးအစား
                    </label>
                    <select
                        class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        id="category" name="category_id">
                        <option value="">ကူညီရန်အမျိုးအစား ရွေးချယ်ပါ။</option>
                        <p class="text-red-500 text-sm mt-1 error-text" id="error-category_id"></p>
                    </select>
                </div> --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="division">
                        ကူညီရန်အမျိုးအစား
                    </label>
                    <select
                        class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        id="category" name="category_id">
                        <option value="">ကူညီရန်အမျိုးအစား ရွေးချယ်ပါ။</option>
                        <!-- Your other options will go here -->
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="division">
                        တိုင်းဒေသကြီး
                    </label>
                    <select
                        class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        id="division" name="city_id">
                        <option value="">တိုင်းဒေသကြီး ရွေးချယ်ပါ။</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="township">
                        မြို့နယ်
                    </label>
                    <select
                        class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        id="township" name="township_id">
                        <option value="">မြို့နယ် ရွေးချယ်ပါ။</option>
                        <p class="text-red-500 text-sm mt-1 error-text" id="error-township_id"></p>
                    </select>
                </div>

                <!-- Phone Field -->
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


                <div id="contact-fields-container"></div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="image-upload-1">
                        သက်သေခံကတ်/မှတ်ပုံတင် အရှေ့ခြမ်း
                    </label>
                    <input
                        class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        type="file" id="image-upload-1" name="front_view" accept="image/*">
                    <p class="text-gray-600 text-xs italic">JPEG, PNG သို့မဟုတ် GIF ဖိုင်များသာ (အများဆုံး 5MB)</p>
                    <p class="text-red-500 text-sm mt-1 error-text" id="error-front_view"></p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="image-upload-2">
                        သက်သေခံကတ်/မှတ်ပုံတင် အနောက်ခြမ်း
                    </label>
                    <input
                        class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        type="file" id="image-upload-2" name="back_view" accept="image/*">
                    <p class="text-gray-600 text-xs italic">JPEG, PNG သို့မဟုတ် GIF ဖိုင်များသာ (အများဆုံး 5MB)</p>
                    <p class="text-red-500 text-sm mt-1 error-text" id="error-back_view"></p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="remark">
                        မှတ်ချက်
                    </label>
                    <div class="relative">
                        <textarea name="remark" id="remark" cols="30" rows="10"
                            class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="မှတ်ချက်ရေးပါ..."></textarea>
                        <p class="text-red-500 text-sm pt-2 error-text" id="error-remark"></p>
                    </div>
                </div>
                {{-- <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        လျှို့ဝှက်နံပါတ်
                    </label>
                    <div class="relative">
                        <input
                            class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            type="password" id="password" name="password" placeholder="လျှို့ဝှက်နံပါတ်ထည့်ပါ">
                        <button type="button" onclick="togglePassword('password', 'eye-icon-password')"
                            class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-600">
                            <i id="eye-icon-password" class="fas fa-eye"></i>
                        </button>
                        <p class="text-red-500 text-sm pt-2 error-text" id="error-password"></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        စကားဝှက်အတည်ပြု
                    </label>
                    <div class="relative">
                        <input
                            class="w-full px-4 py-2.5 text-sm text-gray-800 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            type="password" id="confirm_password" name="confirm_password"
                            placeholder="စကားဝှက်အတည်ပြုပါ">
                        <button type="button" onclick="togglePassword('confirm_password', 'eye-icon-confirm')"
                            class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-600">
                            <i id="eye-icon-confirm" class="fas fa-eye"></i>
                        </button>
                        <p class="text-red-500 text-sm pt-2 error-text" id="error-confirm_password"></p>
                    </div>
                </div> --}}

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center">
                    <button
                        class="bg-[#66D230] text-white text-[#66D230] rounded-lg hover:bg-[#66D230] hover:text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full cursor-pointer"
                        type="submit">
                        စာရင်းသွင်းမည်
                    </button>
                </div>
            </form>
            <div class="mt-6 text-center">
                <p class="text-gray-600 text-sm">
                    အကောင့်ရှိပြီးသားလား?
                    <a href="{{ route('donator.login') }}" class="text-blue-500 hover:text-blue-700 font-semibold">
                        အကောင့်ဝင်ရန်
                    </a>
                </p>
            </div>
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </div>
@endsection
@section('script')
    <!-- Include jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initialize Select2
            $('#category').select2({
                placeholder: "ကူညီရန်အမျိုးအစား ရွေးချယ်ပါ။",
                allowClear: true,
                width: '100%',
                language: {
                    noResults: function() {
                        return "ရလဒ်မတွေ့ပါ";
                    }
                }
            });

            // $('#division').select2({
            //     placeholder: "ကူညီရန်အမျိုးအစား ရွေးချယ်ပါ။",
            //     allowClear: true,
            //     width: '100%',
            //     language: {
            //         noResults: function() {
            //             return "ရလဒ်မတွေ့ပါ";
            //         }
            //     }
            // });

            // $('#township').select2({
            //     placeholder: "ကူညီရန်အမျိုးအစား ရွေးချယ်ပါ။",
            //     allowClear: true,
            //     width: '100%',
            //     language: {
            //         noResults: function() {
            //             return "ရလဒ်မတွေ့ပါ";
            //         }
            //     }
            // });

            // Optional: If you need to handle errors with Select2
            $('#category').on('change', function() {
                $('#error-category_id').text(''); // Clear error when selection changes
            });
        });

        function togglePassword(fieldId, iconId) {
            const passwordField = document.getElementById(fieldId);
            const eyeIcon = document.getElementById(iconId);

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
        document.getElementById('contact-method').addEventListener('change', function() {
            const container = document.getElementById('contact-fields-container');
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
    </script>
    <script>
        const DIVISION_API_URL = BASE_API_URL + "/city";

        document.addEventListener('DOMContentLoaded', function() {
            fetchCatgory();
            fetchDivisions();
            document.getElementById('division').addEventListener('change', function() {
                const divisionId = this.value;
                if (divisionId) {
                    fetchTownships(divisionId);
                } else {
                    const townshipSelect = document.getElementById('township');
                    townshipSelect.innerHTML = '<option value="">မြို့နယ် ရွေးချယ်ပါ။</option>';
                    townshipSelect.disabled = true;
                }
            });

            document.getElementById("content-form").addEventListener("submit", function(event) {
                event.preventDefault();
                submitForm();
            });
        });

        function fetchCatgory() {
            const categorySelect = document.getElementById('category');

            // Show loading state
            categorySelect.innerHTML = '<option value="">လုပ်ဆောင်နေဆဲ...</option>';

            axios.get(CATEGORIES_API_URL)
                .then(response => {
                    // Clear existing options
                    categorySelect.innerHTML = '<option value="">ကူညီရန်အမျိုးအစား ရွေးချယ်ပါ။</option>';
                    // Add new options from API
                    response.data.data.forEach(category => {
                        const option = document.createElement('option');
                        option.value = category.id;
                        option.textContent = category.name;
                        categorySelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching categorys:', error);
                    categorySelect.innerHTML = `
        <option value="">ကူညီရန်အမျိုးအစားများ ရယူရာတွင် အမှားတစ်ခုဖြစ်နေပါသည်</option>
      `;
                });
        }

        function fetchDivisions() {
            const divisionSelect = document.getElementById('division');

            // Show loading state
            divisionSelect.innerHTML = '<option value="">လုပ်ဆောင်နေဆဲ...</option>';

            axios.get(DIVISION_API_URL)
                .then(response => {
                    // Clear existing options
                    divisionSelect.innerHTML = '<option value="">တိုင်းဒေသကြီး ရွေးချယ်ပါ။</option>';
                    // Add new options from API
                    response.data.data.forEach(division => {
                        const option = document.createElement('option');
                        option.value = division.id;
                        option.textContent = division.name;
                        divisionSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching divisions:', error);
                    divisionSelect.innerHTML = `
        <option value="">တိုင်းဒေသကြီးများ ရယူရာတွင် အမှားတစ်ခုဖြစ်နေပါသည်</option>
      `;
                });
        }


        function fetchTownships(divisionId) {
            const townshipSelect = document.getElementById('township');

            // Show loading state
            townshipSelect.innerHTML = '<option value="">လုပ်ဆောင်နေဆဲ...</option>';

            axios.get(`${TOWNSHIPS_API_URL}${divisionId}`)
                .then(response => {
                    // Clear existing options
                    townshipSelect.innerHTML = '<option value="">မြို့နယ် ရွေးချယ်ပါ။</option>';
                    // Add new options from API
                    response.data.data.forEach(township => {
                        const option = document.createElement('option');
                        option.value = township.id;
                        option.textContent = township.name;
                        townshipSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching divisions:', error);
                    divisionSelect.innerHTML = `
        <option value="">မြို့နယ်များ ရယူရာတွင် အမှားတစ်ခုဖြစ်နေပါသည်</option>
      `;
                });
        }

        function clearValidationErrors() {
            document.querySelectorAll(".error-text").forEach(el => el.textContent = "");
        }

        // Function to show validation errors inside form tags
        function showValidationErrors(errors) {
            clearValidationErrors();

            Object.keys(errors).forEach(field => {
                let errorElement = document.getElementById("error-" + field);
                if (errorElement) {
                    errorElement.textContent = errors[field][0]; // Show only the first error message
                }
            });
        }

        function submitForm() {
            let form = document.getElementById("content-form");
            let formData = new FormData(form);

            axios.post(`${BASE_API_URL}/donator/register`, formData, {
                    headers: {
                        "Content-Type": "multipart/form-data"
                    }
                })
                .then(response => {

                    if (response.data.data) {
                        sessionStorage.setItem("authToken", response.data.data
                            .token);
                        window.location.href = "{{ route('donators') }}";

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
        }
    </script>
@endsection
