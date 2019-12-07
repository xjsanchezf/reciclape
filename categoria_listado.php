<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categorías | Módulo Admin Recicla.PE</title>
    <link rel="icon" href="img/favicon.ico">

    <!-- CSS Bootstrap Fluid -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <p class="text-title">Categorías</p>
            <p class="text-subtitle">Crea, edita o elimina categorías en Recicla.PE</p>
        </div>
        <div class="row-fluid">
            <a href="categoria_crear.html" class="button btn-bg" title="Crear nueva categoría">Crear nueva categoría</a>
        </div>
        <div class="row-fluid">
            <table class="table-hover w-100">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Descripción</span></th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'php/config.php';
                    $categorias = "SELECT CategoriaID,CategoriaNombre,CategoriaDesc FROM categoria";
                    if ($resultado = $mysqli->query($categorias)) {
                        while ($categ = $resultado->fetch_row()) {
                            echo '<tr>
                                    <th scope="row">'.$categ[0].'</th>
                                    <th>'.$categ[1].'</th>
                                    <th>'.$categ[2].'</th>
                                    <th class="acciones">
                                        <form action="php/procesar.php" method="POST">
                                            <button type="submit" value="procesar" class="button btn-accion">Editar <i class="fa fa-pencil" aria-hidden="true"></i></button>
                                            <input type="hidden" name="procesar" value="categ-editar">
                                            <input type="hidden" name="id-categ" value="'.$categ[0].'">
                                        </form>
                                        <form action="php/procesar.php" method="POST">
                                            <button type="submit" value="procesar" class="button btn-danger btn-accion">Eliminar <i class="fa fa-trash" aria-hidden="true"></i></button>
                                            <input type="hidden" name="procesar" value="categ-borrar">
                                            <input type="hidden" name="id-categ" value="'.$categ[0].'">
                                        </form>
                                    </th>
                                </tr>';
                        };
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    
</body>
</html>