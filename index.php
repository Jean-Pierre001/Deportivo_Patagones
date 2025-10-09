<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Social y Deportivo Patagones - Inicio y Reservas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6', // Azul
                        secondary: '#10b981', // Verde
                        mercadopago: '#ffc107', // Amarillo/Naranja
                        light_bg: '#f8fafc' // Blanco roto
                    }
                }
            }
        }
    </script>
    <style>
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        /* --- ESTILOS DE IMAGENES --- */
        
        .navbar-shield {
            height: 40px; 
            width: auto;
            border-radius: 50%;
            background-color: white; 
            padding: 2px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            object-fit: contain;
        }

        .hero-image-background {
            /* Asegúrate de que bannerweb.jpg exista en tu carpeta */
            background-image: url(bannerweb.jpg); 
            background-size: cover; /* Cambiado de 100% a cover para mejor adaptación */
            background-position: center; /* Centrado */
            position: relative;
        }

        .hero-image-background::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.3); 
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            color: white; 
        }

        .text-shadow-lg {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body class="bg-gray-50 transition-colors duration-300">
    <nav class="bg-transparent text-white sticky top-0 z-50 transition-all duration-300">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="escudo.png" alt="Escudo C. S. y D. P." class="navbar-shield">
                <span class="text-xl font-bold">Deportivo Patagones</span>
            </div>
            <div class="flex items-center space-x-6">
                <a href="index.html" class="hover:text-secondary transition">Inicio</a>
                <a href="#instalaciones" class="hover:text-secondary transition">Instalaciones</a>
                <a href="turnos.html" class="hover:text-secondary transition">Reservar</a>
                <button id="login-btn" class="bg-secondary hover:bg-green-500 px-4 py-2 rounded-lg font-medium transition">
                    Iniciar sesión
                </button>
            </div>
        </div>
    </nav>

    <header class="hero-image-background py-20 -mt-[60px] h-[70vh] flex items-center justify-center">
        <div class="container mx-auto px-4 text-center hero-content pt-20">
             <img src="escudo.png" alt="Escudo C. S. y D. P." class="mx-auto mb-6 w-28 h-28 object-contain rounded-full bg-white p-2 shadow-lg relative z-30">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 text-shadow-lg">Club Social y Deportivo Patagones</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto font-semibold text-shadow-lg">Tu espacio multideportivo en Carmen de Patagones</p>
            <a href="#instalaciones" class="bg-secondary hover:bg-green-500 text-white px-8 py-3 rounded-lg font-bold text-lg transition inline-block shadow-xl">
                Ver Instalaciones
            </a>
        </div>
    </header>

    <section id="instalaciones" class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-10 text-gray-800">Nuestros Ambientes y Servicios</h2>
            
            <div class="flex justify-center space-x-4 mb-10">
                <button class="filter-btn bg-primary text-white px-5 py-2 rounded-full font-semibold transition" data-filter="all">Todos</button>
                <button class="filter-btn bg-gray-200 hover:bg-gray-300 px-5 py-2 rounded-full font-semibold transition" data-filter="futbol">Canchas</button>
                <button class="filter-btn bg-gray-200 hover:bg-gray-300 px-5 py-2 rounded-full font-semibold transition" data-filter="salon">Salones</button>
                <button class="filter-btn bg-gray-200 hover:bg-gray-300 px-5 py-2 rounded-full font-semibold transition" data-filter="albergue">Albergues</button>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div class="card bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 card-hover" data-category="futbol">
                    <img src="cancha_placeholder.jpg" alt="Cancha de Fútbol" class="rounded-t-xl h-48 w-full object-cover">
                    <div class="p-6">
                        <h4 class="text-2xl font-bold text-gray-800 mb-2">Canchas de Fútbol/Tenis</h4>
                        <span class="inline-block bg-primary text-white text-xs px-3 py-1 rounded-full font-semibold mb-3">Deportivo</span>
                        <p class="text-gray-600 mb-4">Reserva tu horario en nuestras canchas sintéticas. Incluye acceso a vestuarios. ¡Opciones de quincho y cocina adicionales!</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-xl font-bold text-secondary">$5.000 / Hora</span>
                        </div>
                        <button 
                            class="select-facility-btn w-full bg-secondary hover:bg-green-600 text-white py-2 rounded-lg font-bold transition"
                            data-id="cancha-principal"
                            data-name="Cancha Principal (Fútbol)"
                            data-price="5000"
                            data-category="futbol"
                            data-location="Sector Deportivo"
                        >Reservar</button>
                    </div>
                </div>
                
                <div class="card bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 card-hover" data-category="salon">
                    <img src="salon_placeholder.jpg" alt="Salón de Eventos" class="rounded-t-xl h-48 w-full object-cover">
                    <div class="p-6">
                        <h4 class="text-2xl font-bold text-gray-800 mb-2">Salones para Eventos</h4>
                        <span class="inline-block bg-pink-500 text-white text-xs px-3 py-1 rounded-full font-semibold mb-3">Eventos</span>
                        <p class="text-gray-600 mb-4">Ideal para fiestas, cumpleaños y reuniones. Se alquila por bloque o por hora. Opción a servicio de catering.</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-xl font-bold text-secondary">$5.000 / Hora</span>
                        </div>
                        <button 
                            class="select-facility-btn w-full bg-secondary hover:bg-green-600 text-white py-2 rounded-lg font-bold transition"
                            data-id="salon-a"
                            data-name="Salón Principal A"
                            data-price="5000"
                            data-category="salon"
                            data-location="Sector Central"
                        >Reservar</button>
                    </div>
                </div>

                <div class="card bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 card-hover" data-category="albergue">
                    <img src="albergue_placeholder.jpg" alt="Albergue Deportivo" class="rounded-t-xl h-48 w-full object-cover">
                    <div class="p-6">
                        <h4 class="text-2xl font-bold text-gray-800 mb-2">Albergues Deportivos</h4>
                        <span class="inline-block bg-yellow-600 text-white text-xs px-3 py-1 rounded-full font-semibold mb-3">Estadía</span>
                        <p class="text-gray-600 mb-4">Hospedaje simple para delegaciones. Se alquila por hora/día. Incluye acceso a quincho y uso de cocina adicional.</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-xl font-bold text-secondary">$2.000 / Hora</span>
                        </div>
                        <button 
                            class="select-facility-btn w-full bg-secondary hover:bg-green-600 text-white py-2 rounded-lg font-bold transition"
                            data-id="albergue-1"
                            data-name="Albergue Básico"
                            data-price="2000"
                            data-category="albergue"
                            data-location="Sector Cabañas"
                        >Reservar</button>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <div id="login-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-8 max-w-sm w-full relative">
            <button id="close-modal" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600"><i data-feather="x"></i></button>
            <h2 class="text-2xl font-bold mb-4 text-gray-900">Iniciar Sesión</h2>
            </div>
    </div>
    
<?php include 'includes/footer.php'; ?>

    <script>
        document.querySelectorAll('.select-facility-btn').forEach(button => {
            button.addEventListener('click', () => {
                const facilityData = {
                    id: button.getAttribute('data-id'),
                    name: button.getAttribute('data-name'),
                    price: button.getAttribute('data-price'),
                    category: button.getAttribute('data-category'),
                    location: button.getAttribute('data-location')
                };
                
                localStorage.setItem('selectedFacility', JSON.stringify(facilityData));
                window.location.href = 'turnos.html';
            });
        });

        const loginBtn = document.getElementById('login-btn');
        const loginModal = document.getElementById('login-modal');
        const closeModal = document.getElementById('close-modal');
        if(loginBtn && loginModal && closeModal) {
            loginBtn.addEventListener('click', () => loginModal.classList.remove('hidden'));
            closeModal.addEventListener('click', () => loginModal.classList.add('hidden'));
        }

        const filterBtns = document.querySelectorAll('.filter-btn');
        const cards = document.querySelectorAll('.card');
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                filterBtns.forEach(b => {
                    b.classList.remove('active', 'bg-primary', 'text-white');
                    b.classList.add('bg-gray-200');
                });
                btn.classList.add('active', 'bg-primary', 'text-white');
                btn.classList.remove('bg-gray-200');
                
                const filter = btn.getAttribute('data-filter');
                cards.forEach(card => {
                    card.style.display = (filter === 'all' || card.getAttribute('data-category') === filter) ? 'block' : 'none';
                });
            });
        });

        feather.replace();
        
// --- LÓGICA DE NAVBAR CON OPACIDAD GRADUAL (FADING) ---
document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.querySelector('nav');
    
    // Distancia de scroll en la que el navbar alcanza opacidad total (Ajusta a 250 en index.html, 150 en otros)
    const maxScroll = 150; // O 150 en checkout.html y turnos.html
    
    const scrollHandler = () => {
        const scrollY = window.scrollY;
        
        // Calcula la opacidad entre 0 y 1.
        let opacity = Math.min(1, scrollY / maxScroll);
        
        // CAMBIO CLAVE: Usamos rgb(0, 0, 0) para NEGRO en lugar de rgb(59, 130, 246) para azul.
        navbar.style.backgroundColor = `rgba(0, 0, 0, ${opacity})`;
        
        // Muestra la sombra solo cuando la opacidad es casi completa (ej: 90% o más)
        if (opacity > 0.9) {
            navbar.classList.add('shadow-lg');
            // Opcional: Si el texto del navbar es blanco y quieres que cambie al final:
            // navbar.classList.remove('text-white'); 
            // navbar.classList.add('text-gray-900');
        } else {
            navbar.classList.remove('shadow-lg');
            // Aseguramos que el texto sea blanco cuando está transparente para que se vea sobre el banner
            navbar.classList.add('text-white'); 
        }
    };
    
    // Ejecutar al inicio y escuchar el evento de scroll
    scrollHandler(); 
    window.addEventListener('scroll', scrollHandler);
});
    </script>
</body>
</html>