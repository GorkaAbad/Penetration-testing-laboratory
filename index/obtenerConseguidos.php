<?php
/**
 * Created by PhpStorm.
 * User: gorka
 * Date: 17/03/19
 * Time: 19:46
 */
session_start();
include "../database.php";

header('Content-Type: application/json');

$aResult = array();

if ($_POST["id"]) {
    $id = $_POST["id"];

} else {
    $id = $_SESSION["id"];
}
$tbl_name = "userContainer";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
    die("La conexion falló: " . $conexion->connect_error);
}

error_log($id);
//Se supone que solo estaran en la tabla los container que se hayan conseguido
$stmt = $conexion->prepare("SELECT id_container FROM $db_name.$tbl_name WHERE id_user = ?;");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($aResult, $row["id_container"]);
    }

}

error_log("Respuesta: " . json_encode($aResult));
echo json_encode($aResult);
?>