<?php
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<div class="ml-64 flex flex-col min-h-screen bg-gray-100">

  <?php include 'includes/navbar.php'; ?>

  <main class="flex-1 p-8">

    <!-- Encabezado -->
    <div class="bg-white rounded-xl p-8 shadow mb-8 border-l-4 border-green-600" data-aos="fade-down">
      <h1 class="text-3xl font-bold text-gray-900 mb-2">Gestión de Socios</h1>
      <p class="text-gray-600">Administra los socios y no socios del club.</p>
    </div>

    <!-- SECCIÓN 1: Socios -->
    <div class="bg-white rounded-xl p-6 shadow mb-8" data-aos="fade-up">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-800">Socios Oficiales</h2>
        <button onclick="Swal.fire('Nuevo Socio', 'Aquí iría el formulario para agregar un socio.', 'info')" class="bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-6 rounded shadow">+ Agregar Socio</button>
    </div>
    <table class="min-w-full text-sm text-gray-700">
        <thead>
        <tr class="bg-gray-100 text-gray-600 uppercase text-xs">
            <th class="py-3 px-4 text-left">Nombre</th>
            <th class="py-3 px-4 text-left">DNI</th>
            <th class="py-3 px-4 text-left">Teléfono</th>
            <th class="py-3 px-4 text-left">Email</th>
            <th class="py-3 px-4 text-left">Carnet</th>
            <th class="py-3 px-4 text-left">Tipo</th>
            <th class="py-3 px-4 text-left">Estado</th>
            <th class="py-3 px-4 text-center">Acciones</th>
        </tr>
        </thead>
        <tbody>
        <tr class="border-b hover:bg-gray-50">
            <td class="py-3 px-4">Juan Pérez</td>
            <td class="py-3 px-4">12345678</td>
            <td class="py-3 px-4">+54 9 2920 123456</td>
            <td class="py-3 px-4">juan@mail.com</td>
            <td class="py-3 px-4">C-2025-001</td>
            <td class="py-3 px-4">Completo</td>
            <td class="py-3 px-4"><span class="bg-green-200 text-green-800 px-2 py-1 rounded-full text-xs">Activo</span></td>
            <td class="py-3 px-4 text-center space-x-2">
            <button onclick="Swal.fire({
                title: 'Carnet de Juan Pérez',
                html: `<img src='https://placehold.co/100x120/4ADE80/FFFFFF?text=Foto' class='rounded mb-2'><br>
                        Número: C-2025-001<br>
                        Tipo: Completo<br>
                        Fecha emisión: 01/01/2025<br>
                        Vencimiento: 31/12/2025<br>
                        Estado: Activo`,
                icon: 'info',
                width: 300
                })" class="bg-blue-500 hover:bg-blue-400 text-white px-3 py-1 rounded text-xs">Ver carnet</button>

            <button onclick="Swal.fire('Editar', 'Formulario de edición para Juan Pérez', 'warning')" class="bg-yellow-500 hover:bg-yellow-400 text-white px-3 py-1 rounded text-xs">Modificar</button>

            <button onclick="Swal.fire({title:'Eliminar', text:'¿Seguro que deseas eliminar a Juan Pérez?', icon:'error', showCancelButton:true, confirmButtonText:'Eliminar'})" class="bg-red-500 hover:bg-red-400 text-white px-3 py-1 rounded text-xs">Eliminar</button>
            </td>
        </tr>

        <tr class="border-b hover:bg-gray-50">
            <td class="py-3 px-4">María Lopez</td>
            <td class="py-3 px-4">87654321</td>
            <td class="py-3 px-4">+54 9 2920 654321</td>
            <td class="py-3 px-4">maria@mail.com</td>
            <td class="py-3 px-4">C-2025-002</td>
            <td class="py-3 px-4">Junior</td>
            <td class="py-3 px-4"><span class="bg-red-200 text-red-800 px-2 py-1 rounded-full text-xs">Inactivo</span></td>
            <td class="py-3 px-4 text-center space-x-2">
            <button onclick="Swal.fire({
                title: 'Carnet de María Lopez',
                html: `<img src='https://placehold.co/100x120/F87171/FFFFFF?text=Foto' class='rounded mb-2'><br>
                        Número: C-2025-002<br>
                        Tipo: Junior<br>
                        Fecha emisión: 01/06/2025<br>
                        Vencimiento: 31/05/2026<br>
                        Estado: Inactivo`,
                icon: 'info',
                width: 300
                })" class="bg-blue-500 hover:bg-blue-400 text-white px-3 py-1 rounded text-xs">Ver carnet</button>

            <button onclick="Swal.fire('Editar', 'Formulario de edición para María Lopez', 'warning')" class="bg-yellow-500 hover:bg-yellow-400 text-white px-3 py-1 rounded text-xs">Modificar</button>

            <button onclick="Swal.fire({title:'Eliminar', text:'¿Seguro que deseas eliminar a María Lopez?', icon:'error', showCancelButton:true, confirmButtonText:'Eliminar'})" class="bg-red-500 hover:bg-red-400 text-white px-3 py-1 rounded text-xs">Eliminar</button>
            </td>
        </tr>

        </tbody>
    </table>
    </div>


    <!-- SECCIÓN 2: No Socios -->
    <div class="bg-white rounded-xl p-6 shadow mb-8" data-aos="fade-up">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-800">No Socios</h2>
        <button onclick="Swal.fire('Nuevo No Socio', 'Formulario para registrar un no socio.', 'info')" class="bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-6 rounded shadow">+ Agregar No Socio</button>
      </div>
      <table class="min-w-full text-sm text-gray-700">
        <thead>
          <tr class="bg-gray-100 text-gray-600 uppercase text-xs">
            <th class="py-3 px-4 text-left">Nombre</th>
            <th class="py-3 px-4 text-left">DNI</th>
            <th class="py-3 px-4 text-left">Teléfono</th>
            <th class="py-3 px-4 text-left">Email</th>
            <th class="py-3 px-4 text-left">Última visita</th>
            <th class="py-3 px-4 text-left">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-b hover:bg-gray-50">
            <td class="py-3 px-4">Carlos Gómez</td>
            <td class="py-3 px-4">98765432</td>
            <td class="py-3 px-4">+54 9 2920 987654</td>
            <td class="py-3 px-4">carlos@mail.com</td>
            <td class="py-3 px-4">25/08/2025</td>
            <td class="py-3 px-4 text-center space-x-2">
              <button onclick="Swal.fire('Detalles de Carlos Gómez', 'Servicios usados: Cancha 1, Clase de fútbol<br>Última visita: 25/08/2025', 'info')" class="bg-blue-500 hover:bg-blue-400 text-white px-3 py-1 rounded text-xs">Ver más</button>
              <button onclick="Swal.fire('Editar', 'Formulario de edición para Carlos Gómez', 'warning')" class="bg-yellow-500 hover:bg-yellow-400 text-white px-3 py-1 rounded text-xs">Modificar</button>
              <button onclick="Swal.fire({title:'Eliminar', text:'¿Seguro que deseas eliminar a Carlos Gómez?', icon:'error', showCancelButton:true, confirmButtonText:'Eliminar'})" class="bg-red-500 hover:bg-red-400 text-white px-3 py-1 rounded text-xs">Eliminar</button>
            </td>
          </tr>
          <!-- Más no socios -->
        </tbody>
      </table>
    </div>

  </main>

  <?php include 'includes/footer.php'; ?>
</div>
