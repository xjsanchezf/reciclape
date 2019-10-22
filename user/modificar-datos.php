<?php 

if( isset($_POST['email-empresa']) || isset($_POST['rs-empresa']) || isset($_POST['tel-empresa']) ) {

    $email_empresa  = $_POST['email-empresa'];
    $rs_empresa     = $_POST['rs-empresa'];
    $tel_empresa    = $_POST['tel-empresa'];

    $id_empresa

    require 'config.php';

    if ( $email_empresa <> '' ) {
        $email = "SELECT email_e FROM empresa WHERE email_e"
    }
    
}

?>