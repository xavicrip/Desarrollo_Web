<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $lugar = $_POST['lugar'];
    $imagen_url = $_POST['imagen_url'];

    $sql = "INSERT INTO eventos (titulo, descripcion, fecha, lugar, imagen_url) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssss", $titulo, $descripcion, $fecha, $lugar, $imagen_url);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit();
}
?>