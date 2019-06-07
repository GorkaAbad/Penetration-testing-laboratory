<?php

session_start();
include '../database.php';

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);


if ($conexion->connect_error) {
    die("La conexion falló: " . $conexion->connect_error);
}

$id = $_SESSION['id'];

$oldPass = $_POST['oldPassword'];

$oldEmail = $_POST['oldEmail'];

$oldName = $_POST['oldName'];

$salt = $_SESSION["salt"];


if ($oldPass) {
    $oldPass = crypt($oldPass, $salt);
    $newPass = crypt($_POST['newPassword'], $salt);
    $stmt = $conexion->prepare("update $db_name.$tbl_name set password = ?  where password = ?  and iduser = '$id' ;");
    $stmt->bind_param("ss", $newPass, $oldPass);

} else if ($oldEmail) {
    $newEmail = $_POST['newEmail'];
    $stmt = $conexion->prepare("update $db_name.$tbl_name set email = ?  where email = ? and iduser = '$id' ;");
    $stmt->bind_param("ss", $newEmail, $oldEmail);

} else if (isset($oldName)) {
    $newName = $_POST['newName'];
    $stmt = $conexion->prepare("update $db_name.$tbl_name set name = ?  where name = ? and iduser = '$id' ;");
    $stmt->bind_param("ss", $newName, $oldName);

}


$stmt->execute();
$result = $stmt->get_result();

$result = $conexion->query($sql);


if ($result == 1) {

    header('Location: /index/settings.php?changed=true');

} else {
    header('Location: /index/settings.php?changed=false');

}
mysqli_close($conexion);


?>