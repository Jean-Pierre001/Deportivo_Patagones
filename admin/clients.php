<?php
include 'includes/conn.php';

$action = $_GET['action'] ?? $_POST['action'] ?? '';

if ($action == "list") {
    $stmt = $conn->query("SELECT * FROM clients ORDER BY client_id DESC");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    exit;
}

if ($action == "get" && isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM clients WHERE client_id = ?");
    $stmt->execute([$_GET['id']]);
    echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
    exit;
}

if ($action == "add") {
    $member_id = $_POST['member_id'] === "NULL" ? null : $_POST['member_id'];
    $stmt = $conn->prepare("INSERT INTO clients (full_name, phone, member_id) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['full_name'], $_POST['phone'], $member_id]);
    echo "✅ Cliente agregado";
}

if ($action == "update") {
    $member_id = $_POST['member_id'] === "NULL" ? null : $_POST['member_id'];
    $stmt = $conn->prepare("UPDATE clients SET full_name=?, phone=?, member_id=? WHERE client_id=?");
    $stmt->execute([$_POST['full_name'], $_POST['phone'], $member_id, $_POST['client_id']]);
    echo "✅ Cliente actualizado";
}


if ($action == "delete") {
    $stmt = $conn->prepare("DELETE FROM clients WHERE client_id = ?");
    $ok = $stmt->execute([$_POST['client_id']]);
    echo $ok ? "✅ Cliente eliminado" : "❌ Error al eliminar";
    exit;
}
