<?php include 'includes/header.php'; ?>
<body class="bg-gray-100 flex flex-col min-h-screen font-sans antialiased bg-gradient-to-b from-white via-slate-50 to-slate-100 text-slate-900">
    <?php include 'includes/navbar.php'; ?>
    <main class="flex-grow container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-6">Tu Carrito</h1>
        <div class="bg-white shadow-md rounded-lg p-4">
            <p class="text-gray-600">No hay productos en el carrito todavía.</p>
        </div>
        <div class="mt-4 text-right">
            <button class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Proceder al Pago</button>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
