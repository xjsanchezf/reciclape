<?php 

if ( isset($_POST['pw-old']) ) {

    $pw_old = $_POST['pw-old'];
    $pw_new = $_POST['pw-new'];

    require 'config.php';


    $update = sprintf("UPDATE empresa SET password_e = '%s', WHERE password_e = '%s'",$pw_new,$pw_old);
    
    //$update = "UPDATE empresa SET password_e = ('".$pw_new."') WHERE password_e = ('".$pw_old."')";

    $result = $mysqli->query($update);

    echo '<meta http-equiv="refresh" content="0; url=home-cuenta.html">';

} else {
    echo '<script>alert("Datos incorrectos.");</script>';
    echo '<meta http-equiv="refresh" content="0; url=home-cuenta.html">';
}

?>