<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM eventos WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $evento = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $lugar = $_POST['lugar'];
    $imagen_url = $_POST['imagen_url'];

    $sql = "UPDATE eventos SET titulo = ?, descripcion = ?, fecha = ?, lugar = ?, imagen_url = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssssi", $titulo, $descripcion, $fecha, $lugar, $imagen_url, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Evento</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Editar Evento</h2>
    <form action="editar_evento.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $evento['id']; ?>">
        <input type="text" name="titulo" value="<?php echo htmlspecialchars($evento['titulo']); ?>" required>
        <textarea name="descripcion"><?php echo htmlspecialchars($evento['descripcion']); ?></textarea>
        <input type="date" name="fecha" value="<?php echo $evento['fecha']; ?>" required>
        <input type="text" name="lugar" value="<?php echo htmlspecialchars($evento['lugar']); ?>">
        <input type="url" name="imagen_url" value="<?php echo htmlspecialchars($evento['imagen_url']); ?>">
        <button type="submit">Actualizar Evento</button>
    </form>
</body>
</html>