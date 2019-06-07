

<?php
/**
 * Created by PhpStorm.
 * User: gorka
 * Date: 10/01/19
 * Time: 18:23
 */

//Constantes
$DB_DATABASE='myDb'; #la base de datos a la que hay que conectarse# Se establece la conexión:
$DB_SERVER='db'; #la dirección del servidor
$DB_USER='user'; #el usuario para esa base de datos
$DB_PASS='test'; #la clave para ese usuario

$con = crearConexion($DB_SERVER, $DB_USER, $DB_PASS, $DB_DATABASE);

$articleid = $_GET["article"];

$query = "SELECT * FROM articles WHERE articleId = '$articleid'";



$resultado= mysqli_query($con, $query);

if(!$resultado){
    echo $resultado;
}


function crearConexion($DB_SERVER, $DB_USER, $DB_PASS, $DB_DATABASE)
{
    $con= mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_DATABASE);#Comprobamos conexión
    if (mysqli_connect_errno($con)) {
        printf('Error de conexion: '. mysqli_connect_error());
        exit();
    }

    return $con;
}

$num_rows = $resultado->num_rows;


?>


<html>
<h1>This page is vulnerable to SQL injection please exploit it!</h1>
<h2>Tip: try searching an article. You may find out the admin password. </h2>

<p>
    <?php if ($num_rows > 0) {

        while ($row = $resultado->fetch_array()) {
           
            echo "Id: " . $row["articleId"];
            echo "\r\n";
            echo "Content: " . $row["content"];
	    echo "\r\n";
        }
    }
    ?></p>
</html>
