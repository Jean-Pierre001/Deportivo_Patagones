<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="flex min-h-screen bg-gray-100">
  <?php include 'includes/sidebar.php'; ?>

  <!-- Contenedor principal en columna -->
  <div class="flex flex-col flex-1">

    <!-- Main -->
    <main class="flex-1 p-8 overflow-y-auto">
      <!-- Encabezado -->
      <div class="bg-white rounded-xl p-8 shadow mb-8 border-l-4 border-green-600">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Base para ADMIN</h1>
        <p class="text-gray-600">vamos a utilizar esta estructura para hacer el gestor de administradores la paleta de colores vamos a verlo despues.</p>
      </div>

      <!-- Widgets -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-gray-900 text-white rounded-xl p-6 shadow hover:scale-105 transform transition">
          <div class="flex justify-between items-center">
            <span class="text-3xl font-bold">1.250</span>
            <i class="fas fa-users text-3xl text-green-500"></i>
          </div>
          <p class="text-sm mt-2 text-gray-300">Socios activos</p>
        </div>

        <div class="bg-gray-900 text-white rounded-xl p-6 shadow hover:scale-105 transform transition">
          <div class="flex justify-between items-center">
            <span class="text-3xl font-bold">85</span>
            <i class="fas fa-calendar-check text-3xl text-green-500"></i>
          </div>
          <p class="text-sm mt-2 text-gray-300">Reservas hoy</p>
        </div>

        <div class="bg-gray-900 text-white rounded-xl p-6 shadow hover:scale-105 transform transition">
          <div class="flex justify-between items-center">
            <span class="text-3xl font-bold">$12.345</span>
            <i class="fas fa-sack-dollar text-3xl text-green-500"></i>
          </div>
          <p class="text-sm mt-2 text-gray-300">Ventas del mes</p>
        </div>

        <div class="bg-gray-900 text-white rounded-xl p-6 shadow hover:scale-105 transform transition">
          <div class="flex justify-between items-center">
            <span class="text-3xl font-bold">210</span>
            <i class="fas fa-box text-3xl text-green-500"></i>
          </div>
          <p class="text-sm mt-2 text-gray-300">Productos en stock</p>
        </div>
      </div>

      <!-- Tabla y gráfico -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <!-- Últimas reservas -->
        <div class="bg-white rounded-xl p-6 shadow">
          <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Últimas Reservas</h2>
          <table class="min-w-full text-sm text-gray-700">
            <thead>
              <tr class="bg-gray-100 text-gray-600 uppercase">
                <th class="py-3 px-4 text-left">Socio</th>
                <th class="py-3 px-4 text-left">Espacio</th>
                <th class="py-3 px-4 text-left">Fecha</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b hover:bg-gray-50">
                <td class="py-3 px-4">Juan Pérez</td>
                <td class="py-3 px-4">Cancha 1</td>
                <td class="py-3 px-4">27/08/2025</td>
              </tr>
              <tr class="border-b hover:bg-gray-50">
                <td class="py-3 px-4">María Lopez</td>
                <td class="py-3 px-4">Quincho</td>
                <td class="py-3 px-4">27/08/2025</td>
              </tr>
              <tr class="hover:bg-gray-50">
                <td class="py-3 px-4">Carlos Gómez</td>
                <td class="py-3 px-4">Cancha 3</td>
                <td class="py-3 px-4">26/08/2025</td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Placeholder gráfico -->
        <div class="bg-white rounded-xl p-6 shadow">
          <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Gráfico de Ventas</h2>
          <div class="w-full h-64 bg-gray-200 flex items-center justify-center rounded">
            <p class="text-gray-500">Aquí irá un gráfico con Chart.js</p>
          </div>
        </div>
      </div>
    </main>

    <!-- Footer SIEMPRE abajo -->
    <?php include 'includes/footer.php'; ?>

  </div>
</div>
