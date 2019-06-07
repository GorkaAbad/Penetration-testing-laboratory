<?php
session_start();

include "../database.php";


$user = $_GET["user"];

//Coger los datos a mostar sobre este usuario

//Datos para mostrar:
/*
 * Nombre
 * Puntos
 * Containers hechos
 * ¿Que mas?
 *
 */
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
    die("La conexion falló: " . $conexion->connect_error);
}


$stmt = $conexion->prepare("SELECT points, iduser FROM $db_name.$tbl_name WHERE name = ? ;");
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

$nombre = "No user was found";
$puntos = 0;
if ($result->num_rows > 0) {
    //only will have one row, just one user with that email
    while ($row = $result->fetch_assoc()) {
        $nombre = $user;
        $puntos = $row["points"];
        $iduser = $row["iduser"];
    }
}




?>