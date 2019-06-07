<?php

include './database.php';
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$email = $_POST['inputEmail'];
$password = $_POST['inputPassword'];
//filtrar datos

$stmt = $conexion->prepare("SELECT * FROM $db_name.$tbl_name WHERE email = ? ;");
$stmt->bind_param("s",$email);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    //only will have one row, just one user with that email
    while($row = $result->fetch_assoc()) {
        if (hash_equals($row['password'], crypt($password, $row['salt']))) {
            echo "¡Contraseña verificada!";
            session_start();

        }else{
            echo "Error login in user: " . $conexion->error;

            header("Location: ./login.php?error=true");
            die();
        }
        $name = $row["name"];
        $id = $row["iduser"];
        $points = $row["points"];
        $salt = $row["salt"];

    }

    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;
    $_SESSION["id"] = $id;
    $_SESSION["points"] = $points;
    $_SESSION["salt"] = $salt;

    
    mysqli_close($conexion);
    $stmt->close();

    $tbl_name = "container";
    $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

    $stmt = $conexion->prepare("SELECT * FROM $db_name.$tbl_name ;");

    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        $containers = array();
        while($row = $result->fetch_assoc()) {
            $aux = "container_".$row["id_container"];
            $containers[$aux] = $row; 
        }
        $_SESSION["containers"] = $containers;
    }   

    header("Location: ./index/index.php");


}else{

    echo "Error login in user: " . $conexion->error;

    header("Location: ./login.php?error=true");

}
 mysqli_close($conexion);
 $stmt->close();
 ?>
