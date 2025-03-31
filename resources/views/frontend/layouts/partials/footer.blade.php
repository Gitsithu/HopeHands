<footer class="bg-black text-white py-4" style="">
    <div class="max-w-7xl mx-auto text-center">
        <p style="margin-left: 60px">Copyright © <span id="yearly"></span> All rights reserved. Developed By 
            <a href="https://softnovations.com/" style="color: #0056b3" target="_blank">Softnovations</a>
        </p>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const copyrightYearSpan = document.getElementById('yearly');
        copyrightYearSpan.textContent = new Date().getFullYear();
    });
</script>