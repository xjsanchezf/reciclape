<?php

if (isset($_POST['procesar-usuario'])) {
    $procesar = $_POST['procesar-usuario'];

    require 'config.php';

    //
    //-- Iniciar sesión --
    //
    if ($procesar == 'login') {
        $login_email = $_POST['login-email'];
        $login_password = $_POST['login-password'];

        $usuario = sprintf("SELECT * FROM usuario WHERE UsuarioCorreo = '%s'", $login_email);
        $resultado = $mysqli->query($usuario);
        $login = $resultado->fetch_row();

        // Verifica que el correo sea válido
        if ($login <> '') {
            // Verifica que la contraseña sea válida
            if ($login[2] == $login_password) {
                session_name('login');
                session_start();
                session_unset();

                $_SESSION['login_id'] = $login[0];
                $_SESSION['login_correo'] = $login[1];
                $_SESSION['login_password'] = $login[2];
                $_SESSION['login_nombres'] = $login[3];
                $_SESSION['login_apellidos'] = $login[4];
                $_SESSION['login_direccion'] = $login[5];
                $_SESSION['login_telefono'] = $login[6];

                $mysqli->close();
                echo '<meta http-equiv="refresh" content="0; url=../usuario_pedidos.php">';

                exit();
            } else {
                echo '<script>alert("Contraseña inválida.");</script>';
                echo '<meta http-equiv="refresh" content="0; url=../usuario_login.html">';

                exit();
            }
        } else {
            echo '<script>alert("Correo inválido.");</script>';
            echo '<meta http-equiv="refresh" content="0; url=../usuario_login.html">';

            exit();
        };
    };

    //
    //-- Cerrar sesión --
    //
    if ($procesar == 'logout'){
        session_name('login');
        session_start();
        session_unset();

        $mysqli->close();
        echo '<meta http-equiv="refresh" content="0; url=../usuario_login.html">';

        exit();
    };
}

?>