<?php
/**
 * Created by PhpStorm.
 * User: gorka
 * Date: 6/01/19
 * Time: 20:43
 */
session_start();
include "../database.php";
if ($_SESSION["id"]) {
    $id = $_SESSION["id"];
    $name = $_SESSION["name"];
    $email = $_SESSION["email"];
    $points = $_SESSION["points"];
    $cve = $_GET["cve"];

    $tbl_name = "container";

    $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

    if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
    }

    $stmt = $conexion->prepare("SELECT * FROM $db_name.$tbl_name WHERE cve_container = ? ;");
    $stmt->bind_param("s", $cve);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $container = $row;


        }

    }

} else {
    header("Location: /login.php");

}
mysqli_close($conexion);

?>