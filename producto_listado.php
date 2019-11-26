<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos | Módulo Admin Recicla.PE</title>
    <link rel="icon" href="img/favicon.ico">

    <!-- CSS Foundation -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap_fluid.css">

    <!-- Metadata Regular -->
    <meta name="title" content="Recicla.PE">
    <meta name="description" content="Deshazte de lo que ya no necesites, ayuda al planeta haciéndolo.">
    <meta name="keywords" content="recicla, reciclaje, delivery, domicilio, recicladora, app">
    <meta name="author" content="Luís Huamaní, Giorgio Emé, Xiomara Sánchez">
    <meta name="copyright" content="© 2019 ReciclaPE. Todos los derechos reservados.">
    <!-- Metadata Facebook -->
    <meta property="og:title" content="Recicla.PE">
    <meta property="og:type" content="website">
    <meta property="og:image" content="img/metadata_facebook.jpg">
    <meta property="og:url" content="http://www.recicla.pe">
    <meta property="og:description" content="Deshazte de lo que ya no necesites, ayuda al planeta haciéndolo.">
    <meta property="og:site_name" content="Recicla.PE">
    <!-- Metadata Twitter -->
    <meta property="twitter:card" content="summary">
    <meta property="twitter:url" content="http://www.recicla.pe">
    <meta property="twitter:title" content="Recicla.PE">
    <meta property="twitter:description" content="Deshazte de lo que ya no necesites, ayuda al planeta haciéndolo.">
    <meta property="twitter:image" content="img/metadata_twitter.jpg">
</head>
<body>

<main class="container-fluid">
    <div class="row-fluid">
        <p class="text-title">Productos</p>
        <p class="text-subtitle">Crea, edita o elimina productos para reciclar dentro de Recicla.PE</p>
    </div>
    <div class="row">
        <a href="producto_crear.php" class="button" title="Crear nuevo producto">Crear nuevo producto</a>
    </div> 
    <div class="row">
        <div class="table">
            <table class="table table-hover">
                <thead> 
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Categoría</span></th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio (por kilo)</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'php/config.php';

                    $categorias = "SELECT CategoriaID,CategoriaNombre FROM categoria";
                    $productos = "SELECT p.ProductoID,p.ProductoNombre,c.CategoriaID,p.ProductoDesc,p.ProductoPrecio FROM producto AS p
                                INNER JOIN categoria AS c ON p.ProductoCategoria = c.CategoriaID";

                    if ($resultado_productos = $mysqli->query($productos)) {
                        while ($prod = $resultado_productos->fetch_row()) {
                            echo '<tr>
                                    <td scope="row">'.$prod[0].'</td>
                                    <td>'.$prod[1].'</td>';
                            
                            if ($resultado_categorias = $mysqli->query($categorias)) {
                                while ($categ = $resultado_categorias->fetch_row()) {
                                    if ($categ[0] == $prod[2]) {
                                        echo '<td>'.$categ[1].'</td>';
                                    };
                                };
                            };

                            echo '<td>'.$prod[3].'</td>
                                <td>'.$prod[4].'</td>
                                    <th class="acciones">
                                        <form action="php/procesar.php" method="POST">
                                            <input type="submit" name="editar-producto" class="button btn-accion" value="Editar">
                                            <input type="hidden" name="procesar" value="editar-producto">
                                            <input type="hidden" name="id-producto" value="'.$prod[0].'">
                                        </form>
                                        <form action="php/procesar.php" method="POST">
                                            <input type="submit" name="borrar-producto" class="button btn-danger btn-accion" value="Eliminar">
                                            <input type="hidden" name="procesar" value="borrar-producto">
                                            <input type="hidden" name="id-producto" value="'.$prod[0].'">
                                        </form>
                                    </th>
                                </tr>';
                        };
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
    
</body>
</html>