<!-- sidebar.php -->
<aside id="sidebar" class="fixed top-0 left-0 h-screen w-64 bg-blue-800 text-white shadow-lg flex flex-col transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-50">
  <div class="p-4 text-2xl font-bold border-b border-blue-700 flex justify-between items-center">
    <span><i class="fas fa-school mr-2"></i> ADA</span>
    <!-- Botón de cerrar solo visible en móvil -->
    <button id="close-sidebar" class="md:hidden text-white text-xl">
      <i class="fas fa-times"></i>
    </button>
  </div>
  <nav class="flex-1 p-4 overflow-y-auto">
    <ul class="space-y-2">
      <li>
        <a href="#" class="flex items-center p-2 rounded hover:bg-blue-700">
          <i class="fa fa-home mr-3"></i> Inicio
        </a>
      </li>
      <li>
        <a href="#" class="flex items-center p-2 rounded hover:bg-blue-700">
          <i class="fa fa-cog mr-3"></i> Gestionar Alquileres
        </a>
      </li>
      <li>
        <a href="#" class="flex items-center p-2 rounded hover:bg-blue-700">
          <i class="fas fa-calendar mr-3"></i> Reservaciones
        </a>
      </li>
      <li>
        <a href="#" class="flex items-center p-2 rounded hover:bg-blue-700">
          <i class="fa fa-check mr-3"></i> Disponibilidad
        </a>
      </li>
      <li>
        <a href="#" class="flex items-center p-2 rounded hover:bg-blue-700">
          <i class="fa fa-address-card mr-3"></i> Gestor de clientes
        </a>
      </li>
      <li>
        <a href="#" class="flex items-center p-2 rounded hover:bg-blue-700">
          <i class="fa fa-credit-card mr-3"></i> Facturacion
        </a>
      </li>

    </ul>
  </nav>
</aside>

<!-- Overlay para móvil -->
<div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40 md:hidden"></div>