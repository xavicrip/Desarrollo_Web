<?php
include 'db.php';

$sql = "SELECT * FROM eventos ORDER BY fecha ASC";
$result = $mysqli->query($sql);

while ($evento = $result->fetch_assoc()) {
    echo "<div class='event'>";
    echo "<h2>" . htmlspecialchars($evento['titulo']) . "</h2>";
    echo "<p><strong>Fecha:</strong> " . htmlspecialchars($evento['fecha']) . "</p>";
    echo "<p><strong>Lugar:</strong> " . htmlspecialchars($evento['lugar']) . "</p>";
    echo "<p>" . htmlspecialchars($evento['descripcion']) . "</p>";
    if (!empty($evento['imagen_url'])) {
        echo "<img src='" . htmlspecialchars($evento['imagen_url']) . "' alt='Imagen del evento' style='width:100%;height:auto;'>";
    }
    echo "<a href='editar_evento.php?id=" . $evento['id'] . "'>Editar</a> | ";
    echo "<a href='eliminar_evento.php?id=" . $evento['id'] . "' onclick='return confirm(\"¿Estás seguro de eliminar este evento?\")'>Eliminar</a>";
    echo "</div>";
}

$result->free();
$mysqli->close();
?>