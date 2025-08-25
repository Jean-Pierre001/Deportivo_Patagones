<?php include 'includes/header.php'; ?>

<body class="font-sans antialiased bg-gray-50 text-gray-900">

  <!-- Login Section -->
  <section class="flex items-center justify-center h-screen bg-gray-50">
    <div class="bg-white shadow-2xl rounded-xl w-full max-w-md p-8">
      <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Iniciar Sesión</h2>

      <form action="panel.php" method="GET" class="space-y-4">
        <div>
          <label for="email" class="block text-gray-700 font-semibold mb-1">Email</label>
          <input type="email" id="email" name="email" placeholder="tu@email.com" required
                 class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
          <label for="password" class="block text-gray-700 font-semibold mb-1">Contraseña</label>
          <input type="password" id="password" name="password" placeholder="********" required
                 class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <button type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold shadow-md mt-2">
          Iniciar Sesión
        </button>
      </form>
    </div>
  </section>

</body>
</html>
