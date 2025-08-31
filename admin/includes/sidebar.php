<!-- Sidebar siempre visible -->
<aside class="bg-gray-900 text-gray-300 w-64 p-6 space-y-4 fixed inset-y-0 left-0 z-40">
  <!-- Encabezado -->
  <div class="flex items-center justify-between mb-8">
    <span class="font-bold text-xl flex items-center text-white">
      <i class="fas fa-gem text-green-500 mr-2"></i> Panel
    </span>
    <!-- Botón de cerrar eliminado porque siempre estará visible -->
  </div>

  <!-- Navegación -->
  <nav class="space-y-2">
    <a href="index.php" class="flex items-center space-x-3 p-3 rounded-lg bg-green-600 text-white font-medium hover:bg-green-500 transition">
      <i class="fas fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
    <a href="partners.php" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 transition">
      <i class="fas fa-user-friends"></i>
      <span>Socios</span>
    </a>
    <a href="players.php" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 transition">
      <i class="fas fa-user-friends"></i>
      <span>Deportistas</span>
    </a>
    <a href="rentals.php" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 transition">
      <i class="fas fa-calendar-check"></i>
      <span>Alquileres</span>
    </a>
    <a href="stock.php" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 transition">
      <i class="fas fa-box"></i>
      <span>Stock</span>
    </a>
  </nav>

  <!-- Cerrar sesión -->
  <div class="absolute bottom-6 w-full pr-12">
    <a href="../logout.php" class="flex items-center space-x-3 p-3 rounded-lg text-red-400 hover:bg-gray-800 transition">
      <i class="fas fa-sign-out-alt"></i>
      <span>Cerrar sesión</span>
    </a>
  </div>
</aside>
