<?php
include 'includes/conn.php';

$action = $_GET['action'] ?? $_POST['action'] ?? '';

if ($action == "list") {
    $stmt = $conn->query("SELECT * FROM cliente ORDER BY id_cliente DESC");
    echo json_encode($stmt->fetchAll());
}

if ($action == "get" && isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM cliente WHERE id_cliente = ?");
    $stmt->execute([$_GET['id']]);
    echo json_encode($stmt->fetch());
}

if ($action == "add") {
    $stmt = $conn->prepare("INSERT INTO cliente (nombre_completo, telefono, socio) VALUES (?, ?, ?)");
    if ($stmt->execute([$_POST['nombre'], $_POST['telefono'], $_POST['socio']])) {
        echo "✅ Cliente agregado";
    } else {
        echo "❌ Error al agregar";
    }
}

if ($action == "update") {
    $stmt = $conn->prepare("UPDATE cliente SET nombre_completo = ?, telefono = ?, socio = ? WHERE id_cliente = ?");
    if ($stmt->execute([$_POST['nombre'], $_POST['telefono'], $_POST['socio'], $_POST['id']])) {
        echo "✅ Cliente actualizado";
    } else {
        echo "❌ Error al actualizar";
    }
}

if ($action == "delete") {
    $stmt = $conn->prepare("DELETE FROM cliente WHERE id_cliente = ?");
    if ($stmt->execute([$_POST['id']])) {
        echo "✅ Cliente eliminado";
    } else {
        echo "❌ Error al eliminar";
    }
}
