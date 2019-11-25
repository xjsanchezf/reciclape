<?php

if (isset($_POST['procesar'])) {
    $procesar = $_POST['procesar'];

    require 'config.php';

    //
    //-- Crear nueva categoría --
    //
    if ($_POST['procesar'] == 'categ-crear') {
        $categ_nombre = $_POST['categ-nombre'];
        $categ_desc = $_POST['categ-desc'];

        $categoria = sprintf("INSERT INTO categoria (CategoriaNombre,CategoriaDesc) VALUES ('%s','%s')", $categ_nombre, $categ_desc);
        $insertar = $mysqli->query($categoria);

        $mysqli->close();
        echo '<meta http-equiv="refresh" content="0; url=../categoria_crear.html">';
    };

    //
    //-- Crear nuevo producto --
    //
    if ($_POST['procesar'] == 'prod-crear') {
        $prod_nombre = $_POST['prod-nombre'];
        $prod_categ = $_POST['prod-categ'];
        $prod_imagen = $_POST['prod-imagen'];
        $prod_precio = $_POST['prod-precio'];
        $prod_desc = $_POST['prod-desc'];

        $producto = "INSERT INTO producto (ProductoNombre,ProductoCategoria,ProductoImagen,ProductoPrecio,ProductoDesc) VALUES ('".$prod_nombre."','".$prod_categ."','".$prod_imagen."','".$prod_precio."','".$prod_desc."')";
        $insertar = $mysqli->query($producto);

        $mysqli->close();
        echo '<meta http-equiv="refresh" content="0; url=../producto_crear.php">';
    };

    //
    //-- Añadir nueva empresa --
    //
    if ($_POST['procesar'] == 'empresa-crear') {
        $empresa_ruc = $_POST['empresa-ruc'];
        $empresa_nombre = $_POST['empresa-nombre'];
        $empresa_direccion = $_POST['empresa-direccion'];
        $empresa_telefono = $_POST['empresa-telefono'];
        $empresa_correo = $_POST['empresa-correo'];

        $empresa = sprintf("INSERT INTO empresa (EmpresaRUC,EmpresaRazSoc,EmpresaDireccion,EmpresaTelefono,EmpresaCorreo) VALUES ('%s','%s','%s','%s','%s')", $empresa_ruc, $empresa_nombre, $empresa_direccion, $empresa_telefono, $empresa_correo);
        $insertar = $mysqli->query($empresa);

        $mysqli->close();
        echo '<meta http-equiv="refresh" content="0; url=../empresa_crear.html">';
    };

}

?>