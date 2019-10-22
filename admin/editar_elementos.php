<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar elementos </title>
</head>
<body>
    <?php   
    require '../config.php';
    $consulta_categorias = "SELECT id,nombre,descripcion FROM categorias ORDER BY nombre";
    $consulta_items = "SELECT i.id,nombre,descripcion,icono,categoria,precio FROM item 
        INNER JOIN 
        ORDER BY nombre";
    ?>

    <form id="" action="procesar.php">
        <label for="nombre-item"></label>
        <input type="text" name="nombre-item" value>
    </form>


    <table>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Ícono</th>
            <th>Categoría</th>
            <th>Precio</th>
        </tr>
        <?php 
        if ( $resultado_items = $mysqli->query($consulta_items) ) {
            while ( $item = $resultado_items->fetch_row() ) {
                echo '<tr>';
                echo '<td><input type="text" name="nombre-item" value="'.$item[1].'"></td>';
                echo '<td><input type="text" name="descripcion-item" value="'.$item[2].'"></td>';
                echo '<td><input type="file" accept="image/*" name="icono-item" value="'.$item[3].'"></td>';
                // Select 'Categorías'
                echo '<td><select></select></td>';
                echo '<td><input type="number" step="0.01" name="precio-item" value="'.$item[5].'"></td>';
                echo '</tr>';
            }
        }
        ?>
    </table>


    
</body>
</html>