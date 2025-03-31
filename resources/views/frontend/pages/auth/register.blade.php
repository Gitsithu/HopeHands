@extends('frontend.layouts.master')

@section('title', 'Register')

@section('content')
    <div class="w-full">
        <div class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
            <form id="content-form" method="POST" enctype="multipart/form-data">
                @csrf
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">စာရင်းသွင်းရန်</h2>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        အသုံးပြုသူအမည်
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="username" name="username" type="text" placeholder="အသုံးပြုသူအမည်...">
                    <p class="text-red-500 text-sm mt-1 error-text" id="error-username"></p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="division">
                        ကူညီရန်အမျိုးအစား
                    </label>
                    <select
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="category" name="category_id">
                        <option value="">ကူညီရန်အမျိုးအစား ရွေးချယ်ပါ။</option>
                        <!-- Options will be populated by JavaScript -->
                        <p class="text-red-500 text-sm mt-1 error-text" id="error-category_id"></p>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="division">
                        တိုင်းဒေသကြီး
                    </label>
                    <select
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="division" name="city_id">
                        <option value="">တိုင်းဒေသကြီး ရွေးချယ်ပါ။</option>
                        <!-- Options will be populated by JavaScript -->
                        <p class="text-red-500 text-sm mt-1 error-text" id="error-city_id"></p>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="township">
                        မြို့နယ်
                    </label>
                    <select
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
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
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="phone" type="text" name="phone" placeholder="ဖုန်းနံပါတ်...">
                    <p class="text-red-500 text-sm mt-1 error-text" id="error-phone"></p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="contact-method">
                        ဆက်သွယ်ရန်
                    </label>
                    <select
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
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
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="file" id="image-upload-1" name="front_view" accept="image/*">
                    <p class="text-gray-600 text-xs italic">JPEG, PNG သို့မဟုတ် GIF ဖိုင်များသာ (အများဆုံး 5MB)</p>
                    <p class="text-red-500 text-sm mt-1 error-text" id="error-front_view"></p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="image-upload-2">
                        သက်သေခံကတ်/မှတ်ပုံတင် အနောက်ခြမ်း
                    </label>
                    <input
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="file" id="image-upload-2" name="back_view" accept="image/*">
                    <p class="text-gray-600 text-xs italic">JPEG, PNG သို့မဟုတ် GIF ဖိုင်များသာ (အများဆုံး 5MB)</p>
                    <p class="text-red-500 text-sm mt-1 error-text" id="error-back_view"></p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        လျှို့ဝှက်နံပါတ်
                    </label>
                    <div class="relative">
                        <input
                            class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
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
                            class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="password" id="confirm_password" name="confirm_password"
                            placeholder="စကားဝှက်အတည်ပြုပါ">
                        <button type="button" onclick="togglePassword('confirm_password', 'eye-icon-confirm')"
                            class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-600">
                            <i id="eye-icon-confirm" class="fas fa-eye"></i>
                        </button>
                        <p class="text-red-500 text-sm pt-2 error-text" id="error-confirm_password"></p>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center">
                    <button
                        class="bg-[#66D230] text-white text-[#66D230] rounded-lg hover:bg-[#66D230] hover:text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full"
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
    <script>
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
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
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
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" id="telegram-username" name="telegram_username" placeholder="@username">
                    <p class="text-red-500 text-sm mt-1 error-text" id="error-telegram_username"></p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="telegram-phone">
                    Telegram ဖုန်းနံပါတ် (optional)
                </label>
                <input
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
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
                    console.log(error);
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
                        option.textContent = division.name_mm;
                        divisionSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.log(error);
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
                    console.log(error);
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
