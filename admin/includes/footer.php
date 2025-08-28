<footer class="bg-gray-100 text-gray-500 text-xs rounded-lg mt-12 px-4 py-6 shadow-inner text-center w-full">
  &copy; 2025 Club Deportivo Patagones. Todos los derechos reservados.
</footer>

<!-- Scripts globales -->
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
<script>
    const navbar = document.getElementById("navbar");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
            navbar.classList.remove("bg-gray-900", "shadow-md");
            navbar.classList.add("bg-transparent");
        } else {
            navbar.classList.add("bg-gray-900", "shadow-md");
            navbar.classList.remove("bg-transparent");
        }
    });
</script>