<?php 
require '../config.php';

// Creando nueva categoría
if ( $_POST['manop'] == 1 ) {
    $nombre_categoria = $_POST['nombre-categoria'];
    $descripcion_categoria = $_POST['descripcion-categoria'];

    $insertar_categoria = "INSERT INTO categorias (nombre, descripcion) VALUES ('".$nombre_categoria."', '".$descripcion_categoria."');";
    $resultado_categoria = $mysqli->query($insertar_categoria);

    echo '<meta http-equiv="refresh" content="0; url=crear_elementos.php">';
};

// Creando nuevo item
if ( $_POST['manop'] == 2 ) {
    $nombre_item = $_POST['nombre-item'];
    $descripcion_item = $_POST['descripcion-item'];
    $precio_item = $_POST['precio-item'];
    $icono_item = $_POST['icono-item'];
    $categoria_item = $_POST['categoria-item'];

    $insertar_item = "INSERT INTO item (nombre, descripcion, precio, icono, categoria) VALUES ('".$nombre_item."', '".$descripcion_item."', '".$precio_item."', '".$icono_item."', '".$categoria_item."');";
    $resultado_item = $mysqli->query($insertar_item);

    echo '<meta http-equiv="refresh" content="0; url=crear_elementos.php">';
};
?>

