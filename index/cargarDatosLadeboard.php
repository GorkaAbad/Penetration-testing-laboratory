<?php
/**
 * Created by PhpStorm.
 * User: gorka
 * Date: 6/01/19
 * Time: 20:21
 */
include  "../database.php";
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
    die("La conexion falló: " . $conexion->connect_error);
}




$stmt = $conexion->prepare("select name,points from $db_name.$tbl_name order by points desc limit 10;");
$stmt->execute();
$result = $stmt->get_result();

$names = [];
$puntos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $name = $row["name"];
        $point = $row["points"];
        array_push($names, $name);
        array_push($puntos, $point);
    }

}

mysqli_close($conexion);

?>