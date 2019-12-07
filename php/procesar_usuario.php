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
                echo '<meta http-equiv="refresh" content="0; url=../usuario_dashboard.php">';

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
    //-- Regístrate --
    //
    if ($procesar == 'register') {
        $register_name = $_POST['register-name'];
        $register_email = $_POST['register-email'];
        $register_password = $_POST['register-password'];

        $registro = sprintf("INSERT INTO usuario (UsuarioNombres, UsuarioCorreo, UsuarioPassword) VALUES ('%s','%s','%s')", $register_name, $register_email, $register_password);
        $resultado = $mysqli->query($registro);

        $login_email = $register_email;
        $usuario = sprintf("SELECT * FROM usuario WHERE UsuarioCorreo = '%s'", $login_email);
        $resultado = $mysqli->query($usuario);
        $login = $resultado->fetch_row();

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
        echo '<meta http-equiv="refresh" content="0; url=../usuario_dashboard.php">';

        exit();
            
    };

    //
    //-- Editar datos del usuario --
    //
    if ($procesar == 'perfil-editar') {
        $usuario_id = $_POST['usuario-id'];
        $usuario_nombres = $_POST['usuario-nombres'];
        $usuario_apellidos = $_POST['usuario-apellidos'];
        $usuario_correo = $_POST['usuario-correo'];
        $usuario_password = $_POST['usuario-password'];
        $usuario_telefono = $_POST['usuario-telefono'];
        $usuario_direccion = $_POST['usuario-direccion'];

        $usuario = sprintf("UPDATE usuario SET UsuarioNombres = '%s', UsuarioApellidos = '%s', UsuarioCorreo = '%s', UsuarioPassword = '%s', UsuarioTelefono = '%d', UsuarioDireccion = '%s' WHERE UsuarioID = '%s'", $usuario_nombres, $usuario_apellidos, $usuario_correo, $usuario_password, $usuario_telefono, $usuario_direccion, $usuario_id);
        $editar = $mysqli->query($usuario);

        $usuario = sprintf("SELECT * FROM usuario WHERE UsuarioCorreo = '%s'", $usuario_correo);
        $resultado = $mysqli->query($usuario);
        $login = $resultado->fetch_row();

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
        echo '<script>alert("Cambios hechos con éxito.");</script>';
        echo '<meta http-equiv="refresh" content="0; url=../usuario_perfil.php">';
    };

    //
    //-- Cerrar sesión --
    //
    if ($procesar == 'logout'){
        session_name('login');
        session_start();
        session_unset();

        $mysqli->close();
        echo '<script>alert("¡Esperamos verte pronto!");</script>';
        echo '<meta http-equiv="refresh" content="0; url=../usuario_login.html">';

        exit();
    };
}

?>