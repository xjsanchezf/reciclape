<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicia sesión | Recicla.PE</title>
    <link rel="icon" href="img/favicon.ico">

    <!-- CSS FlexBox-->
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
        session_name('login');
        session_start();

        $login_id = $_SESSION['login_id'];
        $login_correo = $_SESSION['login_correo'];
        $login_password = $_SESSION['login_password'];
        $login_nombres = $_SESSION['login_nombres'];
        $login_apellidos = $_SESSION['login_apellidos'];
        $login_direccion = $_SESSION['login_direccion'];
        $login_telefono = $_SESSION['login_telefono'];
    ?>
    
    <main class="wrapper">
        <div class="row">
            <div class="col">
                <div class="heading">
                    <p class="text-title">Hola, <?php echo $login_nombres?></p>
                    <p class="text-subtitle">Este es tu perfil en Recicla.PE</p>
                </div>
            
                <form action="php/procesar_usuario.php" method="POST" class="form">
                    <label for="usuario-nombres">Nombres</label>
                    <input type="text" name="usuario-nombres" value="<?php echo $login_nombres?>" required>

                    <label for="usuario-apellidos">Apellidos</label>
                    <input type="text" name="usuario-apellidos" value="<?php echo $login_apellidos?>" required>

                    <label for="usuario-correo">Correo electrónico</label>
                    <input type="email" name="usuario-correo" value="<?php echo $login_correo?>" required>

                    <label for="usuario-password">Contraseña</label>
                    <input type="password" name="usuario-password" value="<?php echo $login_password?>" required>
                    
                    <label for="usuario-telefono">Teléfono</label>
                    <input type="number" name="usuario-telefono" value="<?php echo $login_telefono?>" required>

                    <label for="usuario-direccion">Dirección</label>
                    <input type="text" name="usuario-direccion" value="<?php echo $login_direccion?>" required>

                    <input type="hidden" name="usuario-id" value="<?php echo $login_id?>">
                    <input type="hidden" name="procesar-usuario" value="perfil-editar">
            
                    <input type="submit" class="button btn-bg" value="Guardar cambios">
                </form>
            </div>

            <div class="col">
                <div class="img img-perfil"></div>
            </div>
        </div>
    </main>
</body>
</html>