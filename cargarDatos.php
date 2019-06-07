<?php
/**
 * Created by PhpStorm.
 * User: gorka
 * Date: 6/01/19
 * Time: 20:18
 */


session_start();
if ($_SESSION["id"]) {
    $id = $_SESSION["id"];
    $name = $_SESSION["name"];
    $email = $_SESSION["email"];
    $points = $_SESSION["points"];
    $containers = $_SESSION["containers"];


} else {
    header("Location: /login.php");

}
?>

