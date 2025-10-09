<?php
// includes/footer.php
?>
    <!-- Librerías JS necesarias -->

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- AOS Animate on Scroll -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Font Awesome JS (opcional si necesitas algunos scripts) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-x..." crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Inicializar AOS -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            AOS.init();
        });
    </script>
    <!-- JS personalizado -->
    <!-- Llamar al archivo JS correspondiente al archivo EJEMPLO: <script src="assets/js/index.js" defer></script>  -->
    <script src="assets/js/login.js" defer></script>

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
                                    <p class="text-gray-600 dark:text-gray-300">correo@gmail.com</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-green-100 dark:bg-green-900 p-2 rounded-lg mr-4">
                                    <i data-feather="phone" class="w-5 h-5 text-green-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800 dark:text-white">Teléfono</h4>
                                    <p class="text-gray-600 dark:text-gray-300">+12 345 678 910</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-green-100 dark:bg-green-900 p-2 rounded-lg mr-4">
                                    <i data-feather="map-pin" class="w-5 h-5 text-green-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800 dark:text-white">Oficina principal</h4>
                                    <p class="text-gray-600 dark:text-gray-300">Av. John Doe 123</p>
                                </div>
                            </div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d755.058455747939!2d-62.981964088976376!3d-40.800855319834696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95f6986fc16888cd%3A0xbda0d4e12833fb2a!2sClub%20Social%20y%20Deportivo%20Patagones!5e0!3m2!1ses-419!2sar!4v1759780944567!5m2!1ses-419!2sar" class="rounded" width="450" height="250" style="border:solid 1px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
<script>
  feather.replace();
</script>
    
</body>
</html>
