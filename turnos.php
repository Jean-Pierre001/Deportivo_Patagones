    <?php include 'includes/header.php'; ?>
    <link rel="stylesheet" href="assets/css/turnos.css">
    <script src="turnos-logic.js" defer></script>
</head>
<body class="bg-gray-50 transition-colors duration-300">
    <?php include 'includes/navbar.php'; ?>
    <header class="hero-image-background-checkout text-white py-12 -mt-[65px] pt-[100px]">
        <div class="container mx-auto px-4 hero-content">
            <h1 class="text-3xl font-bold">Reserva de Turnos</h1>
            <p class="mt-2 text-lg">Estás reservando: <strong id="facility-name-header">Cargando...</strong></p>
        </div>
    </header>

    <section id="reservas" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-gray-100 rounded-xl p-6 shadow-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4 text-gray-800">1. Selecciona Fecha</h3>
                        <div class="mb-4">
                            <button id="show-calendar-btn" class="w-full px-4 py-2 border rounded-lg text-left flex justify-between items-center bg-white hover:bg-gray-50">
                                <span id="calendar-display-text">Seleccionar fecha</span>
                                <i data-feather="calendar" class="w-5 h-5"></i>
                            </button>
                        </div>
                        
                        <div class="calendar-container">
                            <div id="calendar" class="bg-white p-4 rounded-lg shadow mb-4">
                                <div class="flex justify-between items-center mb-4">
                                    <button id="prev-month-btn" class="p-2 hover:bg-gray-100 rounded"><i data-feather="chevron-left"></i></button>
                                    <h4 class="font-bold text-gray-800" id="current-month-year"></h4>
                                    <button id="next-month-btn" class="p-2 hover:bg-gray-100 rounded"><i data-feather="chevron-right"></i></button>
                                </div>
                                <div class="grid grid-cols-7 text-center text-sm font-semibold text-gray-500 mb-2">
                                    <span>Dom</span><span>Lun</span><span>Mar</span><span>Mié</span><span>Jue</span><span>Vie</span><span>Sáb</span>
                                </div>
                                <div id="calendar-days" class="grid grid-cols-7 text-center gap-1">
                                    </div>
                            </div>
                        </div>
                        
                        <div class="mb-4" id="time-selection-area" style="display:none;">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">2. Selecciona Horario (Rango)</h3>
                            <div id="time-slots" class="grid grid-cols-3 md:grid-cols-4 gap-2 max-h-64 overflow-y-auto p-2 bg-white rounded-lg border">
                            </div>
                            <p class="text-sm text-gray-500 mt-2">Haz clic para seleccionar el **inicio** y luego el **fin** de tu turno.</p>
                            <div id="reservation-warning" class="mt-3 p-3 bg-red-100 border border-red-400 text-red-700 rounded-lg hidden" role="alert">
                                <strong>¡ERROR!</strong> El rango seleccionado incluye un turno (<span id="warning-hour"></span>) que está ocupado. Intenta otro rango.
                            </div>
                        </div>

                        <div id="additional-services-container" class="mt-8">
                            
                            <div id="salon-extras" class="p-4 bg-white rounded-xl shadow-md border-t-4 border-secondary" style="display:none;">
                                <h3 class="text-xl font-bold mb-4 text-secondary">3. Servicios Adicionales (Salón)</h3>
                                
                                <div class="flex items-center mb-4">
                                    <input type="checkbox" id="catering-checkbox" class="h-5 w-5 text-secondary rounded focus:ring-secondary">
                                    <label for="catering-checkbox" class="ml-3 text-lg font-medium text-gray-700">
                                        Solicitar Servicio de Catering (Extra: $<span id="catering-price-display">15.000</span>)
                                    </label>
                                </div>

                                <div id="allergy-section" class="ml-8 mt-3" style="display:none;">
                                    <label for="allergies" class="block text-gray-700 mb-2">Alergias / Restricciones Alimenticias:</label>
                                    <textarea id="allergies" rows="2" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary" placeholder="Ej: Invitado alérgico al maní, 2 vegetarianos, etc."></textarea>
                                </div>
                            </div>
                            
                            <div id="futbol-albergue-extras" class="p-4 bg-white rounded-xl shadow-md border-t-4 border-primary" style="display:none;">
                                <h3 class="text-xl font-bold mb-4 text-primary">3. Servicios Adicionales (Quincho/Cocina)</h3>
                                
                                <div class="mb-4">
                                    <label for="quincho-hours-select" class="block text-lg font-medium text-gray-700 mb-2">
                                        Horas Adicionales de Quincho (para uso posterior a la reserva)
                                    </label>
                                    <select id="quincho-hours-select" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                        <option value="0">0 Horas</option>
                                        <option value="1">1 Hora Adicional ($2.000)</option>
                                        <option value="2">2 Horas Adicionales ($4.000)</option>
                                        <option value="3">3 Horas Adicionales ($6.000)</option>
                                    </select>
                                </div>
                                
                                <div class="flex items-center mb-4">
                                    <input type="checkbox" id="kitchen-use-checkbox" class="h-5 w-5 text-primary rounded focus:ring-primary">
                                    <label for="kitchen-use-checkbox" class="ml-3 text-lg font-medium text-gray-700">
                                        Uso de Cocina (Refrigeración, Microondas, etc.) (Extra: $<span id="kitchen-price-display">3.000</span> fijo)
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <div>
                        <h3 class="text-xl font-bold mb-4 text-gray-800">Resumen y Pago</h3>
                        <div class="bg-white rounded-lg p-4 shadow mb-4">
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Instalación:</span>
                                <span class="font-medium" id="selected-facility">-</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Fecha:</span>
                                <span class="font-medium" id="selected-date-display">-</span>
                            </div>
                            <div class="mb-2">
                                <span class="text-gray-600">Horarios Reservados:</span>
                                <div class="font-medium mt-1 space-y-1 text-sm" id="selected-time-display">
                                    <span class="italic text-gray-400">Selecciona tu rango horario.</span>
                                </div>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span class="text-gray-600">Cantidad de Horas:</span>
                                <span class="font-medium" id="total-hours">0</span>
                            </div>

                            <div id="extras-summary">
                                </div>

                            <div class="border-t my-3 border-gray-200"></div>
                            
                            <div class="flex justify-between font-bold text-lg mb-2">
                                <span class="text-gray-800">Total Reserva:</span>
                                <span class="text-primary font-extrabold" id="total-reservation-price">$0</span>
                            </div>
                            <div class="flex justify-between font-bold text-lg border-t border-dashed pt-2">
                                <span class="text-gray-800">Seña (30% Mínimo):</span>
                                <span class="text-red-500 font-extrabold" id="deposit-price">$0</span>
                            </div>
                        </div>
                        
                        <button id="go-to-checkout-btn" class="w-full bg-secondary hover:bg-green-500 text-white py-3 rounded-lg font-bold transition">
                            Pagar Seña y Continuar
                        </button>
                        <p class="text-xs text-center text-gray-500 mt-2">Serás redirigido a la página de pago.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>
   <script>
            // --- LÓGICA DE NAVBAR CON OPACIDAD GRADUAL (FADING A NEGRO) ---
            const navbar = document.querySelector('nav');
            const maxScroll = 150; 
            
            const scrollHandler = () => {
                const scrollY = window.scrollY;
                let opacity = Math.min(1, scrollY / maxScroll);
                
                // Usamos rgb(0, 0, 0) para NEGRO
                navbar.style.backgroundColor = `rgba(0, 0, 0, ${opacity})`;
                
                if (opacity > 0.9) {
                    navbar.classList.add('shadow-lg');
                } else {
                    navbar.classList.remove('shadow-lg');
                    navbar.classList.add('text-white'); 
                }
            };
            
            scrollHandler(); 
            window.addEventListener('scroll', scrollHandler);
            // --- FIN LÓGICA NAVBAR ---

    </script>
    <script>
        feather.replace();
    </script>
</body>
</html>