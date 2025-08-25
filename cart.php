<?php include 'includes/header.php'; ?>

<body class="font-sans antialiased bg-gray-50 text-gray-900">
  <?php include 'includes/navbar.php'; ?>

  <!-- Carrito de Compras -->
  <section class="py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <h2 class="text-3xl font-bold mb-12 text-center">Tu Carrito</h2>

      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

        <!-- Producto 1 -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
          <img src="assets\img\Captura de pantalla 2025-08-25 131623.png" alt="Producto 1" class="w-full h-48 object-cover">
          <div class="p-6">
            <h3 class="text-xl font-semibold mb-2">Auto Deportivo 1</h3>
            <p class="text-gray-600 mb-4">Motor 2.0L Turbo, 250 HP</p>
            <div class="flex items-center justify-between mb-4">
              <span class="text-lg font-bold">$50,000</span>
              <input type="number" value="1" min="1" class="w-16 border rounded px-2 py-1">
            </div>
            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold shadow-md">
              Quitar
            </button>
          </div>
        </div>

        <!-- Producto 2 -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
          <img src="assets\img\Captura de pantalla 2025-08-25 131623.png" alt="Producto 2" class="w-full h-48 object-cover">
          <div class="p-6">
            <h3 class="text-xl font-semibold mb-2">Auto Deportivo 2</h3>
            <p class="text-gray-600 mb-4">Motor 3.0L V6, 320 HP</p>
            <div class="flex items-center justify-between mb-4">
              <span class="text-lg font-bold">$70,000</span>
              <input type="number" value="1" min="1" class="w-16 border rounded px-2 py-1">
            </div>
            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold shadow-md">
              Quitar
            </button>
          </div>
        </div>

        <!-- Producto 3 -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
          <img src="assets\img\Captura de pantalla 2025-08-25 131623.png" alt="Producto 3" class="w-full h-48 object-cover">
          <div class="p-6">
            <h3 class="text-xl font-semibold mb-2">Auto Deportivo 3</h3>
            <p class="text-gray-600 mb-4">Motor 2.5L, 280 HP</p>
            <div class="flex items-center justify-between mb-4">
              <span class="text-lg font-bold">$60,000</span>
              <input type="number" value="1" min="1" class="w-16 border rounded px-2 py-1">
            </div>
            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold shadow-md">
              Quitar
            </button>
          </div>
        </div>

      </div>

      <!-- Total y botón de compra -->
      <div class="mt-12 flex flex-col md:flex-row md:justify-end md:items-center gap-6">
        <div class="text-right">
          <p class="text-2xl font-bold">Total: $180,000</p>
        </div>
        <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold shadow-lg">
          Finalizar Compra
        </button>
      </div>
    </div>
  </section>

  <?php include 'includes/footer.php'; ?>

    <!-- Script navbar scroll -->
  <script>
    const navbar = document.getElementById('navbar');
    const navLinks = document.querySelectorAll('#navbar .nav-link');

    if (navbar) {
      const applyScrollState = () => {
        const scrolled = window.scrollY > 0;
        navbar.classList.toggle('bg-blue-600', scrolled);
        navbar.classList.toggle('shadow-md', scrolled);
        navbar.classList.toggle('bg-transparent', !scrolled);

        navLinks.forEach(a => {
          a.classList.toggle('text-white', scrolled);
          a.classList.toggle('hover:text-gray-200', scrolled);
        });
      };

      applyScrollState();
      window.addEventListener('scroll', applyScrollState);
    }
  </script>
</body>
</html>
