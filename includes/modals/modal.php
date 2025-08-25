<!-- Modal de Registro -->
<div id="registerModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
  <div class="bg-white rounded-xl shadow-2xl w-full max-w-md p-8 relative">
    
    <!-- Botón cerrar -->
    <button id="closeModal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 font-bold text-xl">&times;</button>

    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Registro de Usuario</h2>

    <form action="cart.php.php" method="POST" class="space-y-4">

      <div>
        <label for="nombre" class="block text-gray-700 font-semibold mb-1">Nombre completo</label>
        <input type="text" name="nombre" id="nombre" required
               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div>
        <label for="email" class="block text-gray-700 font-semibold mb-1">Email</label>
        <input type="email" name="email" id="email" required
               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div>
        <label for="password" class="block text-gray-700 font-semibold mb-1">Contraseña</label>
        <input type="password" name="password" id="password" required
               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div>
        <label for="confirm_password" class="block text-gray-700 font-semibold mb-1">Confirmar Contraseña</label>
        <input type="password" name="confirm_password" id="confirm_password" required
               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold shadow-md mt-2">
        Registrarse
      </button>

    </form>
  </div>
</div>