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
    <!-- PHP -->
    <?php 
    require '../config.php';

    $consulta_categorias = "SELECT id,nombre,descripcion FROM categorias ORDER BY nombre";
    $consulta_items = "SELECT i.id, i.nombre, i.descripcion, i.precio, c.id
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
                    <ul>
                        <li><a class="btn primary" href="login.html">salir</a></li>
                    </ul>   
                </nav>
            </div>
        </div>
    </header>

    <section class="menu-lateral">
        <div class="container">
            <div class="empresa active">
                <a href="#">
                    <div class="contenido-empresa">
                        <div class="logo-empresa">
                            <img src="img/Ellipse2.png" alt="Logo de empresa">
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
                                    Empresas
                                </a>
                            </li>
                            <li class="active">
                                <a href="home-categorias.html">
                                    <div class="icono">
                                        <img src="img/danger-active.png" alt="Icono de seccion">
                                    </div>
                                    Items
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
            <h1 class="nombre-seccion">Listado de Items</h1>
            <div class="listado-items">
                <div class="boton-crear-item">
                    <a href="#" class="btn primary">Nuevo</a>
                </div>

                <div class="filtros-items">
                    <div class="mostrar-entradas">
                        <label for="numero-entradas">Mostrar</label>
                        <select name="numero-entradas" id="numero-entradas">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <p>Entradas</p>
                    </div>

                    <div class="buscador-items">
                        <label for="buscador">Buscar:</label>
                        <input type="text" name="buscador" id="buscador">
                    </div>
                </div>

                <div class="tabla-items">
                    <table>
                        <tr>
                            <th class="cabecera-tabla">#</th>
                            <th class="cabecera-tabla">Nombre</th>
                            <th class="cabecera-tabla">Descripción</th>
                            <th class="cabecera-tabla">Precio</th>
                            <th class="cabecera-tabla">Categoría</th>
                            <th class="cabecera-tabla">Acciones</th>
                        </tr>
                        <tr>
                            <td class="info-item">1</td>
                            <td class="info-item">Nombre</td>
                            <td class="info-item">Descripción</td>
                            <td class="info-item">S/. 0.00</td>
                            <td class="info-item">Categoría</td>
                            <td class="info-item">
                                <a href="#" class="btn primary">Editar</a>
                                <a href="#" class="btn primary">Eliminar</a>
                            </td>
                        </tr>
                        <form action="procesar.php" method="POST">
                            <?php 
                            if ( $resultado_items = $mysqli->query($consulta_items) ) {
                                while ( $item = $resultado_items->fetch_row() ) {
                                    echo '<form action="procesar.php" method="POST"><tr>';
                                    echo '<td class="info-item"><input type="text" name="id-item" value"'.$item[0].'" disabled></td>';
                                    echo '<td class="info-item"><input type="text" name="nombre-item" value="'.$item[1].'" disabled></td>';
                                    echo '<td class="info-item"><input type="text" name="descripcion-item" value="'.$item[2].'" disabled></td>';
                                    echo '<td class="info-item"><input type="text" name="categoria-item" value="'.$item[3].'" disabled></td>';
                                    echo '<td class="info-item"><input type="text" name="precio-item" value="'.$item[4].'" disabled></td>';
                                    echo '<td class="info-item">
                                            <input class="btn primary" type="submit" name="editar-item" value="Editar">
                                            <input class="btn primary" type="submit" name="eliminar-item" value"Eliminar">
                                          </td>';
                                    echo '</tr></form>';
                                };
                            };
                            ?>
                        </form>
                    </table>
                </div>
            </div>  
        </div>
    </section>
</body>
</html>