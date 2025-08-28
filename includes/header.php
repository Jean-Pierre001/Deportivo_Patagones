<?php
// Este archivo de pie de página contiene los scripts de JavaScript.
// Es un componente reutilizable para todas las páginas públicas del sitio web.
// Debe ser incluido en la parte inferior de cada página PHP, justo antes de cerrar la etiqueta </body>.
?>

<!-- jQuery es una de las librerías que simplifica el manejo del DOM y las peticiones AJAX. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- AOS (Animate On Scroll) script. Debe cargarse al final del body. -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- SweetAlert2 script. Se carga al final para su inicialización. -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Archivo JS personalizado para el proyecto. Aquí irá el código que escribamos nosotros. -->
<script src="../assets/js/main.js"></script>

<script>
    // Inicializa la librería AOS una vez que la página ha cargado
    AOS.init();

    // Puedes agregar otras inicializaciones o código aquí
    // La función showAlert() que creamos en el ejemplo anterior podría ir aquí.
    function showAlert() {
        Swal.fire({
            title: '¡Todo listo!',
            text: 'Las librerías están funcionando correctamente.',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        });
    }
</script>

</body>
</html>
