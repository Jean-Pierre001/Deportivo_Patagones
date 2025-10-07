<?php
include 'includes/header.php';
include 'includes/sidebar.php';
include 'includes/navbar.php';
include 'includes/conn.php';
?>

<!-- Contenedor principal -->
<div class="flex-1 md:ml-64 transition-all duration-300 relative z-0">
  <main class="mt-[90px] p-6 md:p-8 relative z-0">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Gestor de Clientes</h1>
      <button onclick="openModal()" 
              class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow-md transition">
        ➕ Agregar Cliente
      </button>
    </div>

    <!-- Tabla -->
    <div class="overflow-x-auto">
      <table class="w-full border border-gray-300" id="clientsTable">
        <thead class="bg-gray-100">
          <tr>
            <th class="border px-3 py-2">Member ID</th>
            <th class="border px-3 py-2">Nombre completo</th>
            <th class="border px-3 py-2">Número Telefónico</th>
            <th class="border px-3 py-2">Acciones</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </main>
</div>

<!-- Modal -->
<div id="clientModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
  <div class="bg-white p-6 rounded-2xl shadow-xl w-96 max-w-full transform transition-all">
    <h2 class="text-xl font-semibold mb-4 text-center" id="modalTitle">Agregar Cliente</h2>
    <form id="clientForm">
      <input type="hidden" name="client_id" id="client_id">

      <label class="block mb-2">Nombre completo</label>
      <input type="text" name="full_name" id="full_name" class="border border-gray-300 rounded w-full p-2 mb-3" required>

      <label class="block mb-2">Número telefónico</label>
      <input type="text" name="phone" id="phone" class="border border-gray-300 rounded w-full p-2 mb-3">

      <label class="block mb-2">¿Es miembro?</label>
      <select name="member" id="member" class="border border-gray-300 rounded w-full p-2 mb-4">
        <option value="No" selected>No</option>
        <option value="Yes">Sí</option>
      </select>

      <div id="memberIdField" class="hidden">
        <label class="block mb-2">ID de miembro</label>
        <input type="number" name="member_id" id="member_id_input" class="border border-gray-300 rounded w-full p-2 mb-3" min="1">
      </div>

      <div class="flex justify-end gap-2">
        <button type="button" onclick="closeModal()" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded transition">
          Cancelar
        </button>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
          Guardar
        </button>
      </div>
    </form>
  </div>
</div>

<script>
async function loadClients() {
  let res = await fetch("clients.php?action=list");
  let data = await res.json();
  let tbody = document.querySelector("#clientsTable tbody");
  tbody.innerHTML = "";

  data.forEach(c => {
    const memberText = (c.member_id === null) ? "No asociado" : c.member_id;
    tbody.innerHTML += `
      <tr>
        <td class="border px-3 py-2">${memberText}</td>
        <td class="border px-3 py-2">${c.full_name}</td>
        <td class="border px-3 py-2">${c.phone}</td>
        <td class="border px-3 py-2 flex gap-2 justify-center">
          <button onclick="editClient(${c.client_id})" class="bg-yellow-500 text-white px-2 py-1 rounded">✏️</button>
          <button onclick="deleteClient(${c.client_id})" class="bg-red-600 text-white px-2 py-1 rounded">🗑️</button>
        </td>
      </tr>`;
  });
}

function openModal(client = null) {
  document.getElementById("clientModal").classList.remove("hidden");
  const memberField = document.getElementById("memberIdField");

  if (client) {
    document.getElementById("modalTitle").innerText = "Editar Cliente";
    document.getElementById("client_id").value = client.client_id;
    document.getElementById("full_name").value = client.full_name;
    document.getElementById("phone").value = client.phone;
    document.getElementById("member").value = client.member_id ? "Yes" : "No";
    document.getElementById("member_id_input").value = client.member_id ?? "";
    memberField.classList.toggle("hidden", !client.member_id);
  } else {
    document.getElementById("modalTitle").innerText = "Agregar Cliente";
    document.getElementById("clientForm").reset();
    document.getElementById("client_id").value = "";
    memberField.classList.add("hidden");
  }
}

function closeModal() {
  document.getElementById("clientModal").classList.add("hidden");
}

document.getElementById("member").addEventListener("change", (e) => {
  const field = document.getElementById("memberIdField");
  if (e.target.value === "Yes") {
    field.classList.remove("hidden");
  } else {
    field.classList.add("hidden");
    document.getElementById("member_id_input").value = "";
  }
});

document.getElementById("clientForm").addEventListener("submit", async (e) => {
  e.preventDefault();
  let formData = new FormData(e.target);

  // ✅ Normalizamos los valores
  if (formData.get("member") === "Yes") {
    const memberId = formData.get("member_id");
    if (!memberId) {
      alert("Debe ingresar un ID de miembro válido.");
      return;
    }
  } else {
    formData.set("member_id", "NULL"); // 🔥 usamos NULL
  }

  let action = formData.get("client_id") ? "update" : "add";
  formData.append("action", action);

  let res = await fetch("clients.php", {
    method: "POST",
    body: formData
  });

  alert(await res.text());
  closeModal();
  loadClients();
});

async function editClient(id) {
  let res = await fetch("clients.php?action=get&id=" + id);
  let client = await res.json();
  openModal(client);
}

async function deleteClient(id) {
  if (!confirm("¿Eliminar cliente?")) return;
  let formData = new FormData();
  formData.append("client_id", id);
  formData.append("action", "delete");
  let res = await fetch("clients.php", {
    method: "POST",
    body: formData
  });
  alert(await res.text());
  loadClients();
}

loadClients();
</script>
