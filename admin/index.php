<?php
include 'includes/header.php';
?>

<!-- Sidebar siempre fija a la izquierda -->
<?php include 'includes/sidebar.php'; ?>

<!-- Contenido principal -->
<div class="ml-64 flex flex-col min-h-screen bg-gray-100">
  
  <!-- Navbar sticky -->
  <?php include 'includes/navbar.php'; ?>

  <!-- Main -->
<main class="flex-1 p-8">

  <!-- Encabezado -->
  <div class="bg-white rounded-xl p-8 shadow mb-8 border-l-4 border-green-600" data-aos="fade-down">
    <h1 class="text-3xl font-bold text-gray-900 mb-2">Panel de Administración</h1>
    <p class="text-gray-600">Explora las funcionalidades del dashboard usando Tailwind, AOS y SweetAlert2.</p>
  </div>

  <!-- Widgets animados -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-gray-900 text-white rounded-xl p-6 shadow hover:scale-105 transform transition" data-aos="zoom-in">
      <div class="flex justify-between items-center">
        <span class="text-3xl font-bold">1.250</span>
        <i class="fas fa-users text-3xl text-green-500"></i>
      </div>
      <p class="text-sm mt-2 text-gray-300">Socios activos</p>
    </div>
    <div class="bg-gray-900 text-white rounded-xl p-6 shadow hover:scale-105 transform transition" data-aos="zoom-in" data-aos-delay="100">
      <div class="flex justify-between items-center">
        <span class="text-3xl font-bold">85</span>
        <i class="fas fa-calendar-check text-3xl text-green-500"></i>
      </div>
      <p class="text-sm mt-2 text-gray-300">Reservas hoy</p>
    </div>
    <div class="bg-gray-900 text-white rounded-xl p-6 shadow hover:scale-105 transform transition" data-aos="zoom-in" data-aos-delay="200">
      <div class="flex justify-between items-center">
        <span class="text-3xl font-bold">$12.345</span>
        <i class="fas fa-sack-dollar text-3xl text-green-500"></i>
      </div>
      <p class="text-sm mt-2 text-gray-300">Ventas del mes</p>
    </div>
    <div class="bg-gray-900 text-white rounded-xl p-6 shadow hover:scale-105 transform transition" data-aos="zoom-in" data-aos-delay="300">
      <div class="flex justify-between items-center">
        <span class="text-3xl font-bold">210</span>
        <i class="fas fa-box text-3xl text-green-500"></i>
      </div>
      <p class="text-sm mt-2 text-gray-300">Productos en stock</p>
    </div>
  </div>

  <!-- Sección de tareas y notificaciones -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

    <!-- Tareas pendientes -->
    <div class="bg-white rounded-xl p-6 shadow" data-aos="fade-right">
      <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Tareas Pendientes</h2>
      <ul class="space-y-2">
        <li class="flex justify-between items-center p-2 rounded hover:bg-gray-100">
          <span>Revisar reservas del fin de semana</span>
          <i class="fas fa-exclamation-circle text-yellow-500"></i>
        </li>
        <li class="flex justify-between items-center p-2 rounded hover:bg-gray-100">
          <span>Actualizar inventario</span>
          <i class="fas fa-check-circle text-green-500"></i>
        </li>
        <li class="flex justify-between items-center p-2 rounded hover:bg-gray-100">
          <span>Enviar notificación a socios</span>
          <i class="fas fa-bell text-red-500"></i>
        </li>
      </ul>
    </div>

    <!-- Gráfico de progreso -->
    <div class="bg-white rounded-xl p-6 shadow" data-aos="fade-left">
      <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Progreso del mes</h2>
      <div class="space-y-4">
        <div>
          <span class="block text-sm text-gray-600 mb-1">Socios registrados</span>
          <div class="w-full bg-gray-200 rounded-full h-4">
            <div class="bg-green-500 h-4 rounded-full w-3/4 transition-all duration-700"></div>
          </div>
        </div>
        <div>
          <span class="block text-sm text-gray-600 mb-1">Ventas</span>
          <div class="w-full bg-gray-200 rounded-full h-4">
            <div class="bg-green-500 h-4 rounded-full w-1/2 transition-all duration-700"></div>
          </div>
        </div>
        <div>
          <span class="block text-sm text-gray-600 mb-1">Productos en stock</span>
          <div class="w-full bg-gray-200 rounded-full h-4">
            <div class="bg-green-500 h-4 rounded-full w-5/6 transition-all duration-700"></div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Galería de imágenes -->
  <div class="bg-white rounded-xl p-6 shadow mb-8" data-aos="fade-up">
    <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Galería de eventos</h2>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
      <img src="https://placehold.co/200x150/4ADE80/FFFFFF?text=Evento+1" class="rounded-lg shadow hover:scale-105 transform transition" alt="Evento 1">
      <img src="https://placehold.co/200x150/22D3EE/FFFFFF?text=Evento+2" class="rounded-lg shadow hover:scale-105 transform transition" alt="Evento 2">
      <img src="https://placehold.co/200x150/F87171/FFFFFF?text=Evento+3" class="rounded-lg shadow hover:scale-105 transform transition" alt="Evento 3">
      <img src="https://placehold.co/200x150/FACC15/FFFFFF?text=Evento+4" class="rounded-lg shadow hover:scale-105 transform transition" alt="Evento 4">
    </div>
  </div>

  <!-- Botón con SweetAlert2 -->
  <div class="flex justify-center mb-8">
    <button onclick="Swal.fire('¡Bienvenido!', 'Este es un mensaje de ejemplo con SweetAlert2.', 'success')" class="bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-6 rounded shadow">
      Mostrar alerta
    </button>
  </div>

  <!-- Estadísticas de ventas y reservas -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
  <div class="bg-white rounded-xl p-6 shadow" data-aos="fade-right">
    <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Ventas mensuales</h2>
    <canvas id="ventasChart" class="w-full h-64"></canvas>
  </div>
  <div class="bg-white rounded-xl p-6 shadow" data-aos="fade-left">
    <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Reservas por día</h2>
    <canvas id="reservasChart" class="w-full h-64"></canvas>
  </div>
</div>

<div class="flex justify-center mb-8">
  <button onclick="Swal.fire({title: 'Alerta!', text: 'Nueva reserva registrada', icon: 'info', timer: 2000, showConfirmButton: false})" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-6 rounded shadow">
    Mostrar alerta de reserva
  </button>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
  <div class="bg-white rounded-xl p-6 shadow hover:shadow-lg transition" data-aos="flip-left">
    <h3 class="font-bold text-gray-700 mb-2">Socios registrados</h3>
    <div class="w-full bg-gray-200 h-4 rounded-full">
      <div class="bg-green-500 h-4 rounded-full w-3/4 transition-all"></div>
    </div>
    <p class="text-sm mt-2 text-gray-500">75% del objetivo alcanzado</p>
  </div>
  <div class="bg-white rounded-xl p-6 shadow hover:shadow-lg transition" data-aos="flip-left" data-aos-delay="100">
    <h3 class="font-bold text-gray-700 mb-2">Ventas este mes</h3>
    <div class="w-full bg-gray-200 h-4 rounded-full">
      <div class="bg-blue-500 h-4 rounded-full w-1/2 transition-all"></div>
    </div>
    <p class="text-sm mt-2 text-gray-500">50% del objetivo</p>
  </div>
  <div class="bg-white rounded-xl p-6 shadow hover:shadow-lg transition" data-aos="flip-left" data-aos-delay="200">
    <h3 class="font-bold text-gray-700 mb-2">Reservas completadas</h3>
    <div class="w-full bg-gray-200 h-4 rounded-full">
      <div class="bg-yellow-500 h-4 rounded-full w-5/6 transition-all"></div>
    </div>
    <p class="text-sm mt-2 text-gray-500">83% completadas</p>
  </div>
</div>

<div class="bg-white rounded-xl p-6 shadow mb-8" data-aos="fade-up">
  <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Usuarios</h2>
  <table class="min-w-full text-sm text-gray-700">
    <thead>
      <tr class="bg-gray-100 text-gray-600 uppercase">
        <th class="py-3 px-4 text-left">Nombre</th>
        <th class="py-3 px-4 text-left">Email</th>
        <th class="py-3 px-4 text-left">Rol</th>
        <th class="py-3 px-4 text-left">Estado</th>
      </tr>
    </thead>
    <tbody>
      <tr class="border-b hover:bg-gray-50 cursor-pointer" onclick="Swal.fire('Usuario', 'Detalles de Juan Pérez', 'info')">
        <td class="py-3 px-4">Juan Pérez</td>
        <td class="py-3 px-4">juan@mail.com</td>
        <td class="py-3 px-4">Administrador</td>
        <td class="py-3 px-4"><span class="text-green-500">Activo</span></td>
      </tr>
      <tr class="border-b hover:bg-gray-50 cursor-pointer" onclick="Swal.fire('Usuario', 'Detalles de María Lopez', 'info')">
        <td class="py-3 px-4">María Lopez</td>
        <td class="py-3 px-4">maria@mail.com</td>
        <td class="py-3 px-4">Usuario</td>
        <td class="py-3 px-4"><span class="text-red-500">Inactivo</span></td>
      </tr>
    </tbody>
  </table>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
  <div class="bg-white rounded-xl p-6 shadow hover:shadow-lg transition" data-aos="zoom-in">
    <i class="fas fa-lightbulb text-yellow-400 text-2xl mb-2"></i>
    <h3 class="font-bold text-gray-700 mb-1">Tip 1</h3>
    <p class="text-gray-500 text-sm">Configura alertas para cada nueva reserva usando SweetAlert2.</p>
  </div>
  <div class="bg-white rounded-xl p-6 shadow hover:shadow-lg transition" data-aos="zoom-in" data-aos-delay="100">
    <i class="fas fa-chart-line text-green-500 text-2xl mb-2"></i>
    <h3 class="font-bold text-gray-700 mb-1">Tip 2</h3>
    <p class="text-gray-500 text-sm">Visualiza el progreso mensual de socios y ventas con gráficas.</p>
  </div>
  <div class="bg-white rounded-xl p-6 shadow hover:shadow-lg transition" data-aos="zoom-in" data-aos-delay="200">
    <i class="fas fa-bell text-red-500 text-2xl mb-2"></i>
    <h3 class="font-bold text-gray-700 mb-1">Tip 3</h3>
    <p class="text-gray-500 text-sm">Mantén notificaciones importantes visibles para el administrador.</p>
  </div>
</div>

<div class="bg-white rounded-xl p-6 shadow mb-8" data-aos="fade-up">
  <h2 class="text-xl font-bold mb-4 border-b pb-2">Actividad Reciente</h2>
  <ul class="border-l-4 border-green-600">
    <li class="mb-4 ml-4">
      <p class="text-gray-700"><span class="font-semibold">27/08/2025:</span> Nueva reserva por Juan Pérez</p>
    </li>
    <li class="mb-4 ml-4">
      <p class="text-gray-700"><span class="font-semibold">27/08/2025:</span> Venta realizada: $2.500</p>
    </li>
    <li class="mb-4 ml-4">
      <p class="text-gray-700"><span class="font-semibold">26/08/2025:</span> Producto agregado al stock</p>
    </li>
  </ul>
</div>

<span class="inline-block bg-green-200 text-green-800 px-2 py-1 rounded-full text-xs font-semibold">Activo</span>
<span class="inline-block bg-red-200 text-red-800 px-2 py-1 rounded-full text-xs font-semibold">Inactivo</span>
<span class="inline-block bg-yellow-200 text-yellow-800 px-2 py-1 rounded-full text-xs font-semibold">Pendiente</span>

<div class="bg-white rounded-xl p-6 shadow mb-8" data-aos="fade-up">
  <h2 class="text-xl font-bold mb-4 border-b pb-2">Mensajes Recientes</h2>
  <ul class="space-y-2">
    <li class="p-2 bg-gray-100 rounded hover:bg-gray-200">
      <span class="font-semibold">Admin:</span> Revisa las reservas de hoy.
    </li>
    <li class="p-2 bg-gray-100 rounded hover:bg-gray-200">
      <span class="font-semibold">Juan Pérez:</span> Solicitud de reserva para Cancha 2.
    </li>
    <li class="p-2 bg-gray-100 rounded hover:bg-gray-200">
      <span class="font-semibold">María Lopez:</span> Consulta sobre horarios disponibles.
    </li>
  </ul>
</div>

</main>


  <!-- Footer -->
  <?php include 'includes/footer.php'; ?>

</div>
