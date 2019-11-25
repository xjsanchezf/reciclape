<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empresas recicladoras | Módulo Admin Recicla.PE</title>
    <link rel="icon" href="img/favicon.ico">

    <!-- CSS Foundation -->
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

<main>
    <div class="heading">
        <p class="text-title">Empresas recicladoras</p>
        <p class="text-subtitle">Crea, edita o elimina empresas recicladoras que operan en Recicla.PE</p>

        <a href="empresa_crear.html" class="button" title="Añade una empresa nueva">Añade una empresa nueva</a>
    </div>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>RUC</th>
                    <th>Recicladora</span></th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'php/config.php';
                $empresas = "SELECT EmpresaID,EmpresaRUC,EmpresaRazSoc,EmpresaDireccion FROM empresa";
                if ($resultado = $mysqli->query($empresas)) {
                    while ($empresa = $resultado->fetch_row()) {
                        echo '<tr>
                                <th>'.$empresa[0].'</th>
                                <th>'.$empresa[1].'</th>
                                <th>'.$empresa[2].'</th>
                                <th>'.$empresa[3].'</th>
                                <th class="flex">
                                    <form action="php/procesar.php" method="POST">
                                        <input type="submit" name="editar-empresa" class="button" value="Editar">
                                        <input type="hidden" name="procesar" value="editar-empresa">
                                        <input type="hidden" name="id-empresa" value="'.$empresa[0].'">
                                    </form>
                                    <form action="php/procesar.php" method="POST">
                                        <input type="submit" name="borrar-empresa" class="button btn-danger" value="Eliminar">
                                        <input type="hidden" name="procesar" value="borrar-empresa">
                                        <input type="hidden" name="id-empresa" value="'.$empresa[0].'">
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