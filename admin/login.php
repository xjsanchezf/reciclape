<? php 

require '../config.php';

if ( isset($_POST['admin_usuario'] && $_POST['admin_clave']) ) {

    $nombre = $_POST['admin_nombre'];
    $password = $_POST['admin_password'];

    

    $query = "SELECT * FROM `admin`";

    $result = $mysqli->query($query);

    $admin = mysqli_fetch_all($result);

    extract($admin[0]);

    /* if ( $admin[0].length <> 0 ) {
        echo '<meta http-equiv="refresh" content="0; url=admin_dashboard.html">';
    } else {
        echo '<script>alert("Tu nombre o contraseña no son válidos.");</script>'
        echo '<meta http-equiv="refresh" content="0; ../index.html">'
    }*/
};

?>