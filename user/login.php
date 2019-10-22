<?php

if (isset($_POST['email-log'])) {

    $email_log    = $_POST['email-log'];
    $password_log = $_POST['password-log'];

    require 'config.php';

    $select = "SELECT * FROM empresa WHERE correo_e = ('".$email_log."') AND password_e = ('".$password_log."')";
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
    };

    /*
    $select = "SELECT * FROM empresa";
    $result = $mysqli->query($select);
    $empresas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    for ($i = 0; $i < count($empresas); $i++) {

        extract($empresas[$i]);

        if ($login_email == $correo_e && $login_password == $password_e) {
            echo '<meta http-equiv="refresh" content="0; url=home-cuenta.php">';
            exit();
        } else {
            echo '<script>alert("Tu usuario y contraseña no son válidos.");</script>';
            echo '<meta http-equiv="refresh" content="0; url=login.html">';
        };
    };
    */
};

?>