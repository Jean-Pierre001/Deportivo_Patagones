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
      <h1 class="text-2xl font-bold">Client Manager</h1>
      <button onclick="openModal()" class="bg-blue-600 text-white px-4 py-2 rounded">➕ New Client</button>
    </div>

    <!-- Tabla de clientes -->
    <div class="overflow-x-auto">
      <table class="w-full border border-gray-300" id="clientsTable">
        <thead class="bg-gray-100">
          <tr>
            <th class="border px-3 py-2">ID</th>
            <th class="border px-3 py-2">Full Name</th>
            <th class="border px-3 py-2">Phone</th>
            <th class="border px-3 py-2">Member</th>
            <th class="border px-3 py-2">Actions</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>

  </main>
</div>

<!-- Modal -->
<div id="clientModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
  <div class="bg-white p-6 rounded shadow-md w-96">
    <h2 class="text-xl mb-4" id="modalTitle">New Client</h2>
    <form id="clientForm">
      <input type="hidden" name="client_id" id="client_id">

      <label class="block mb-2">Full Name</label>
      <input type="text" name="full_name" id="full_name" class="border w-full p-2 mb-3" required>

      <label class="block mb-2">Phone</label>
      <input type="text" name="phone" id="phone" class="border w-full p-2 mb-3">

      <label class="block mb-2">Member</label>
      <select name="member" id="member" class="border w-full p-2 mb-3">
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select>

      <div class="flex justify-end gap-2">
        <button type="button" onclick="closeModal()" class="bg-gray-400 text-white px-4 py-2 rounded">Cancel</button>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
      </div>
    </form>
  </div>
</div>

<script>
// ----------------- CRUD FRONT -----------------

async function loadClients() {
  let res = await fetch("clients.php?action=list");
  let data = await res.json();
  let tbody = document.querySelector("#clientsTable tbody");
  tbody.innerHTML = "";
  data.forEach(c => {
    tbody.innerHTML += `
      <tr>
        <td class="border px-3 py-2">${c.client_id}</td>
        <td class="border px-3 py-2">${c.full_name}</td>
        <td class="border px-3 py-2">${c.phone}</td>
        <td class="border px-3 py-2">${c.member}</td>
        <td class="border px-3 py-2 flex gap-2">
          <button onclick="editClient(${c.client_id})" class="bg-yellow-500 text-white px-2 py-1 rounded">✏️</button>
          <button onclick="deleteClient(${c.client_id})" class="bg-red-600 text-white px-2 py-1 rounded">🗑️</button>
        </td>
      </tr>`;
  });
}

function openModal(client = null) {
  document.getElementById("clientModal").classList.remove("hidden");
  if (client) {
    document.getElementById("modalTitle").innerText = "Edit Client";
    document.getElementById("client_id").value = client.client_id;
    document.getElementById("full_name").value = client.full_name;
    document.getElementById("phone").value = client.phone;
    document.getElementById("member").value = client.member;
  } else {
    document.getElementById("modalTitle").innerText = "New Client";
    document.getElementById("clientForm").reset();
    document.getElementById("client_id").value = "";
  }
}

function closeModal() {
  document.getElementById("clientModal").classList.add("hidden");
}

async function editClient(id) {
  let res = await fetch("clients.php?action=get&id=" + id);
  let client = await res.json();
  openModal(client);
}

document.getElementById("clientForm").addEventListener("submit", async (e) => {
  e.preventDefault();
  let formData = new FormData(e.target);
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

async function deleteClient(id) {
  if (!confirm("Delete client?")) return;
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
