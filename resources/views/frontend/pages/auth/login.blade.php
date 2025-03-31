@extends('frontend.layouts.master')

@section('title', 'Register')

@section('content')
    <div class="w-full my-5">
        <form class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">သင့်အကောင့်သို့ဝင်ရောက်ရန်</h2>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    အသုံးပြုသူအမည်
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="username" type="text" placeholder="အသုံးပြုသူအမည်...">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    လျှို့ဝှက်နံပါတ်
                </label>
                <div class="relative">
                    <input
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="password" id="password" name="password" placeholder="လျှို့ဝှက်နံပါတ်ထည့်ပါ" required>
                    <button type="button" onclick="togglePassword()"
                        class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-600">
                        <i id="eye-icon" class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center">
                <button
                    class="bg-[#66D230] text-white text-[#66D230] rounded-lg hover:bg-[#66D230] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full"
                    type="submit">
                    ဝင်ရောက်ပါမည်
                </button>
            </div>
            <div class="mt-6 text-center">
                <p class="text-gray-600 text-sm">
                    အကောင့်မရှိပါက?
                    <a href="{{ route('donator.register') }}" class="text-blue-500 hover:text-blue-700 font-semibold">
                        အကောင့်ဖွင့်ဝင်ရန်
                    </a>
                </p>
            </div>
        </form>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </div>
@endsection
@section('script')
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

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

        $("form").on("submit", function(event) {
            event.preventDefault();

            let username = $("#username").val().trim();
            let password = $("#password").val().trim();
            let isValid = true;

            // Remove any existing error messages
            $(".error-message").remove();


            // Validate password length
            if (password.length < 6) {
                $("#password").after(
                    '<span class="error-message text-danger">Password must be at least 6 characters</span>'
                );
                isValid = false;
            }

            if (!isValid) return;

            // Proceed with API request if validation passes
            axios.post(BASE_API_URL + "/login", {
                    username: username,
                    password: password
                })
                .then(function(response) {
                    console.log("Login response:", response.data.data.token);
                    if (response.data.data.token) {
                        console.log("Login successful!");
                        sessionStorage.setItem("authToken", response.data.data
                            .token); // Store token in session
                        window.location.href = "{{ route('donators') }}";
                    } else {
                        alert("Invalid login credentials.");
                    }
                })
                .catch(function(error) {
                    $("#password").after(
                        `<span class="error-message text-danger">${error.response.data.message}</span>`
                    );
                    // alert("Login failed. Please check your credentials.");
                    $("#password").val("");
                });
        });
    </script>
@endsection
