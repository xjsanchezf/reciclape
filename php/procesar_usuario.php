<?php

if (isset($_POST['procesar-usuario'])) {
    $procesar = $_POST['procesar-usuario'];

    require 'config.php';

    //
    //-- Iniciar sesión --
    //
    if ($_POST['procesar-usuario'] == 'login-usuario') {
        $login_email = $_POST['login-email'];
        $login_password = $_POST['login-password'];

        $usuario = "SELECT * FROM usuario WHERE UsuarioCorreo = '".$login_email."' AND UsuarioPassword = '".$login_password."'";
        $resultado = $mysqli->query($usuario);
        $login = $resultado->fetch_row();

        session_name('login-usuario');
        session_start();

        session_unset($_SESSION['login_id']);
        session_unset($_SESSION['login_correo']);
        session_unset($_SESSION['login_password']);
        session_unset($_SESSION['login_nombres']);
        session_unset($_SESSION['login_apellidos']);
        session_unset($_SESSION['login_direccion']);
        session_unset($_SESSION['login_telefono']);

        $_SESSION['login_id'] = $login[0];
        $_SESSION['login_correo'] = $login[1];
        $_SESSION['login_password'] = $login[2];
        $_SESSION['login_nombres'] = $login[3];
        $_SESSION['login_apellidos'] = $login[4];
        $_SESSION['login_direccion'] = $login[5];
        $_SESSION['login_telefono'] = $login[6];

        $mysqli->close();
        echo '<meta http-equiv="refresh" content="0; url=../dashboard.php">';
    };

    //
    //-- Cerrar sesión --
    //
    if ($_POST['procesar-usuario'] == 'logout'){
        session_name('login-usuario');
        session_start();

        session_unset($_SESSION['login_id']);
        session_unset($_SESSION['login_correo']);
        session_unset($_SESSION['login_password']);
        session_unset($_SESSION['login_nombres']);
        session_unset($_SESSION['login_apellidos']);
        session_unset($_SESSION['login_direccion']);
        session_unset($_SESSION['login_telefono']);

        $mysqli->close();
        echo '<meta http-equiv="refresh" content="0; url=../login.html">';
    }
}
?>