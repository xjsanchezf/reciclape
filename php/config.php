<?php

$mysqli = new mysqli('localhost', 'root', '', 'reciclape');

$mysqli->query("SET CHARACTER_SET_CLIENT='utf8'");
$mysqli->query("SET CHARACTER_SET_RESULTS='utf8'");
$mysqli->query("SET CHARACTER_SET_CONNECTION='utf8'");

if ($mysqli->connect_errno) {
    echo "Lo sentimos, este sitio web está experimentando problemas. Con la conectividad al SGBD.";
    echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
    exit;
};

?>