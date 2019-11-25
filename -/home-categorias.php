<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recicla.PE</title>
    <link href="https://fonts.googleapis.com/css?family=Sarabun:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos-internos.css">
</head>
<body>
<?php 
    require 'config.php';
    $consulta_categorias = "SELECT id,nombre,descripcion FROM categorias ORDER BY nombre";
    $consulta_items = "SELECT i.id, i.nombre, i.descripcion, i.icono, c.id, i.precio 
        FROM item AS i
        INNER JOIN categorias AS c ON i.categoria = c.id
        ORDER BY nombre";   
    ?>
    <header>
        <div class="container">
            <div class="logo">
                <a href="#"><img src="img/logo.png" alt="Logo"></a>
            </div>
            <div class="opciones">
                <nav>
                    <ul>|
                        <li><a class="btn secondary" href="#">recoger (1.3 T)</a></li>
                        <li><a class="btn primary" href="login.html">salir</a></li>
                    </ul>   
                </nav>
            </div>
        </div>
    </header>
    <section class="menu-lateral">
        <div class="container">
            <div class="empresa">
                <a href="home-cuenta.html">
                    <div class="contenido-empresa">
                        <div class="logo-empresa">
                            <img src="img/Ellipse.png" alt="Logo de empresa">
                        </div>
                        <div class="datos-min-empresa">
                            <h4>Pacheco Hnos</h4>
                            <h5>RUC</h5>
                            <h5>20406080252</h5>
                        </div>
                    </div>
                </a>   
            </div>
            <div class="secciones">
                <div class="principales">
                    <nav>
                        <ul>
                            <li>
                                <a href="#">
                                    <div class="icono">
                                        <img src="img/danger.png" alt="Icono de seccion">
                                    </div>
                                    Resumen
                                </a>
                            </li>
                            <li class="active">
                                <a href="#">
                                    <div class="icono">
                                        <img src="img/danger-active.png" alt="Icono de seccion">
                                    </div>
                                    Categorías
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="icono">
                                        <img src="img/danger.png" alt="Icono de seccion">
                                    </div>
                                    Pedidos
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="secundarias">
                    <nav>
                        <ul>
                            <li>
                                <a href="#">
                                    <div class="icono">
                                        <img src="img/danger.png" alt="Icono de seccion">
                                    </div>
                                    Configuración
                                </a>
                            </li>
                            <li class="ayuda">
                                <a href="#">
                                    <div class="icono">
                                        <img src="img/danger.png" alt="Icono de seccion">
                                    </div>
                                    Ayuda
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="contenido-seccion">
        <div class="container">
            <h1 class="nombre-seccion">Categorías</h1>

            <!-- div class="categorias">
                <h2>Plásticos</h2>
                <a href="#" class="btn secondary">más items</a>
                <div class="contenedor-items">
                    <div class="category-item">
                        <div class="img-category-item">
                            <img src="img/category-item.png" alt="Imagen de sub-categoría">
                        </div>
                        <h3>Category Item</h3>
                    </div>
                </div>
            </div -->

            <?php 
            if ( $resultado_categorias = $mysqli->query($consulta_categorias) ) {
                while ( $categoria = $resultado_categorias->fetch_row() ) {
                    echo '<div class="categorias">
                            <h2>'.$categoria[1].'</h2>
                            <a href="#" class="btn secondary">Más items</a>
                            <div class="contenedor-items">';

                            if ( $resultado_items = $mysqli->query($consulta_items)) {
                                while ( $item = $resultado_items->fetch_row() /*&& $item[4] == $categoria[0]*/) {
                                    if ( $item[4] == $categoria[0] ) {
                                        echo '<div class="category-item">
                                            <div class="img-category-item">
                                                <img src="img/category-item.png" alt="Imagen de sub-categoría">
                                            </div>
                                            <h3>'.$item[1].'</h3>
                                          </div>';
                                    } 
                                }
                            };
                                
                            echo '</div>
                        </div>';
                }
            }
            ?>
        </div>
    </section>
</body>
</html>