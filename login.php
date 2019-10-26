<?php

if (isset($_POST['email-log'])) {

    $login_email   = $_POST['email-log'];
    $login_password = $_POST['password-log'];

    require 'config.php';

    /*$select = "SELECT * FROM empresa WHERE correo = ('".$email_log."') AND password = ('".$password_log."')";
    $result = $mysqli->query($select);
    $empresa = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo var_dump($empresa[0]);

    if (extract($empresa[0]) <> '') {
        $id             = $id_empresa;
        $ruc            = $ruc_e;
        $rs           = $razon_social_e;
        $correo       = $correo_e;
        $direccion    = $direccion_e;
        $password     = $password_e;

        echo "$id $ruc ";
    };*/

    $select = "SELECT * FROM usuario";
    $result = $mysqli->query($select);
    $usuario = mysqli_fetch_all($result, MYSQLI_ASSOC);
    for ($i = 0; $i < count($usuario); $i++) {

        extract($usuario[$i]);

        if ($login_email == $correo && $login_password == $password) {
            echo '<meta http-equiv="refresh" content="0; url=home-cuenta.html">';
            exit();
        } else {
            echo '<script>alert("Tu usuario y contraseña no son válidos.");</script>';
            echo '<meta http-equiv="refresh" content="0; url=login.html">';
        };
    };
};

?>