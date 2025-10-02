
<?php include 'includes/header.php'; ?>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body class="bg-gray-50" x-data="{ darkMode: false, mobileMenuOpen: false }" :class="{ 'dark': darkMode }">
    <!-- Header -->
    <header class="bg-white dark:bg-gray-800 shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="#" class="flex items-center">
                <i data-feather="dribbble" class="text-green-500 w-8 h-8"></i>
                <span class="ml-2 text-2xl font-bold text-gray-800 dark:text-white">Club Social y Deportivo Patagones</span>
            </a>
            
            <div class="hidden md:flex items-center space-x-6">
                <nav class="flex space-x-8">

                    <a href="#" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                        Iniciar sesión
                    </a>
                </div>
            </div>
            
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 rounded-lg bg-gray-100 dark:bg-gray-700">
                <i data-feather="menu" class="w-6 h-6 text-gray-600 dark:text-gray-300"></i>
            </button>
        </div>
        
        <!-- Mobile menu -->
        <div x-show="mobileMenuOpen" class="md:hidden bg-white dark:bg-gray-800 shadow-lg">
            <div class="container mx-auto px-4 py-4 flex flex-col space-y-4">

                    <a href="#" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                        Iniciar sesión
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-green-500 to-green-600 text-white py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Encuentra y reserva tu espacio</h1>
                <!--<p class="text-xl mb-8">Más de 500 canchas disponibles con reserva instantánea y pago seguro</p>-->
                <br>
                
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl p-4 max-w-3xl mx-auto">
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="flex-1">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-1">Ubicación</label>
                            <div class="relative">
                                <input type="text" placeholder="Ciudad, barrio o dirección" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <i data-feather="map-pin" class="absolute right-3 top-3.5 text-gray-400"></i>
                            </div>
                        </div>
                        
                        <div class="flex-1">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-1">Fecha</label>
                            <div class="relative">
                                <input type="date" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <i data-feather="calendar" class="absolute right-3 top-3.5 text-gray-400"></i>
                            </div>
                        </div>
                        
                        <button class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-medium transition-colors flex items-center justify-center">
                            <i data-feather="search" class="mr-2"></i> Buscar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Canchas Section -->
    <section id="canchas" class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-10">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Canchas disponibles</h2>
                
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <select class="appearance-none bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 pr-8 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent text-gray-700 dark:text-white">
                            <option>Filtrar por</option>
                            <option>Precio: Menor a mayor</option>
                            <option>Precio: Mayor a menor</option>
                            <option>Mejor valoradas</option>
                            <option>Más cercanas</option>
                        </select>
                        <i data-feather="chevron-down" class="absolute right-3 top-2.5 text-gray-400"></i>
                    </div>
                    
                    <button class="p-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600">
                        <i data-feather="map" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i>
                    </button>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Cancha Card 1 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden card-hover">
                    <div class="relative">
                        <img src="https://static.photos/sport/640x360/1" alt="Cancha de fútbol" class="w-full h-48 object-cover">
                        <div class="absolute top-3 right-3 bg-green-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                            <i data-feather="star" class="w-3 h-3 inline mr-1"></i> 4.8
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-1">Cancha Los Pinos</h3>
                                <div class="flex items-center text-gray-600 dark:text-gray-300 mb-3">
                                    <i data-feather="map-pin" class="w-4 h-4 mr-1"></i>
                                    <span>San Isidro, Lima</span>
                                </div>
                            </div>
                            <span class="bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 px-2 py-1 rounded-full text-xs font-medium">Césped sintético</span>
                        </div>
                        
                        <div class="flex items-center justify-between mt-4">
                            <div>
                                <span class="text-gray-500 dark:text-gray-400 text-sm">Desde</span>
                                <p class="text-2xl font-bold text-gray-800 dark:text-white">S/ 80 <span class="text-sm font-normal text-gray-500 dark:text-gray-400">/hora</span></p>
                            </div>
                            
                            <a href="#" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-medium transition-colors text-sm">
                                Reservar
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Cancha Card 2 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden card-hover">
                    <div class="relative">
                        <img src="https://static.photos/sport/640x360/2" alt="Cancha de fútbol" class="w-full h-48 object-cover">
                        <div class="absolute top-3 right-3 bg-green-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                            <i data-feather="star" class="w-3 h-3 inline mr-1"></i> 4.9
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-1">Estadio Mini</h3>
                                <div class="flex items-center text-gray-600 dark:text-gray-300 mb-3">
                                    <i data-feather="map-pin" class="w-4 h-4 mr-1"></i>
                                    <span>Miraflores, Lima</span>
                                </div>
                            </div>
                            <span class="bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 px-2 py-1 rounded-full text-xs font-medium">Césped natural</span>
                        </div>
                        
                        <div class="flex items-center justify-between mt-4">
                            <div>
                                <span class="text-gray-500 dark:text-gray-400 text-sm">Desde</span>
                                <p class="text-2xl font-bold text-gray-800 dark:text-white">S/ 120 <span class="text-sm font-normal text-gray-500 dark:text-gray-400">/hora</span></p>
                            </div>
                            
                            <a href="#" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-medium transition-colors text-sm">
                                Reservar
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Cancha Card 3 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden card-hover">
                    <div class="relative">
                        <img src="https://static.photos/sport/640x360/3" alt="Cancha de fútbol" class="w-full h-48 object-cover">
                        <div class="absolute top-3 right-3 bg-green-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                            <i data-feather="star" class="w-3 h-3 inline mr-1"></i> 4.7
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-1">Fútbol Park</h3>
                                <div class="flex items-center text-gray-600 dark:text-gray-300 mb-3">
                                    <i data-feather="map-pin" class="w-4 h-4 mr-1"></i>
                                    <span>Surco, Lima</span>
                                </div>
                            </div>
                            <span class="bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 px-2 py-1 rounded-full text-xs font-medium">Césped sintético</span>
                        </div>
                        
                        <div class="flex items-center justify-between mt-4">
                            <div>
                                <span class="text-gray-500 dark:text-gray-400 text-sm">Desde</span>
                                <p class="text-2xl font-bold text-gray-800 dark:text-white">S/ 65 <span class="text-sm font-normal text-gray-500 dark:text-gray-400">/hora</span></p>
                            </div>
                            
                            <a href="#" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-medium transition-colors text-sm">
                                Reservar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="#" class="inline-flex items-center text-green-500 hover:text-green-600 font-medium">
                    Ver más canchas
                    <i data-feather="chevron-right" class="w-5 h-5 ml-1"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- Contacto Section -->
    <section id="contacto" class="py-16 bg-white dark:bg-gray-800">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-white mb-12">Contáctanos</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Información de contacto</h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="bg-green-100 dark:bg-green-900 p-2 rounded-lg mr-4">
                                    <i data-feather="mail" class="w-5 h-5 text-green-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800 dark:text-white">Correo electrónico</h4>
                                    <p class="text-gray-600 dark:text-gray-300">hola@canchasfutbolgo.com</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-green-100 dark:bg-green-900 p-2 rounded-lg mr-4">
                                    <i data-feather="phone" class="w-5 h-5 text-green-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800 dark:text-white">Teléfono</h4>
                                    <p class="text-gray-600 dark:text-gray-300">+51 987 654 321</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-green-100 dark:bg-green-900 p-2 rounded-lg mr-4">
                                    <i data-feather="map-pin" class="w-5 h-5 text-green-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800 dark:text-white">Oficina principal</h4>
                                    <p class="text-gray-600 dark:text-gray-300">Av. Javier Prado 123, Lima, Perú</p>
                                </div>
                            </div>
                            <iframe class="rounded" src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d6040.323631542815!2d-62.9827574!3d-40.8024378!3m2!1i1024!2i768!4f13.1!2m1!1sclub%20deportivo%20patagones!5e0!3m2!1ses-419!2sar!4v1759434180685!5m2!1ses-419!2sar" width="450" height="250" style="border:solid 1px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" ></iframe>
                        </div>
                    </div>
                    <div>
                        <form class="mx-4 space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nombre completo</label>
                                <input type="text" id="name" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Correo electrónico</label>
                                <input type="email" id="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            </div>
                            
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Mensaje</label>
                                <textarea id="message" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                            </div>
                            
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-medium transition-colors w-full">
                                Enviar mensaje
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                
                <div>
                    <h3 class="text-lg font-bold mb-4">Enlaces rápidos</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Inicio</a></li>
                        <li><a href="#canchas" class="text-gray-400 hover:text-white">Canchas</a></li>
                        <!--<li><a href="#como-funciona" class="text-gray-400 hover:text-white">Cómo funciona</a></li>
                        <li><a href="#testimonios" class="text-gray-400 hover:text-white">Testimonios</a></li>-->
                        <li><a href="#contacto" class="text-gray-400 hover:text-white">Contacto</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Legal</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Términos y condiciones</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Política de privacidad</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Política de cookies</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Suscríbete</h3>
                    <p class="text-gray-400 mb-4">Recibe las últimas novedades y promociones.</p>
                    
                    <form class="flex">
                        <input type="email" placeholder="Tu correo" class="px-4 py-2 rounded-l-lg focus:outline-none text-gray-800 w-full">
                        <button type="submit" class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded-r-lg">
                            <i data-feather="send" class="w-5 h-5"></i>
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-12 pt-8 text-center text-gray-400">
                <p>© 2025 Club Social y Deportivo Patagones. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>