<div class="wrapper">
    <!-- Your main content goes here -->
    <div class="main-content">
        <!-- Main content -->
    </div>

    <footer class="bg-black text-white py-4">
        <div class="max-w-7xl mx-auto text-center">
            <p style="margin-left: 60px">Copyright © <span id="yearly"></span> All rights reserved. Developed By
                <a href="https://softnovations.com/" style="color: #0056b3" target="_blank">Softnovations</a>
            </p>
        </div>
    </footer>
</div>

<style>
    html,
    body {
        height: 100%;
        margin: 0;
    }

    .wrapper {
        display: flex;
        flex-direction: column;
        min-height: 18%;
    }

    .main-content {
        flex: 1;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const copyrightYearSpan = document.getElementById('yearly');
        copyrightYearSpan.textContent = new Date().getFullYear();
    });
</script>