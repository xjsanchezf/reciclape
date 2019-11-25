<?php

if (isset($_POST['ruc-reg'])) {

    $ruc_empresa = $_POST['ruc-reg'];
    $correo_empresa = $_POST['correo-reg'];
    $contrasena_empresa = $_POST['contrasena-reg'];

    require 'config.php';

    // Realizar una consulta SQL
    $sql = "INSERT INTO empresa (ruc_e,correo_e,password_e) VALUES ('".$ruc_empresa."','".$correo_empresa."','".$contrasena_empresa."')";

    $resultado = $mysqli->query($sql);

    $mysqli->close();

    if ($resultado) {
        echo '<meta http-equiv="refresh" content="0; url=home-cuenta.html">';
    };
};

?>