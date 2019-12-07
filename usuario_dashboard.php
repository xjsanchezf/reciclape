<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recicla.PE</title>
    <link rel="icon" href="img/favicon.ico">

    <!-- CSS Grid Propio -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/grid_propio.css">

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
    <?php require 'php/config.php'; ?>

    <header>
        <div class="wrapper">
            <div class="row centrado-vertical">
                <div class="col">
                    <a class="icono-menu" href="#"></a>
                </div>
                <div class="col span2">
                    <a class="logo" href="#"></a>
                </div>
                <div class="col span2 offset11">
                    <form action="php/procesar_usuario.php" method="POST">
                        <input type="hidden" name="procesar-usuario" value="logout">
                        <input class="button" type="submit" value="Salir"> 
                    </form>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="wrapper">
            <div class="row info">
                <div class="col span16">
                    <h1 class="text-title">Empieza a reciclar hoy</h1>
                    <h2 class="text-subtitle">Elige los productos que desees reciclar e iremos a recogerlo.</h2>
                </div>
            </div>
            <div class="row filtros">
                <div class="col span3 ">
                    <label class="text-subtitle" for="filtro">Filtrar por</label>
                    <select name="filtro" id="filtro">
                        <option value="null" selected>Todas las categorías</option>

                        <?php
                        $categorias = "SELECT * FROM categoria ORDER BY CategoriaNombre ASC";

                        if ($resultado = $mysqli->query($categorias)) {
                            while ($categ = $resultado->fetch_row()) {
                                if ($categ[0] == $prod_categ) {
                                    echo '<option value="'.$categ[0].'" selected>'.$categ[1].'</option>';
                                } else {
                                    echo '<option value="'.$categ[0].'">'.$categ[1].'</option>';
                                };
                            };
                        };
                        ?>
                    </select>
                    <p class="text-paragraph">Viendo 1 producto</p>
                </div>
            </div>
            <div class="row productos">
                <?php
                    $productos = "SELECT *  FROM producto ORDER BY ProductoNombre ASC";

                    if ($resultado = $mysqli->query($productos)) {
                        while ($prod = $resultado->fetch_row()) {
                            echo '<div class="col span2">
                                    <div class="producto">
                                        <div class="img-producto"></div>
                                        <div>
                                            <h3>'.$prod[1].'</h3>
                                        </div>
                                        <div>
                                            <h4>S/ '.$prod[3].'</h4>
                                        </div>
                                        <div class="peso">
                                            <select name="cantidad" id="cantidad">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                            <label for="cantidad">Kg</label>
                                        </div>
                                        <a href="#" class="button">reciclar</a>
                                    </div>
                                </div>';
                        };
                    };
                ?>
            </div>
        </div>
    </main>
</body>
</html>