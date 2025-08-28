<?php
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<div class="ml-64 flex flex-col min-h-screen bg-gray-100">
  <?php include 'includes/navbar.php'; ?>

  <main class="flex-1 p-8">

    <!-- Encabezado -->
    <div class="bg-white rounded-xl p-8 shadow mb-8 border-l-4 border-green-600" data-aos="fade-down">
      <h1 class="text-3xl font-bold text-gray-900 mb-2">Gestión de Quinchos y Canchas</h1>
      <p class="text-gray-600">Administra las reservas, notificaciones y estadísticas de las instalaciones del club.</p>
    </div>

    <!-- FILTRO Y BÚSQUEDA -->
    <div class="mb-6 flex flex-col md:flex-row md:justify-between gap-4">
      <input type="text" placeholder="Buscar por usuario o instalación..." class="border rounded px-3 py-2 w-full md:w-1/3">
      <select class="border rounded px-3 py-2 w-full md:w-1/4">
        <option value="">Filtrar por tipo</option>
        <option value="cancha">Cancha</option>
        <option value="quincho">Quincho</option>
      </select>
      <select class="border rounded px-3 py-2 w-full md:w-1/4">
        <option value="">Filtrar por estado</option>
        <option value="disponible">Disponible</option>
        <option value="reservada">Reservada</option>
        <option value="proxima">Próxima</option>
      </select>
    </div>

    <!-- SECCIÓN 1: Canchas -->
    <div class="bg-white rounded-xl p-6 shadow mb-8" data-aos="fade-up">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-800">Canchas de Fútbol</h2>
        <button onclick="Swal.fire('Nueva Cancha', 'Formulario para agregar nueva cancha.', 'info')" class="bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-6 rounded shadow">+ Agregar Cancha</button>
      </div>
      <table class="min-w-full text-sm text-gray-700">
        <thead>
          <tr class="bg-gray-100 text-gray-600 uppercase text-xs">
            <th class="py-3 px-4 text-left">Nombre</th>
            <th class="py-3 px-4 text-left">Ubicación</th>
            <th class="py-3 px-4 text-left">Capacidad</th>
            <th class="py-3 px-4 text-left">Estado</th>
            <th class="py-3 px-4 text-left">Tarifa</th>
            <th class="py-3 px-4 text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b hover:bg-gray-50">
            <td class="py-3 px-4">Cancha 1</td>
            <td class="py-3 px-4">Sector A</td>
            <td class="py-3 px-4">22 jugadores</td>
            <td class="py-3 px-4"><span class="bg-green-200 text-green-800 px-2 py-1 rounded-full text-xs">Disponible</span></td>
            <td class="py-3 px-4">$500</td>
            <td class="py-3 px-4 text-center space-x-2">
              <button onclick="Swal.fire('Reservar', 'Formulario para reservar Cancha 1', 'info')" class="bg-blue-500 hover:bg-blue-400 text-white px-3 py-1 rounded text-xs">Reservar</button>
              <button onclick="Swal.fire('Editar', 'Editar Cancha 1', 'warning')" class="bg-yellow-500 hover:bg-yellow-400 text-white px-3 py-1 rounded text-xs">Modificar</button>
              <button onclick="Swal.fire({title:'Eliminar', text:'¿Seguro que deseas eliminar Cancha 1?', icon:'error', showCancelButton:true, confirmButtonText:'Eliminar'})" class="bg-red-500 hover:bg-red-400 text-white px-3 py-1 rounded text-xs">Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- SECCIÓN 2: Quinchos -->
    <div class="bg-white rounded-xl p-6 shadow mb-8" data-aos="fade-up">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-800">Quinchos</h2>
        <button onclick="Swal.fire('Nuevo Quincho', 'Formulario para agregar quincho', 'info')" class="bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-6 rounded shadow">+ Agregar Quincho</button>
      </div>
      <table class="min-w-full text-sm text-gray-700">
        <thead>
          <tr class="bg-gray-100 text-gray-600 uppercase text-xs">
            <th class="py-3 px-4 text-left">Nombre</th>
            <th class="py-3 px-4 text-left">Ubicación</th>
            <th class="py-3 px-4 text-left">Capacidad</th>
            <th class="py-3 px-4 text-left">Estado</th>
            <th class="py-3 px-4 text-left">Tarifa</th>
            <th class="py-3 px-4 text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b hover:bg-gray-50">
            <td class="py-3 px-4">Quincho 1</td>
            <td class="py-3 px-4">Sector B</td>
            <td class="py-3 px-4">50 personas</td>
            <td class="py-3 px-4"><span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded-full text-xs">Reservada</span></td>
            <td class="py-3 px-4">$1000</td>
            <td class="py-3 px-4 text-center space-x-2">
              <button onclick="Swal.fire('Reservar', 'Formulario para reservar Quincho 1', 'info')" class="bg-blue-500 hover:bg-blue-400 text-white px-3 py-1 rounded text-xs">Reservar</button>
              <button onclick="Swal.fire('Editar', 'Editar Quincho 1', 'warning')" class="bg-yellow-500 hover:bg-yellow-400 text-white px-3 py-1 rounded text-xs">Modificar</button>
              <button onclick="Swal.fire({title:'Eliminar', text:'¿Seguro que deseas eliminar Quincho 1?', icon:'error', showCancelButton:true, confirmButtonText:'Eliminar'})" class="bg-red-500 hover:bg-red-400 text-white px-3 py-1 rounded text-xs">Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- SECCIÓN 3: Reservas -->
    <div class="bg-white rounded-xl p-6 shadow mb-8" data-aos="fade-up">
      <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Reservas</h2>
      <table class="min-w-full text-sm text-gray-700">
        <thead>
          <tr class="bg-gray-100 text-gray-600 uppercase text-xs">
            <th class="py-3 px-4 text-left">Usuario</th>
            <th class="py-3 px-4 text-left">Instalación</th>
            <th class="py-3 px-4 text-left">Tipo</th>
            <th class="py-3 px-4 text-left">Fecha</th>
            <th class="py-3 px-4 text-left">Hora</th>
            <th class="py-3 px-4 text-left">Estado</th>
            <th class="py-3 px-4 text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b hover:bg-gray-50">
            <td class="py-3 px-4">Juan Pérez</td>
            <td class="py-3 px-4">Cancha 1</td>
            <td class="py-3 px-4">Fútbol</td>
            <td class="py-3 px-4">28/08/2025</td>
            <td class="py-3 px-4">18:00</td>
            <td class="py-3 px-4"><span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded-full text-xs">Próxima</span></td>
            <td class="py-3 px-4 text-center space-x-2">
              <button onclick="Swal.fire('Detalles', 'Reserva de Cancha 1 por Juan Pérez, 28/08/2025 a las 18:00', 'info')" class="bg-blue-500 hover:bg-blue-400 text-white px-3 py-1 rounded text-xs">Ver más</button>
              <button onclick="Swal.fire('Editar', 'Editar reserva', 'warning')" class="bg-yellow-500 hover:bg-yellow-400 text-white px-3 py-1 rounded text-xs">Modificar</button>
              <button onclick="Swal.fire({title:'Cancelar', text:'¿Seguro que deseas cancelar la reserva?', icon:'error', showCancelButton:true, confirmButtonText:'Cancelar'})" class="bg-red-500 hover:bg-red-400 text-white px-3 py-1 rounded text-xs">Cancelar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- SECCIÓN 4: Estadísticas simples -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
      <div class="bg-white rounded-xl p-6 shadow" data-aos="fade-right">
        <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Estadísticas de Reservas</h2>
        <canvas id="reservasChart" class="w-full h-64"></canvas>
      </div>
      <div class="bg-white rounded-xl p-6 shadow" data-aos="fade-left">
        <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Reservas por Tipo de Instalación</h2>
        <canvas id="tipoChart" class="w-full h-64"></canvas>
      </div>
    </div>

  </main>

  <?php include 'includes/footer.php'; ?>
</div>
