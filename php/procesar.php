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
    //-- Editar una categoría --
    //
    // ** Pase de ID **
    if ($_POST['procesar'] == 'categ-editar') {
        $id_categ = $_POST['id-categ'];
        
        $categoria = "SELECT * FROM categoria WHERE CategoriaID = '".$id_categ."' ";
        $resultado = $mysqli->query($categoria);
        $categ = $resultado->fetch_row();

        session_name('categ-editar');
        session_start();
        session_unset();
        

        $_SESSION['categ_id'] = $categ[0];
        $_SESSION['categ_nombre'] = $categ[1];
        $_SESSION['categ_desc'] = $categ[2];

        $mysqli->close();
        echo '<meta http-equiv="refresh" content="0; url=../categoria_editar.php">';
    };
    // ** Cambio de datos **
    if ($_POST['procesar'] == 'categ-editar-2') {
        $categ_id = $_POST['categ-id'];
        $categ_nombre = $_POST['categ-nombre'];
        $categ_desc = $_POST['categ-desc'];

        $categoria = sprintf("UPDATE categoria SET CategoriaNombre = '%s', CategoriaDesc = '%s' WHERE CategoriaID = '%s'", $categ_nombre, $categ_desc, $categ_id);
        $editar = $mysqli->query($categoria);

        $mysqli->close();
        echo '<meta http-equiv="refresh" content="0; url=../categoria_listado.php">';
    };

    //
    //-- Borrar una categoría --
    //
    if ($_POST['procesar'] == 'categ-borrar') {
        $id_categ = $_POST['id-categ'];

        $categoria = "DELETE FROM categoria WHERE CategoriaID = '".$id_categ."'";
        $borrar = $mysqli->query($categoria);

        $mysqli->close();
        echo '<meta http-equiv="refresh" content="0; url=../categoria_listado.php">';
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
        echo '<meta http-equiv="refresh" content="0; url=../producto_listado.php">';
    };
    //
    //-- Borrar nuevo producto --
    //
    if ($_POST['procesar'] == 'prod-borrar') {
        $id_producto = $_POST['id-producto'];

        $producto = "DELETE FROM producto WHERE ProductoID = '".$id_producto."'";
        $borrar = $mysqli->query($producto);

        $mysqli->close();
        echo '<meta http-equiv="refresh" content="0; url=../producto_listado.php">';
    };
    //
    //-- Editar un producto --
    //
    // ** Pase de ID **
    if ($_POST['procesar'] == 'prod-editar') {
        $id_producto = $_POST['id-producto'];
        
        $productos = "SELECT * FROM producto WHERE ProductoID = '".$id_producto."' ";
        $resultado = $mysqli->query($productos);
        $prod = $resultado->fetch_row();

        session_name('prod-editar');
        session_start();
        session_unset();
        
        $_SESSION['prod_id'] = $prod[0];
        $_SESSION['prod_nombre'] = $prod[1];
        $_SESSION['prod_desc'] = $prod[2];
        $_SESSION['prod_precio'] = $prod[3];
        $_SESSION['prod_imagen'] = $prod[4];
        $_SESSION['prod_categ'] = $prod[5];

        $mysqli->close();
        echo '<meta http-equiv="refresh" content="0; url=../producto_editar.php">';
    };
    // ** Cambio de datos **
    if ($_POST['procesar'] == 'prod-editar-2') {
        $prod_id = $_POST['prod-id'];
        $prod_nombre = $_POST['prod-nombre'];
        $prod_desc = $_POST['prod-desc'];
        $prod_precio = $_POST['prod-precio'];
        $prod_imagen = $_POST['prod-imagen'];
        $prod_categ = $_POST['prod-categ'];

        $producto = "UPDATE producto SET ProductoNombre = '".$prod_nombre."',ProductoDesc = '".$prod_desc."',ProductoPrecio = '".$prod_precio."',ProductoImagen = '".$prod_imagen."',ProductoCategoria = '".$prod_categ."' WHERE ProductoID = '".$prod_id."' ";
        $editar = $mysqli->query($producto);

        $mysqli->close();
        echo '<meta http-equiv="refresh" content="0; url=../producto_listado.php">';
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
        echo '<meta http-equiv="refresh" content="0; url=../empresa_listado.php">';
    };
    //
    //-- Borrar una empresa --
    //
    if ($_POST['procesar'] == 'empresa-borrar') {
        $id_empresa = $_POST['id-empresa'];

        $empresa = "DELETE FROM empresa WHERE EmpresaID = '".$id_empresa."'";
        $borrar = $mysqli->query($empresa);

        $mysqli->close();
        echo '<meta http-equiv="refresh" content="0; url=../empresa_listado.php">';
    };
    //
    //-- Editar una empresa --
    //
    // ** Pase de ID **
    if ($_POST['procesar'] == 'empresa-editar') {
        $id_empresa = $_POST['id-empresa'];
        
        $empresas = "SELECT * FROM empresa WHERE EmpresaID = '".$id_empresa."' ";
        $resultado = $mysqli->query($empresas);
        $empresa = $resultado->fetch_row();

        session_name('empresa-editar');
        session_start();
        session_unset();

        $_SESSION['empresa_id'] = $empresa[0];
        $_SESSION['empresa_ruc'] = $empresa[1];
        $_SESSION['empresa_nombre'] = $empresa[2];
        $_SESSION['empresa_correo'] = $empresa[3];
        $_SESSION['empresa_direccion'] = $empresa[4];
        $_SESSION['empresa_telefono'] = $empresa[5];

        $mysqli->close();
        echo '<meta http-equiv="refresh" content="0; url=../empresa_editar.php">';
    };
    // ** Cambio de datos **
    if ($_POST['procesar'] == 'empresa-editar-2') {
        $empresa_id = $_POST['empresa-id'];
        $empresa_ruc = $_POST['empresa-ruc'];
        $empresa_nombre = $_POST['empresa-nombre'];
        $empresa_correo = $_POST['empresa-correo'];
        $empresa_direccion = $_POST['empresa-direccion'];
        $empresa_telefono = $_POST['empresa-telefono'];

        $empresa = "UPDATE empresa SET EmpresaRUC = '".$empresa_ruc."',EmpresaRazSoc = '".$empresa_nombre."',EmpresaCorreo = '".$empresa_correo."',EmpresaDireccion = '".$empresa_direccion."',EmpresaTelefono = '".$empresa_telefono."' WHERE EmpresaID = '".$empresa_id."' ";
        $editar = $mysqli->query($empresa);

        $mysqli->close();
        echo '<meta http-equiv="refresh" content="0; url=../empresa_listado.php">';
    };

}

?>