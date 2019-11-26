<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar categoría | Módulo Admin Recicla.PE</title>
    <link rel="icon" href="img/favicon.ico">

    <!-- CSS Foundation -->
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
    <?php
    require 'php/config.php';

    // Trayendo el ID desde listado (con php/procesar.php)
    session_name('categ-editar');
    session_start();

    $categ_id = $_SESSION['categ_id'];
    $categ_nombre = $_SESSION['categ_nombre'];
    $categ_desc = $_SESSION['categ_desc'];
    ?>

    <main class="wrapper">
        <div class="row">
            <div class="col">
                <div class="heading">
                    <p class="text-title">Editar categoría</p>
                    <p class="text-subtitle">Edita una categoría existente de Recicla.PE</p>
                </div>
            
                <form action="php/procesar.php" method="POST" class="form">
                    <label for="categ-nombre">Nombre de la categoría</label>
                    <input type="text" name="categ-nombre" value="<?php echo $categ_nombre?>" required>
            
                    <label for="categ-desc">Descripción <span>(máx. 100 caracteres)</span></label>
                    <input type="text" name="categ-desc" value="<?php echo $categ_desc?>">

                    <input type="hidden" name="categ-id" value="<?php echo $categ_id?>">
                    <input type="hidden" name="procesar" value="categ-editar-2">
            
                    <input type="submit" class="button" value="Editar categoría">
                </form>
            </div>

            <div class="col">
                <div class="img img-categoria"></div>
            </div>
        </div>
    </main>
    
</body>
</html>