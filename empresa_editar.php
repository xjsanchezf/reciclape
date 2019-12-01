<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar empresa | Módulo Admin Recicla.PE</title>
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
    <?php
    require 'php/config.php';

    // Trayendo el ID desde listado (con php/procesar.php)
    session_name('empresa-editar');
    session_start();

    $empresa_id = $_SESSION['empresa_id'];
    $empresa_ruc = $_SESSION['empresa_ruc'];
    $empresa_nombre = $_SESSION['empresa_nombre'];
    $empresa_correo = $_SESSION['empresa_correo'];
    $empresa_direccion = $_SESSION['empresa_direccion'];
    $empresa_telefono = $_SESSION['empresa_telefono'];
    ?>

    <main class="wrapper">
        <div class="row">
            <div class="col">
                <div class="heading">
                    <p class="text-title">Editar empresa</p>
                    <p class="text-subtitle">Edita una empresa aliada de Recicla.PE</p>
                </div>
            
                <form action="php/procesar.php" method="POST" class="form">
                    <label for="empresa-nombre">Número RUC</label>
                    <input type="number" name="empresa-ruc" value="<?php echo $empresa_ruc?>" required>

                    <label for="empresa-nombre">Nombre de la empresa</label>
                    <input type="text" name="empresa-nombre" value="<?php echo $empresa_nombre?>" required>

                    <label for="empresa-correo">Correo electrónico</label>
                    <input type="email" name="empresa-correo" value="<?php echo $empresa_correo?>" required>

                    <label for="empresa-direccion">Dirección</label>
                    <input type="text" name="empresa-direccion" value="<?php echo $empresa_direccion?>" required>

                    <label for="empresa-telefono">Teléfono</label>
                    <input type="number" name="empresa-telefono" value="<?php echo $empresa_telefono?>" required>

                    <input type="hidden" name="empresa-id" value="<?php echo $empresa_id?>">
                    <input type="hidden" name="procesar" value="empresa-editar-2">
            
                    <input type="submit" class="button" value="Editar empresa">
                </form>
            </div>

            <div class="col">
                <div class="img img-empresa"></div>
            </div>
        </div>
    </main>
    
</body>
</html>