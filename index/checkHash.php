<?php
/**
 * Created by PhpStorm.
 * User: gorka
 * Date: 20/03/19
 * Time: 20:28
 */

session_start();
include "../database.php";
if ($_SESSION["id"]) {

    $id = $_SESSION["id"];
    $cve = $_GET["cve"];
    $flag = $_GET["flag"];
    $puntos = $_SESSION["points"];

    $points = comprobarHash($host_db, $user_db, $pass_db, $db_name, $flag, $cve);
    sumarPuntos($puntos, $id, $points, $host_db, $user_db, $pass_db, $db_name);
    añadirAConseguidos($host_db, $id, $user_db, $pass_db, $db_name, $cve);

}

function comprobarHash($host_db, $user_db, $pass_db, $db_name, $flag, $cve)
{
//Comprobar el hash
    $puntos = 0;

    $tbl_name = "container";
    $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
    if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
    }
    $stmt = $conexion->prepare("SELECT hash_container, puntos_container FROM $db_name.$tbl_name WHERE  cve_container= ?;");
    $stmt->bind_param("s", $cve);
    $stmt->execute();
    $result = $stmt->get_result();
//Solo deveria de haber 1
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //Si ha fallado redirect y le digo que no ha acertado

            if ($flag !== $row["hash_container"]) {
                header("Location: ./container.php?cve=" . $cve . "&error=true");
                exit();
            } else {
                $puntos = $row["puntos_container"];
            }

        }
    }
    return $puntos;
    mysqli_close($conexion);
}

function sumarPuntos($puntos, $id, $points, $host_db, $user_db, $pass_db, $db_name)
{
    $tbl_name = "user";
    $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
    if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
    }

    $points = $points + $puntos;
    $stmt = $conexion->prepare("UPDATE $db_name.$tbl_name SET points = ? WHERE iduser = ?");
    $stmt->bind_param("ss", $points, $id);
    $stmt->execute();

    $_SESSION["points"] = $points;
    mysqli_close($conexion);

}

//Añadirlo a conseguidos
function añadirAConseguidos($host_db, $id, $user_db, $pass_db, $db_name, $cve)
{
    $tbl_name = "userContainer";
    $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
    if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
    }

    $stmt = $conexion->prepare("INSERT INTO $db_name.$tbl_name  (id_container, id_user) VALUES(?,?);");
    $stmt->bind_param("ss", $cve, $id);
    $stmt->execute();
    mysqli_close($conexion);
    header("Location: ./container.php?cve=" . $cve . "&error=false");

}


?>

