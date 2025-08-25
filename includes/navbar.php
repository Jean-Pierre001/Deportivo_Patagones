  <!-- Header -->
  <header class="sticky top-0 z-40 border-b border-slate-200/70 bg-white/80 backdrop-blur">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between py-4">
        <!-- Logo -->
        <a href="#" class="group inline-flex items-center gap-2">
          <span class="grid h-9 w-9 place-items-center rounded-2xl bg-gradient-to-br from-brand-500 to-accent-500 text-white shadow-glow transition-transform group-hover:scale-105">
            <!-- Ball icon -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-5 w-5">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3a9 9 0 1 0 9 9 9.01 9.01 0 0 0-9-9Zm0 0v18M3 12h18M5.64 5.64l12.72 12.72"/>
            </svg>
          </span>
          <span class="text-lg font-extrabold tracking-tight">Deportivo Patagones</span>
        </a>

        <!-- Search -->
        <div class="hidden md:flex w-full max-w-xl items-center gap-3 px-6">
          <div class="relative w-full">
            <input type="search" placeholder="Buscar remeras, zapatillas, balones…" class="w-full rounded-xl border border-slate-200 bg-white/60 px-4 py-2.5 pl-10 shadow-sm outline-none ring-0 placeholder:text-slate-400 focus:border-brand-400 focus:bg-white focus:shadow-glow"/>
            <svg class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <circle cx="11" cy="11" r="7" stroke-width="1.5"/>
              <path d="M20 20l-3.5-3.5" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
          </div>
        </div>

        <!-- Actions -->
        <div class="flex items-center gap-2 sm:gap-3">
          <button class="hidden sm:inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm font-medium shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-width="1.5" d="M12 12a5 5 0 1 0-5-5 5 5 0 0 0 5 5Z"/><path stroke-width="1.5" d="M3 21a9 9 0 1 1 18 0"/></svg>
            <span>Ingreso</span>
          </button>
          <button class="relative inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-brand-600 to-accent-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-glow transition hover:-translate-y-0.5">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l3-7H6.4" stroke-linecap="round"/><circle cx="9" cy="19" r="2"/><circle cx="17" cy="19" r="2"/></svg>
            <span>Carrito</span>
            <span class="absolute -right-2 -top-2 grid h-5 w-5 place-items-center rounded-full bg-white text-xs font-bold text-brand-700 shadow">3</span>
          </button>
          <button class="md:hidden inline-flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white shadow-sm" id="menuBtn" aria-label="Abrir menú">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-width="1.5" d="M4 7h16M4 12h16M4 17h16"/></svg>
          </button>
        </div>
      </div>

      <!-- Mobile search -->
      <div class="md:hidden pb-4">
        <div class="relative">
          <input type="search" placeholder="Buscar productos…" class="w-full rounded-xl border border-slate-200 bg-white/60 px-4 py-2.5 pl-10 shadow-sm outline-none ring-0 placeholder:text-slate-400 focus:border-brand-400 focus:bg-white focus:shadow-glow"/>
          <svg class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <circle cx="11" cy="11" r="7" stroke-width="1.5"/>
            <path d="M20 20l-3.5-3.5" stroke-width="1.5" stroke-linecap="round"/>
          </svg>
        </div>
      </div>
    </div>

    <!-- Mobile menu panel -->
    <nav id="mobileNav" class="md:hidden hidden border-t border-slate-200 bg-white">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-4 grid grid-cols-2 gap-3 text-sm">
        <a href="#remeras" class="rounded-lg border border-slate-200 px-3 py-2 hover:border-brand-400 hover:bg-brand-50">Remeras</a>
        <a href="#pantalones" class="rounded-lg border border-slate-200 px-3 py-2 hover:border-brand-400 hover:bg-brand-50">Pantalones</a>
        <a href="#calzado" class="rounded-lg border border-slate-200 px-3 py-2 hover:border-brand-400 hover:bg-brand-50">Calzado</a>
        <a href="#balones" class="rounded-lg border border-slate-200 px-3 py-2 hover:border-brand-400 hover:bg-brand-50">Balones</a>
        <a href="#ofertas" class="rounded-lg border border-slate-200 px-3 py-2 hover:border-brand-400 hover:bg-brand-50">Ofertas</a>
        <a href="#contacto" class="rounded-lg border border-slate-200 px-3 py-2 hover:border-brand-400 hover:bg-brand-50">Contacto</a>
      </div>
    </nav>
  </header>