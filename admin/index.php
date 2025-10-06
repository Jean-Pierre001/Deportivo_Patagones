<?php
// index.php
include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/navbar.php';
include 'includes/conn.php';
?>

<!-- Contenedor principal -->
<div class="flex-1 md:ml-64 transition-all duration-300">
  <main class="pt-20 p-4 md:p-6">
    
    <div class="flex justify-between items-center mb-4">
      <h1 class="text-2xl font-bold">Gestor de Clientes</h1>
      <button onclick="openModal()" class="bg-blue-600 text-white px-4 py-2 rounded">➕ Nuevo Cliente</button>
    </div>

    <!-- Tabla de clientes -->
    <div class="overflow-x-auto">
      <table class="w-full border border-gray-300" id="clientesTable">
        <thead class="bg-gray-100">
          <tr>
            <th class="border px-3 py-2">ID</th>
            <th class="border px-3 py-2">Nombre</th>
            <th class="border px-3 py-2">Teléfono</th>
            <th class="border px-3 py-2">Socio</th>
            <th class="border px-3 py-2">Acciones</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>

  </main>
</div>

<!-- Modal -->
<div id="clienteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
  <div class="bg-white p-6 rounded shadow-md w-96">
    <h2 class="text-xl mb-4" id="modalTitle">Nuevo Cliente</h2>
    <form id="clienteForm">
      <input type="hidden" name="id" id="id">

      <label class="block mb-2">Nombre</label>
      <input type="text" name="nombre" id="nombre" class="border w-full p-2 mb-3" required>

      <label class="block mb-2">Teléfono</label>
      <input type="text" name="telefono" id="telefono" class="border w-full p-2 mb-3">

      <label class="block mb-2">Socio</label>
      <select name="socio" id="socio" class="border w-full p-2 mb-3">
        <option value="Sí">Sí</option>
        <option value="No">No</option>
      </select>

      <div class="flex justify-end gap-2">
        <button type="button" onclick="closeModal()" class="bg-gray-400 text-white px-4 py-2 rounded">Cancelar</button>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
      </div>
    </form>
  </div>
</div>

<script>
// ----------------- CRUD FRONT -----------------

async function cargarClientes() {
  let res = await fetch("clientes.php?action=list");
  let data = await res.json();
  let tbody = document.querySelector("#clientesTable tbody");
  tbody.innerHTML = "";
  data.forEach(c => {
    tbody.innerHTML += `
      <tr>
        <td class="border px-3 py-2">${c.id_cliente}</td>
        <td class="border px-3 py-2">${c.nombre_completo}</td>
        <td class="border px-3 py-2">${c.telefono}</td>
        <td class="border px-3 py-2">${c.socio}</td>
        <td class="border px-3 py-2 flex gap-2">
          <button onclick="editarCliente(${c.id_cliente})" class="bg-yellow-500 text-white px-2 py-1 rounded">✏️</button>
          <button onclick="eliminarCliente(${c.id_cliente})" class="bg-red-600 text-white px-2 py-1 rounded">🗑️</button>
        </td>
      </tr>`;
  });
}

function openModal(cliente = null) {
  document.getElementById("clienteModal").classList.remove("hidden");
  if (cliente) {
    document.getElementById("modalTitle").innerText = "Editar Cliente";
    document.getElementById("id").value = cliente.id_cliente;
    document.getElementById("nombre").value = cliente.nombre_completo;
    document.getElementById("telefono").value = cliente.telefono;
    document.getElementById("socio").value = cliente.socio;
  } else {
    document.getElementById("modalTitle").innerText = "Nuevo Cliente";
    document.getElementById("clienteForm").reset();
    document.getElementById("id").value = "";
  }
}

function closeModal() {
  document.getElementById("clienteModal").classList.add("hidden");
}

async function editarCliente(id) {
  let res = await fetch("clientes.php?action=get&id=" + id);
  let cliente = await res.json();
  openModal(cliente);
}

document.getElementById("clienteForm").addEventListener("submit", async (e) => {
  e.preventDefault();
  let formData = new FormData(e.target);
  let action = formData.get("id") ? "update" : "add";
  formData.append("action", action);

  let res = await fetch("clientes.php", {
    method: "POST",
    body: formData
  });
  alert(await res.text());
  closeModal();
  cargarClientes();
});

async function eliminarCliente(id) {
  if (!confirm("¿Eliminar cliente?")) return;
  let formData = new FormData();
  formData.append("id", id);
  formData.append("action", "delete");
  let res = await fetch("clientes.php", {
    method: "POST",
    body: formData
  });
  alert(await res.text());
  cargarClientes();
}

cargarClientes();
</script>
