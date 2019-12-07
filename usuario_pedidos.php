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
    <link rel="stylesheet" href="css/fluido.css">

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
    ?>
    <main>
        <div clasS="row-fluid">
            <div class="col">
                <div class="heading">
                    <p class="text-title">Tus pedidos</p>
                    <p class="text-subtitle">Aquí podrás ver tu historial de pedidos.</p>
                </div>
                
                <div class="pedidos">
                    <?php
                        require 'php/config.php';

                        $detalles = sprintf("SELECT * FROM detallepedido");
                        $detalle_listado = $mysqli->query($detalles);
                        $detalle = $detalle_listado->fetch_row();

                        $pedidos = sprintf("SELECT * FROM pedido WHERE PedidoUsuario = '%x'", $login_id);
                        
                        if ($pedido_listado = $mysqli->query($pedidos)) {
                            while ($pedido = $pedido_listado->fetch_row()) {
                                echo '
                                <div class="pedido">
                                    <div class="pedido-heading">
                                        <p>'.$pedido[2].'</p>
                                        <p>Ganaste: S/ 19.90</p>
                                    </div>
                                    <div class="pedido-body">
                                        <p>1 producto reciclado</p>
                                    </div>
                                </div>
                                ';
                            };
                        }
                    ?>
                </div>
            </div>
            <div class="col">
                <div class="img img-pedido"></div>
            </div>
        </div>
    </main>
</body>
</html>