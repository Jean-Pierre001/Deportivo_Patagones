<?php include 'includes/header.php'; ?>

<body class="font-sans antialiased bg-gradient-to-b from-white via-slate-50 to-slate-100 text-slate-900">
  <!-- Top bar promo -->
  <div class="relative z-50 w-full bg-brand-600 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between py-2 text-sm">
        <p class="flex items-center gap-2">
          <span class="inline-flex items-center justify-center rounded-full bg-white/15 px-2 py-0.5 text-xs font-semibold">-20%</span>
          <span>Semana del deporte: 20% OFF en calzado • Envíos a todo el país</span>
        </p>
        <a href="#novedades" class="underline decoration-white/50 underline-offset-4 hover:decoration-white">Ver novedades</a>
      </div>
    </div>
  </div>

  <!-- Navbar con include -->
  <?php include 'includes/navbar.php'; ?>

  <!-- Sección de confianza -->
  <section class="py-12">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <div class="flex items-start gap-3 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
          <div class="grid h-10 w-10 place-items-center rounded-xl bg-brand-100 text-brand-700">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-width="1.5" d="M3 12l2-2 4 4 10-10 2 2-12 12-6-6z" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          <div>
            <p class="text-sm font-semibold">Productos oficiales</p>
            <p class="text-sm text-slate-600">Garantía de calidad y origen</p>
          </div>
        </div>
        <div class="flex items-start gap-3 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
          <div class="grid h-10 w-10 place-items-center rounded-xl bg-brand-100 text-brand-700">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-width="1.5" d="M12 8v4l3 3" stroke-linecap="round"/></svg>
          </div>
          <div>
            <p class="text-sm font-semibold">Envíos rápidos</p>
            <p class="text-sm text-slate-600">48–72hs hábiles</p>
          </div>
        </div>
        <div class="flex items-start gap-3 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
          <div class="grid h-10 w-10 place-items-center rounded-xl bg-brand-100 text-brand-700">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-width="1.5" d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path stroke-width="1.5" d="M7 10l5-5 5 5"/></svg>
          </div>
          <div>
            <p class="text-sm font-semibold">Retiro en tienda</p>
            <p class="text-sm text-slate-600">Cerca tuyo</p>
          </div>
        </div>
        <div class="flex items-start gap-3 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
          <div class="grid h-10 w-10 place-items-center rounded-xl bg-brand-100 text-brand-700">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-width="1.5" d="M12 1l3 7h7l-5.5 4 2 7-6.5-4.5L6.5 19l2-7L3 8h7z"/></svg>
          </div>
          <div>
            <p class="text-sm font-semibold">4.8/5 en reseñas</p>
            <p class="text-sm text-slate-600">Clientes felices</p>
          </div>
        </div>
      </div>
    </div>
  </section>

    <div id="indicators-carousel" class="relative w-full" data-carousel="static">
      <!-- Carousel wrapper -->
      <div class="relative h-64 md:h-[500px] lg:h-[780px] overflow-hidden rounded-lg flex items-center justify-center">
                  <!-- Item 1 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
              <img src="assets\img\carusell.png" class="mx-auto max-w-full max-h-full object-contain" alt="...">
          </div>
          <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
              <img src="assets/img/Captura de pantalla 2025-08-25 123336.png" class="mx-auto max-w-full max-h-full object-contain" alt="...">
          </div>
          <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
              <img src="assets/img/Captura de pantalla 2025-08-25 123336.png" class="mx-auto max-w-full max-h-full object-contain" alt="...">
          </div>
          <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
              <img src="assets/img/Captura de pantalla 2025-08-25 123336.png" class="mx-auto max-w-full max-h-full object-contain" alt="...">
          </div>
          <!-- Item 5 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
              <img src="assets/img/Captura de pantalla 2025-08-25 123336.png" class="mx-auto max-w-full max-h-full object-contain" alt="...">
          </div>
      </div>
      <!-- Slider controls -->
      <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
          <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
              <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
              </svg>
              <span class="sr-only">Previous</span>
          </span>
      </button>
      <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
          <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
              <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
              </svg>
              <span class="sr-only">Next</span>
          </span>
      </button>
  </div>

  <!-- Hero -->
  <section class="relative overflow-hidden">
    <div class="absolute inset-0 -z-10 opacity-60">
      <div class="absolute -left-32 -top-32 h-72 w-72 rounded-full bg-brand-300 blur-3xl"></div>
      <div class="absolute -right-32 -bottom-32 h-72 w-72 rounded-full bg-accent-300 blur-3xl"></div>
    </div>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="grid items-center gap-10 py-12 md:grid-cols-2 md:py-16 lg:py-24">
        <div>
          <span class="inline-flex items-center gap-2 rounded-full bg-white/80 px-3 py-1 text-xs font-semibold text-brand-700 ring-1 ring-inset ring-brand-200 shadow-sm">Nueva temporada</span>
          <h1 class="mt-3 text-4xl font-extrabold leading-tight tracking-tight sm:text-5xl">Rendimiento y estilo para romperla</h1>
          <p class="mt-3 max-w-xl text-slate-600">Descubrí la colección 2025 de Deportivo Patagones: indumentaria oficial, calzado de alto rendimiento y accesorios para cada desafío.</p>
          <div class="mt-6 flex flex-wrap gap-3">
            <a href="#novedades" class="inline-flex items-center justify-center rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow transition hover:-translate-y-0.5 hover:shadow-lg">Ver novedades</a>
            <a href="#ofertas" class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-900 hover:border-brand-400 hover:bg-brand-50">Ofertas</a>
          </div>
          <dl class="mt-8 grid grid-cols-3 gap-4 text-sm">
            <div class="rounded-xl bg-white p-4 shadow-sm ring-1 ring-slate-200">
              <dt class="text-slate-500">Envío</dt>
              <dd class="font-semibold">Gratis desde $60.000</dd>
            </div>
            <div class="rounded-xl bg-white p-4 shadow-sm ring-1 ring-slate-200">
              <dt class="text-slate-500">Cuotas</dt>
              <dd class="font-semibold">3 y 6 sin interés</dd>
            </div>
            <div class="rounded-xl bg-white p-4 shadow-sm ring-1 ring-slate-200">
              <dt class="text-slate-500">Cambios</dt>
              <dd class="font-semibold">30 días</dd>
            </div>
          </dl>
        </div>
        <div class="relative">
          <div class="relative aspect-[4/5] overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-xl">
            <img src="https://images.unsplash.com/photo-1530731141654-5993c3016c77?q=80&w=1200&auto=format&fit=crop" alt="Deportista vistiendo indumentaria" loading="lazy" class="h-full w-full object-cover" data-animated>
            <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
            <div class="absolute left-4 top-4 rounded-full bg-white/80 px-3 py-1 text-xs font-semibold text-slate-900 ring-1 ring-inset ring-white">Colección Pro</div>
          </div>
          <div class="absolute -bottom-6 -right-4 hidden w-40 rounded-2xl border border-slate-200 bg-white p-3 text-xs shadow-lg sm:block">
            <p class="font-semibold">Zapatillas Pro Sprint</p>
            <p class="text-slate-600">Amortiguación reactiva</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Categorías destacadas -->
  <section class="py-8 sm:py-10 lg:py-12" id="categorias">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex items-end justify-between gap-4">
        <h2 class="text-2xl font-bold tracking-tight sm:text-3xl">Categorías destacadas</h2>
        <a href="#" class="text-sm font-semibold text-brand-700 hover:underline">Ver todas</a>
      </div>
      <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Card categoría -->
        <a href="#remeras" class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
          <img src="https://images.unsplash.com/photo-1540574163026-643ea20ade25?q=80&w=1000&auto=format&fit=crop" alt="Remeras deportivas" class="h-44 w-full object-cover transition duration-300 group-hover:scale-105" loading="lazy" data-animated>
          <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
          <div class="absolute bottom-0 p-4">
            <p class="text-lg font-bold text-white">Remeras</p>
            <span class="text-xs text-white/90">Secado rápido</span>
          </div>
        </a>
        <a href="#pantalones" class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
          <img src="https://images.unsplash.com/photo-1552410260-0fd9b58125f2?q=80&w=1000&auto=format&fit=crop" alt="Pantalones deportivos" class="h-44 w-full object-cover transition duration-300 group-hover:scale-105" loading="lazy" data-animated>
          <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
          <div class="absolute bottom-0 p-4">
            <p class="text-lg font-bold text-white">Pantalones</p>
            <span class="text-xs text-white/90">Flexibilidad total</span>
          </div>
        </a>
        <a href="#calzado" class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
          <img src="https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?q=80&w=1000&auto=format&fit=crop" alt="Calzado deportivo" class="h-44 w-full object-cover transition duration-300 group-hover:scale-105" loading="lazy" data-animated>
          <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
          <div class="absolute bottom-0 p-4">
            <p class="text-lg font-bold text-white">Calzado</p>
            <span class="text-xs text-white/90">Tracción superior</span>
          </div>
        </a>
        <a href="#balones" class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
          <img src="https://images.unsplash.com/photo-1546519638-68e109498ffc?q=80&w=1000&auto=format&fit=crop" alt="Balones" class="h-44 w-full object-cover transition duration-300 group-hover:scale-105" loading="lazy" data-animated>
          <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
          <div class="absolute bottom-0 p-4">
            <p class="text-lg font-bold text-white">Balones</p>
            <span class="text-xs text-white/90">Agarre premium</span>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- Barra de filtros simple -->
  <section class="border-y border-slate-200 bg-white/70" id="novedades">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex flex-wrap items-center justify-between gap-3 py-4">
        <div class="flex flex-wrap items-center gap-2">
          <span class="text-sm font-semibold">Filtrar:</span>
          <button class="rounded-full border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium hover:border-brand-400 hover:bg-brand-50">Hombre</button>
          <button class="rounded-full border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium hover:border-brand-400 hover:bg-brand-50">Mujer</button>
          <button class="rounded-full border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium hover:border-brand-400 hover:bg-brand-50">Niños</button>
          <button class="rounded-full border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium hover:border-brand-400 hover:bg-brand-50">Running</button>
          <button class="rounded-full border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium hover:border-brand-400 hover:bg-brand-50">Fútbol</button>
          <button class="rounded-full border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium hover:border-brand-400 hover:bg-brand-50">Básquet</button>
        </div>
        <div class="text-sm">
          <label for="orden" class="mr-2 text-slate-600">Ordenar por</label>
          <select id="orden" class="rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-sm">
            <option>Relevancia</option>
            <option>Novedades</option>
            <option>Precio: menor a mayor</option>
            <option>Precio: mayor a menor</option>
          </select>
        </div>
      </div>
    </div>
  </section>

  <!-- Grid de productos -->

  <!-- Footer -->
  <?php include 'includes/footer.php'; ?>

  <!-- Botón flotante del carrito -->
  <a href="cart.php" class="fixed bottom-5 right-5 inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-brand-600 to-accent-600 px-4 py-3 text-sm font-semibold text-white shadow-glow transition hover:scale-105">
    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l3-7H6.4" stroke-linecap="round"/><circle cx="9" cy="19" r="2"/><circle cx="17" cy="19" r="2"/></svg>
    <span>Carrito</span>
  </a>

  <!-- Scripts-->
  <script>
    // Menú móvil
    const menuBtn = document.getElementById('menuBtn');
    const mobileNav = document.getElementById('mobileNav');
    if (menuBtn) {
      menuBtn.addEventListener('click', () => mobileNav.classList.toggle('hidden'));
    }
    // Efecto fade-in para imágenes
    document.querySelectorAll('img[data-animated]').forEach(img => {
      if (img.complete) img.classList.add('loaded');
      img.addEventListener('load', () => img.classList.add('loaded'));
    });
  </script>

  <!-- Scripts carrusel-->
  <script>
  const swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      640: { slidesPerView: 2 },
      1024: { slidesPerView: 3 },
      1280: { slidesPerView: 4 },
    },
  });
</script>
</body>
</html>
