    <?php include 'includes/header.php'; ?>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6', // Azul
                        secondary: '#10b981', // Verde
                        mercadopago: '#ffc107', // Amarillo/Naranja de Mercado Pago
                        light_bg: '#f8fafc' 
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="assets/css/checkout.css">
</head>
<body class="bg-gray-50 transition-colors duration-300">
    <nav class="bg-transparent text-white sticky top-0 z-50 transition-all duration-300">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="assets/img/escudo.png" alt="Escudo C. S. y D. P." class="navbar-shield">
                <span class="text-xl font-bold">Deportivo Patagones</span>
            </div>
            <div class="flex items-center space-x-6">
                <a href="index.php" class="hover:text-secondary transition">Inicio</a>
                <a href="index.php" class="hover:text-secondary transition">Instalaciones</a>
                <a href="turnos.php" class="hover:text-secondary transition">Reservar</a>
                <button id="login-btn" class="bg-secondary hover:bg-green-500 px-4 py-2 rounded-lg font-medium transition">
                    Iniciar sesión
                </button>
            </div>
        </div>
    </nav>
    
    <header class="hero-image-background-checkout text-white py-12 -mt-[65px] pt-[100px]">
        <div class="container mx-auto px-4 header-content">
            <h1 class="text-3xl font-bold">Checkout y Pago de Seña</h1>
            <p class="mt-2 text-lg">Confirma los detalles de tu reserva antes de pagar.</p>
        </div>
    </header>

    <section id="checkout" class="py-16">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-lg">
                    <h2 class="text-2xl font-bold mb-6 text-primary">Tu Reserva</h2>
                    
                    <div id="reservation-summary-details" class="space-y-4 text-gray-900">
                        </div>

                    <div class="mt-8">
                        <h3 class="text-xl font-bold mb-4 text-gray-900">Información de Contacto</h3>
                        <form>
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 mb-2">Nombre Completo</label>
                                <input type="text" id="name" class="w-full px-4 py-2 border rounded-lg focus:ring-primary" required>
                            </div>
                            <div class="mb-4">
                                <label for="phone" class="block text-gray-700 mb-2">Teléfono</label>
                                <input type="tel" id="phone" class="w-full px-4 py-2 border rounded-lg focus:ring-primary" required>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="lg:col-span-1">
                    <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-red-500">
                        <h2 class="text-2xl font-bold mb-4 text-gray-900">Resumen de Pago</h2>
                        
                        <div class="space-y-2 mb-6">
                            <div class="flex justify-between text-gray-700"><span>Total Reserva:</span><span id="checkout-total-price" class="font-medium"></span></div>
                            <div class="flex justify-between font-semibold"><span>Seña (30% Mín.):</span><span class="text-red-500" id="checkout-deposit-price"></span></div>
                        </div>
                        
                        <div class="border-t border-gray-200 my-4"></div>

                        <h3 class="text-xl font-bold mb-4 text-gray-900">Pagar Ahora</h3>
                        <p class="text-sm text-gray-600 mb-4">El pago de la seña garantiza tu reserva. El saldo restante se abona al ingresar.</p>
                        
                        <button id="process-payment-btn" class="w-full bg-mercadopago hover:bg-yellow-500 text-gray-900 py-3 rounded-lg font-bold transition shadow-md">
                            Pagar Seña con MercadoPago
                        </button>
                    </div>

                    <a href="turnos.php" class="block mt-4 text-center text-primary hover:underline">
                        <i data-feather="arrow-left" class="inline w-4 h-4 mr-1"></i> Modificar Reserva
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div id="payment-success-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-8 max-w-md w-full relative text-center">
            <i data-feather="check-circle" class="w-16 h-16 mx-auto text-secondary mb-4"></i>
            <h2 class="text-2xl font-bold mb-4 text-gray-900">¡Pago Exitoso! 🎉</h2>
            <p class="text-gray-700 mb-6">Tu reserva ha sido confirmada. Recibirás un email con todos los detalles.</p>
            <button onclick="window.location.href='index.php'" class="w-full bg-primary hover:bg-blue-600 text-white py-2 rounded-lg font-medium transition">
                Volver al Inicio
            </button>
        </div>
    </div>

    <footer class="bg-gray-800 text-white py-12 mt-10">
        <div class="container mx-auto px-4">
            <div class="border-t border-gray-700 pt-8 text-center">
                <p>&copy; 2023 Club Social y Deportivo Patagones.</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            
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


            feather.replace();
            const reservationData = JSON.parse(localStorage.getItem('finalReservation'));
            const summaryDetails = document.getElementById('reservation-summary-details');
            
            const formatter = new Intl.NumberFormat('es-AR', { style: 'currency', currency: 'ARS', minimumFractionDigits: 0, maximumFractionDigits: 0 });
            
            
            // CORRECCIÓN CLAVE: Manejar el caso donde no hay datos en localStorage
            if (!reservationData) {
                summaryDetails.innerHTML = '<p class="text-red-500 font-bold">Error al cargar la reserva.</p><p>Por favor, regresa a la página de <a href="turnos.php" class="underline text-primary">Turnos</a>, selecciona tu reserva y haz clic en "Ir a Checkout".</p>';
                document.getElementById('checkout-total-price').textContent = formatter.format(0);
                document.getElementById('checkout-deposit-price').textContent = formatter.format(0);
                document.getElementById('process-payment-btn').disabled = true;
                document.getElementById('process-payment-btn').classList.add('opacity-50', 'cursor-not-allowed');
                return;
            }

            // Mapear horarios
            const timeSlotsDisplay = reservationData.timeSlots.map(time => {
                const startHour = parseInt(time);
                const endHour = startHour + 1;
                const displayStart = String(startHour % 24).padStart(2, '0');
                const displayEnd = String(endHour % 24).padStart(2, '0');
                return `${displayStart}:00 - ${displayEnd}:00`;
            }).join(', ');

            // Generar HTML de resumen
            let htmlSummary = `
                <div class="border-b pb-3">
                    <p class="text-lg font-bold text-gray-900">${reservationData.facility.name}</p>
                    <p class="text-sm text-gray-600">Ubicación: ${reservationData.facility.location}</p>
                </div>
                <div class="border-b pb-3">
                    <p class="font-semibold text-gray-900">Fecha y Horarios (${reservationData.totalHours} horas):</p>
                    <p class="text-gray-600">${new Date(reservationData.date + 'T12:00:00').toLocaleDateString('es-AR', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}</p>
                    <p class="text-gray-600 text-sm mt-1">Horarios: ${timeSlotsDisplay}</p>
                </div>
            `;
            
            // Quincho Adicional
            if (reservationData.quincho.hours > 0) {
                htmlSummary += `
                    <div class="border-b pb-3">
                        <p class="font-semibold text-primary">Quincho Adicional (Post-turno):</p>
                        <ul class="text-gray-600 text-sm list-disc pl-5">
                            <li>${reservationData.quincho.hours} horas extra (${formatter.format(reservationData.quincho.price)})</li>
                        </ul>
                    </div>
                `;
            }

            // Uso de Cocina
             if (reservationData.kitchenUse && reservationData.kitchenUse.selected) {
                 htmlSummary += `
                    <div class="border-b pb-3">
                        <p class="font-semibold text-pink-500">Uso de Cocina:</p>
                        <p class="text-gray-600 text-sm">Costo fijo: ${formatter.format(reservationData.kitchenUse.price)}</p>
                    </div>
                `;
            }


            // Catering
            if (reservationData.catering.selected) {
                htmlSummary += `
                    <div class="border-b pb-3">
                        <p class="font-semibold text-secondary">Servicio de Catering:</p>
                        <p class="text-gray-600 text-sm">Costo fijo: ${formatter.format(reservationData.catering.price)}</p>
                        ${reservationData.allergies ? `<p class="text-gray-600 text-sm italic">Notas: ${reservationData.allergies}</p>` : ''}
                    </div>
                `;
            }

            summaryDetails.innerHTML = htmlSummary;

            // Actualizar Totales
            document.getElementById('checkout-total-price').textContent = formatter.format(reservationData.totalPrice);
            document.getElementById('checkout-deposit-price').textContent = formatter.format(reservationData.deposit);

            // Lógica de Pago (Simulación)
            document.getElementById('process-payment-btn').addEventListener('click', () => {
                const name = document.getElementById('name').value;
                const phone = document.getElementById('phone').value;
                
                if (!name || !phone) {
                    alert('Por favor, completa tu Nombre y Teléfono.');
                    return;
                }

                // SIMULACIÓN DE PAGO EXITOSO
                setTimeout(() => {
                    localStorage.removeItem('finalReservation');
                    document.getElementById('payment-success-modal').classList.remove('hidden');
                }, 1500);
            });
            
            // Lógica para mostrar modal de login (si existiera el modal)
            const loginBtn = document.getElementById('login-btn');
            const loginModal = document.getElementById('login-modal');
            if (loginBtn && loginModal) {
                 loginBtn.addEventListener('click', () => { /* ... */ });
            }
        });
    </script>
</body>
</html>