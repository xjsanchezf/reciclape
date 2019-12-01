<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear nuevo producto | Módulo Admin Recicla.PE</title>
    <link rel="icon" href="img/favicon.ico">

    <!-- CSS -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/freeform.css">

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

    <main class="wrapper">
        <div class="row">
            <div class="col">
                <div class="heading">
                    <p class="text-title">Crear un producto</p>
                    <p class="text-subtitle">Agrega un nuevo producto para reciclar en Recicla.PE</p>
                </div>
                
                <form action="php/procesar.php" method="POST" class="form">
                    <label for="prod-nombre">Nombre del producto</label>
                    <input type="text" name="prod-nombre" required>

                    <label for="prod-categ">Categoría</label>
                    <select name="prod-categ">
                        <option value="0">Selecciona una categoria...</option>
                        <?php
                        require 'php/config.php';
                        $categorias = "SELECT CategoriaID,CategoriaNombre FROM categoria";
                        if ($resultado = $mysqli->query($categorias)) {
                            while ($categ = $resultado->fetch_row()) {
                                echo '<option value="'.$categ[0].'">'.$categ[1].'</option>';
                            };
                        };
                        ?>
                    </select>

                    <label for="prod-imagen">Imagen</label>
                    <input type="file" name="prod-imagen" accept="image/jpg, image/png">

                    <label for="prod-precio">Precio en soles <span>(por kilo)</span></label>
                    <input type="number" name="prod-precio" step="0.01" placeholder="Ej. 19.90" required>
            
                    <label for="prod-desc">Descripción <span>(máx. 60 caracteres)</span></label>
                    <input type="text" name="prod-desc">
            
                    <input type="hidden" name="procesar" value="prod-crear">
            
                    <input type="submit" class="button" value="Crear nuevo producto">
                </form>
            </div>

            <div class="col">
                <div class="img img-producto"></div>
            </div>
        </div>
    </main>

</body>

</html>