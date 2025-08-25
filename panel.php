<?php include 'includes/header.php'; ?>

<body class="font-sans antialiased bg-gray-50 text-gray-900">
  <?php include 'includes/navbar_admin.php'; ?>

  <!-- Dashboard de Ventas -->
  <section class="py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <h1 class="text-4xl font-bold mb-12 text-center text-gray-800">Dashboard de Ventas</h1>

      <!-- Resumen de métricas -->
      <div class="grid md:grid-cols-4 gap-6 mb-12">
        <div class="bg-white rounded-xl shadow-lg p-6">
          <h2 class="text-lg font-semibold text-gray-600 mb-2">Ventas Hoy</h2>
          <p class="text-3xl font-bold text-gray-800">12</p>
          <p class="text-sm text-gray-500 mt-1">Total de transacciones</p>
        </div>
        <div class="bg-white rounded-xl shadow-lg p-6">
          <h2 class="text-lg font-semibold text-gray-600 mb-2">Ingresos</h2>
          <p class="text-3xl font-bold text-gray-800">$45.230</p>
          <p class="text-sm text-gray-500 mt-1">Ingresos acumulados hoy</p>
        </div>
        <div class="bg-white rounded-xl shadow-lg p-6">
          <h2 class="text-lg font-semibold text-gray-600 mb-2">Clientes Nuevos</h2>
          <p class="text-3xl font-bold text-gray-800">5</p>
          <p class="text-sm text-gray-500 mt-1">Registrados hoy</p>
        </div>
        <div class="bg-white rounded-xl shadow-lg p-6">
          <h2 class="text-lg font-semibold text-gray-600 mb-2">Productos Vendidos</h2>
          <p class="text-3xl font-bold text-gray-800">18</p>
          <p class="text-sm text-gray-500 mt-1">Cantidad total</p>
        </div>
      </div>

      <!-- Gráficos -->
      <div class="grid md:grid-cols-2 gap-6 mb-12">
        <!-- Ventas por producto -->
        <div class="bg-white rounded-xl shadow-lg p-6">
          <h2 class="text-xl font-semibold mb-4 text-gray-700">Ventas por Producto</h2>
          <canvas id="ventasProducto" class="w-full h-64"></canvas>
        </div>

        <!-- Ventas por mes -->
        <div class="bg-white rounded-xl shadow-lg p-6">
          <h2 class="text-xl font-semibold mb-4 text-gray-700">Ingresos Mensuales</h2>
          <canvas id="ingresosMes" class="w-full h-64"></canvas>
        </div>
      </div>

      <!-- Tabla de ventas recientes -->
      <div class="bg-white rounded-xl shadow-lg overflow-x-auto mb-12">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-100">
            <tr>
              <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">ID Venta</th>
              <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Cliente</th>
              <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Producto</th>
              <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Cantidad</th>
              <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Total</th>
              <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Fecha</th>
              <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Acciones</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr class="hover:bg-gray-50 transition">
              <td class="px-6 py-4">001</td>
              <td class="px-6 py-4">Juan Pérez</td>
              <td class="px-6 py-4">Moto 125cc</td>
              <td class="px-6 py-4">1</td>
              <td class="px-6 py-4">$120.000</td>
              <td class="px-6 py-4">25/08/2025</td>
              <td class="px-6 py-4 flex gap-2">
                <button class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700">Ver</button>
                <button class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700">Eliminar</button>
              </td>
            </tr>
            <tr class="hover:bg-gray-50 transition">
              <td class="px-6 py-4">002</td>
              <td class="px-6 py-4">María López</td>
              <td class="px-6 py-4">Casco Integral</td>
              <td class="px-6 py-4">2</td>
              <td class="px-6 py-4">$30.000</td>
              <td class="px-6 py-4">25/08/2025</td>
              <td class="px-6 py-4 flex gap-2">
                <button class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700">Ver</button>
                <button class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700">Eliminar</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Productos más vendidos -->
      <div class="mb-12">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">Productos Más Vendidos</h2>
        <div class="grid md:grid-cols-3 gap-6">
          <div class="bg-white rounded-xl shadow-lg p-4 flex items-center gap-4">
            <img src="assets\img\Captura de pantalla 2025-08-25 132326.png" alt="Moto 125cc" class="w-20 h-20 object-cover rounded-lg shadow-md">
            <div>
              <h3 class="font-semibold text-gray-800">Auto 1</h3>
              <p class="text-gray-500 text-sm">Vendidas: 10</p>
            </div>
          </div>
          <div class="bg-white rounded-xl shadow-lg p-4 flex items-center gap-4">
            <img src="assets\img\Captura de pantalla 2025-08-25 132326.png" alt="Casco Integral" class="w-20 h-20 object-cover rounded-lg shadow-md">
            <div>
              <h3 class="font-semibold text-gray-800">Auto 2</h3>
              <p class="text-gray-500 text-sm">Vendidas: 8</p>
            </div>
          </div>
          <div class="bg-white rounded-xl shadow-lg p-4 flex items-center gap-4">
            <img src="assets\img\Captura de pantalla 2025-08-25 132330.png" alt="Guantes Moto" class="w-20 h-20 object-cover rounded-lg shadow-md">
            <div>
              <h3 class="font-semibold text-gray-800">Auto 3</h3>
              <p class="text-gray-500 text-sm">Vendidas: 5</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include 'includes/footer.php'; ?>

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctxProductos = document.getElementById('ventasProducto').getContext('2d');
    const ventasProducto = new Chart(ctxProductos, {
      type: 'bar',
      data: {
        labels: ['Moto 125cc', 'Casco Integral', 'Guantes', 'Chaqueta', 'Botas'],
        datasets: [{
          label: 'Ventas',
          data: [12, 8, 5, 3, 2],
          backgroundColor: 'rgba(37, 99, 235, 0.7)',
          borderColor: 'rgba(37, 99, 235, 1)',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true } }
      }
    });

    const ctxIngresos = document.getElementById('ingresosMes').getContext('2d');
    const ingresosMes = new Chart(ctxIngresos, {
      type: 'line',
      data: {
        labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
        datasets: [{
          label: 'Ingresos',
          data: [20000, 30000, 25000, 40000, 45000, 50000],
          backgroundColor: 'rgba(37, 99, 235, 0.3)',
          borderColor: 'rgba(37, 99, 235, 1)',
          borderWidth: 2,
          tension: 0.4,
          fill: true
        }]
      },
      options: { responsive: true }
    });
  </script>
    <!-- Script navbar scroll -->
  <script>
    const navbar = document.getElementById('navbar');
    const navLinks = document.querySelectorAll('#navbar .nav-link');

    if (navbar) {
      const applyScrollState = () => {
        const scrolled = window.scrollY > 10;
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
