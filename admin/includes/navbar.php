<!-- Navbar -->
<nav id="navbar" class="bg-gray-900 text-white shadow-md sticky top-0 z-50 p-4 transition-all duration-500">
    <div class="flex justify-between items-center max-w-7xl mx-auto">
        <div class="flex items-center space-x-3">
            <i class="fas fa-bars text-xl cursor-pointer lg:hidden" id="menu-toggle"></i>
            <a href="#" class="text-2xl font-bold">
                <span class="text-red-900">Deportivo</span> <span class="text-green-900">Patagones</span>
            </a>
        </div>
        <div class="flex items-center space-x-4 relative">
            <span class="text-sm">Hola, Admin</span>

            <!-- Checkbox para abrir modal -->
            <input type="checkbox" id="modal-toggle" class="hidden">
            <label for="modal-toggle" class="cursor-pointer">
                <img src="https://placehold.co/40x40/FFFFFF/EF4444?text=A" alt="Avatar del Administrador" class="rounded-full ring-2 ring-white">
            </label>

            <!-- Modal -->
            <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300" id="modal">
                <div class="bg-white rounded-lg w-80 relative p-6 flex flex-col items-center">
                    
                    <!-- Botón de cerrar (esquina superior derecha) -->
                    <div class="absolute top-3 right-3">
                        <label for="modal-toggle" class="cursor-pointer text-gray-600 hover:text-gray-900 text-xl font-bold">&times;</label>
                    </div>

                    <!-- Imagen de perfil -->
                    <img src="https://placehold.co/100x100/FFFFFF/EF4444?text=A" alt="Avatar del Administrador" class="rounded-full mb-4 ring-2 ring-gray-400">

                    <!-- Nombre del usuario -->
                    <h2 class="text-lg font-semibold mb-4">Admin</h2>

                    <!-- Menú de opciones (3 puntos) -->
                    <div class="relative">
                        <input type="checkbox" id="options-toggle" class="hidden">
                        <label for="options-toggle" class="cursor-pointer text-xl font-bold">⋮</label>
                        <div class="absolute right-0 mt-2 w-36 bg-gray-100 rounded-md shadow-lg border hidden" id="options-menu">
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Editar Perfil</a>
                            <a href="logout.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Estilos para abrir/cerrar modal y menú -->
<style>
/* Mostrar modal al chequear checkbox */
#modal-toggle:checked ~ #modal {
    opacity: 1;
    pointer-events: auto;
}

/* Mostrar menú de 3 puntos */
#options-toggle:checked ~ #options-menu {
    display: block;
}
</style>
