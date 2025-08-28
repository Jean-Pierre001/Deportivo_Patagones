<footer class="bg-gray-100 text-gray-500 text-xs rounded-lg mt-12 px-4 py-6 shadow-inner text-center w-full">
  &copy; 2025 Club Deportivo Patagones. Todos los derechos reservados.
</footer>

<!-- Scripts globales -->
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
<!-- Inicializar animaciones AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const navbar = document.getElementById("navbar");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
            navbar.classList.remove("bg-gray-900", "shadow-md");
            navbar.classList.add("bg-transparent");
        } else {
            navbar.classList.add("bg-gray-900", "shadow-md");
            navbar.classList.remove("bg-transparent");
        }
    });
</script>
<script>
  AOS.init({
    duration: 800,
    once: true
  });
</script>

<script>
const ventasCtx = document.getElementById('ventasChart').getContext('2d');
new Chart(ventasCtx, {
    type: 'bar',
    data: {
        labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
        datasets: [{
            label: 'Ventas $',
            data: [12000, 15000, 13000, 18000, 16000, 20000],
            backgroundColor: 'rgba(34,197,94,0.7)',
            borderRadius: 5
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true } }
    }
});

const reservasCtx = document.getElementById('reservasChart').getContext('2d');
new Chart(reservasCtx, {
    type: 'line',
    data: {
        labels: ['Lun','Mar','Mié','Jue','Vie','Sáb','Dom'],
        datasets: [{
            label: 'Reservas',
            data: [10, 15, 8, 20, 25, 30, 18],
            borderColor: '#22D3EE',
            backgroundColor: 'rgba(34,211,238,0.2)',
            tension: 0.3,
            fill: true
        }]
    },
    options: { responsive: true, plugins: { legend: { display: false } } }
});
</script>
