<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos Culturales</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Eventos Culturales</h1>

    <div class="event-form">
        <form action="crear_evento.php" method="POST">
            <input type="text" name="titulo" placeholder="Título del evento" required>
            <textarea name="descripcion" placeholder="Descripción del evento"></textarea>
            <input type="date" name="fecha" required>
            <input type="text" name="lugar" placeholder="Lugar">
            <input type="url" name="imagen_url" placeholder="URL de imagen">
            <button type="submit">Agregar Evento</button>
        </form>
    </div>

    <div class="event-list">
        <?php include 'listar_eventos.php'; ?>
    </div>
</body>
</html>