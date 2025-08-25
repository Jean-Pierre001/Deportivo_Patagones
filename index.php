<?php include 'includes/header.php'; ?>
<body class="font-sans antialiased bg-gray-50 text-gray-900">
  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/modals/modal.php'; ?>

  <!-- Carrusel full screen -->
  <section class="relative w-full h-screen mt-18">
    <div id="autos-carousel" class="relative w-full h-full overflow-hidden">
      <!-- Slide 1 -->
      <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-100" data-carousel-item>
        <img src="assets\img\Captura de pantalla 2025-08-25 131614.png" alt="Auto 1" class="w-full h-full object-cover">
      </div>
      <!-- Slide 2 -->
      <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out opacity-0" data-carousel-item>
        <img src="assets\img\Captura de pantalla 2025-08-25 131602.png" alt="Auto 2" class="w-full h-full object-cover">
      </div>
    </div>
  </section>

  <!-- Hero blanca con info y multimedia -->
  <section id="info" class="bg-white py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <h2 class="text-3xl font-bold mb-8">Información del Vehículo</h2>
      <div class="grid md:grid-cols-2 gap-10">
        <div class="space-y-4">
          <p class="text-gray-700">Motor: 2.0L Turbo</p>
          <p class="text-gray-700">Potencia: 250 HP</p>
          <p class="text-gray-700">Transmisión: Automática 8 velocidades</p>
          <p class="text-gray-700">Consumo: 12 km/l promedio</p>
          <img src="assets\img\Captura de pantalla 2025-08-25 132326.png" alt="Imagen 4" class="w-full h-60 object-cover rounded-lg shadow-lg">
        </div>
        <div class="grid grid-cols-2 gap-4">
          <img src="assets\img\Captura de pantalla 2025-08-25 132330.png" alt="Imagen 1" class="w-full h-48 object-cover rounded-lg shadow-lg">
          <img src="assets\img\Captura de pantalla 2025-08-25 132330.png" alt="Imagen 2" class="w-full h-48 object-cover rounded-lg shadow-lg">
          <img src="assets\img\Captura de pantalla 2025-08-25 132322.png" alt="Imagen 3" class="w-full h-48 object-cover rounded-lg shadow-lg">
          <img src="assets\img\Captura de pantalla 2025-08-25 132326.png" alt="Imagen 4" class="w-full h-48 object-cover rounded-lg shadow-lg">
        </div>
      </div>
      <div class="mt-8">
        <video class="w-full rounded-lg shadow-lg" controls>
          <source src="assets\img\Yourwagen-60seg-0x360-730k.mp4" type="video/mp4">
          Tu navegador no soporta el video.
        </video>
      </div>
    </div>
  </section>

  <!-- Productos -->
<section id="galeria" class="relative py-16 text-white overflow-hidden">
  <!-- Fondo desenfocado -->
  <div class="absolute inset-0">
    <img src="assets\img\Captura de pantalla 2025-08-25 142416.png" alt="Fondo" class="w-full h-full object-cover filter blur-lg brightness-50 scale-110">
  </div>

  <!-- Contenido de la galería -->
  <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-bold mb-8 text-center">Nuestras Ofertas</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-7">
      <img src="assets/img/Captura de pantalla 2025-08-25 131620.png" alt="Galería 1" class="w-full h-full object-cover rounded-lg shadow-md">
      <img src="assets/img/Captura de pantalla 2025-08-25 131623.png" alt="Galería 2" class="w-full h-full object-cover rounded-lg shadow-md">
      <img src="assets/img/Captura de pantalla 2025-08-25 131623.png" alt="Galería 3" class="w-full h-full object-cover rounded-lg shadow-md">
      <img src="assets/img/Captura de pantalla 2025-08-25 131623.png" alt="Galería 4" class="w-full h-full object-cover rounded-lg shadow-md">
      <img src="assets/img/Captura de pantalla 2025-08-25 131623.png" alt="Galería 5" class="w-full h-full object-cover rounded-lg shadow-md">
      <img src="assets/img/Captura de pantalla 2025-08-25 131623.png" alt="Galería 6" class="w-full h-full object-cover rounded-lg shadow-md">
    </div>
  </div>
</section>




  <!-- Footer -->
  <?php include 'includes/footer.php'; ?>

  <!-- Script carrusel automatico -->
  <script>
    const slides = document.querySelectorAll('[data-carousel-item]');
    let current = 0;
    setInterval(() => {
      slides[current].classList.remove('opacity-100');
      slides[current].classList.add('opacity-0');
      current = (current + 1) % slides.length;
      slides[current].classList.remove('opacity-0');
      slides[current].classList.add('opacity-100');
    }, 10000); // Cambia cada 10 segundos
  </script>

  <!-- Script navbar scroll -->
  <script>
    const navbar = document.getElementById('navbar');
    const navLinks = document.querySelectorAll('#navbar .nav-link');

    if (navbar) {
      const applyScrollState = () => {
        const scrolled = window.scrollY > 80;
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

  <!-- Script para abrir/cerrar modal -->
<script>
  const openModalBtn = document.getElementById('openModal');
  const closeModalBtn = document.getElementById('closeModal');
  const registerModal = document.getElementById('registerModal');

  openModalBtn.addEventListener('click', () => {
    registerModal.classList.remove('hidden');
  });

  closeModalBtn.addEventListener('click', () => {
    registerModal.classList.add('hidden');
  });

  // Cerrar modal al hacer clic fuera
  window.addEventListener('click', (e) => {
    if(e.target === registerModal) {
      registerModal.classList.add('hidden');
    }
  });
</script>
</body>
</html>
