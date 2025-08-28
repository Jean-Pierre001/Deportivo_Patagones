<?php
include 'includes/header.php';
include 'includes/sidebar.php';
?>

<div class="ml-64 flex flex-col min-h-screen bg-gray-100">
  <?php include 'includes/navbar.php'; ?>

  <main class="flex-1 p-8">

    <!-- Encabezado -->
    <div class="bg-white rounded-xl p-8 shadow mb-8 border-l-4 border-green-600">
      <h1 class="text-3xl font-bold text-gray-900 mb-2">Calendario Interactivo de Eventos</h1>
      <p class="text-gray-600">Explora y gestiona todos los eventos del club de manera dinámica.</p>
    </div>

    <!-- Botón agregar evento -->
    <div class="mb-6 flex justify-end">
      <button onclick="Swal.fire('Nuevo Evento', 'Formulario para agregar evento', 'info')" class="bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-6 rounded shadow">+ Agregar Evento</button>
    </div>

    <!-- Calendario FullCalendar -->
    <div class="bg-white rounded-xl p-6 shadow">
      <div id="calendar" class="h-[700px]"></div> <!-- altura fija -->
    </div>

  </main>

  <?php include 'includes/footer.php'; ?>
</div>

<!-- FullCalendar CSS & JS -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      events: [
        { title: 'Entrenamiento Juveniles', start: '2025-08-28T17:00', color: '#4ADE80' },
        { title: 'Torneo Interno', start: '2025-08-30T18:00', color: '#22D3EE' },
        { title: 'Reunión de Socios', start: '2025-09-02T19:00', color: '#FACC15' },
        { title: 'Fiesta del Club', start: '2025-09-05T21:00', color: '#F87171' }
      ],
      eventClick: function(info) {
        Swal.fire('Evento', 'Nombre: ' + info.event.title + '\nFecha: ' + info.event.start.toLocaleString(), 'info');
      }
    });

    calendar.render();

    // Recordatorio de eventos próximos cada minuto
    setInterval(() => {
      var ahora = new Date();
      calendar.getEvents().forEach(event => {
        const diff = (event.start - ahora) / (1000 * 60); // diferencia en minutos
        if(diff > 0 && diff <= 60 && !event.extendedProps.alerted) {
          Swal.fire({
            title: 'Recordatorio',
            text: `El evento "${event.title}" comienza en menos de una hora.`,
            icon: 'info',
            timer: 5000,
            showConfirmButton: false
          });
          event.setExtendedProp('alerted', true);
        }
      });
    }, 60000);
  });
</script>
