<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php   
    require '../config.php';
    $consulta_categorias = "SELECT id,nombre FROM categorias ORDER BY nombre";
    ?>
    <!-- Crear nueva categoría -->
    <hr>
    <form id="crear-categoria" action="procesar.php" method="POST">
        <label for="nombre-categoria">Nombre:</label>
        <input type="text" name="nombre-categoria" required><br>

        <label for="descripcion-categoria">Descripción:</label>
        <input type="text" name="descripcion-categoria"><br>

        <input type="hidden" name="manop" value="1">
        <input type="submit" name="crear-categoria" value="Crear nueva categoría">
    </form>

    <!-- Crear nuevo item -->
    <hr>
    <form id="crear-item" action="procesar.php" method="POST">
        <label for="nombre-item">Nombre:</label>
        <input type="text" name="nombre-item" placeholder="Nombre del item" required><br>

        <label for="descripcion-item">Descripción: <small>Opcional</small></label>
        <input type="text" name="descripcion-item" placeholder="Descripción del item"><br>

        <label for="precio-item">Precio:</label>
        <input type="number" step="0.01" name="precio-item" placeholder="Ej. 10.30" required><br>

        <label for="icono-item">Ícono:</label>
        <input type="file" name="icono-item" placeholder="Nombre del item" accept="image/*"><br>

        <label for="categoria-item">Categoría:</label>
        <select name="categoria-item">
            <option value="">Seleccionar</option>
            <?php 
            if ( $resultado_categorias = $mysqli->query($consulta_categorias) ) {
                while ( $categoria = $resultado_categorias->fetch_row() ) {
                    echo '<option value="'.$categoria[0].'">'.$categoria[1].'</option>';
                };
                $resultado_categorias->close();
            };
            ?>
        </select><br>

        <input type="hidden" name="manop" value="2">
        <input type="submit" name="crear-item" value="Crear nuevo item">
    </form>
    
</body>
</html>