<?php
include 'includes/conn.php';

$action = $_GET['action'] ?? $_POST['action'] ?? '';

if ($action == "list") {
    // ✅ Obtiene todos los clientes ordenados del más reciente al más antiguo
    $stmt = $conn->query("SELECT * FROM clients ORDER BY client_id DESC");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

if ($action == "get" && isset($_GET['id'])) {
    // ✅ Obtiene un cliente específico por ID
    $stmt = $conn->prepare("SELECT * FROM clients WHERE client_id = ?");
    $stmt->execute([$_GET['id']]);
    echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
}

if ($action == "add") {
    // ✅ Inserta un nuevo cliente
    $stmt = $conn->prepare("INSERT INTO clients (full_name, phone, member) VALUES (?, ?, ?)");
    if ($stmt->execute([$_POST['full_name'], $_POST['phone'], $_POST['member']])) {
        echo "✅ Client added successfully";
    } else {
        echo "❌ Error adding client";
    }
}

if ($action == "update") {
    // ✅ Actualiza los datos de un cliente existente
    $stmt = $conn->prepare("UPDATE clients SET full_name = ?, phone = ?, member = ? WHERE client_id = ?");
    if ($stmt->execute([$_POST['full_name'], $_POST['phone'], $_POST['member'], $_POST['client_id']])) {
        echo "✅ Client updated successfully";
    } else {
        echo "❌ Error updating client";
    }
}

if ($action == "delete") {
    // ✅ Elimina un cliente por ID
    $stmt = $conn->prepare("DELETE FROM clients WHERE client_id = ?");
    if ($stmt->execute([$_POST['client_id']])) {
        echo "✅ Client deleted successfully";
    } else {
        echo "❌ Error deleting client";
    }
}
?>
