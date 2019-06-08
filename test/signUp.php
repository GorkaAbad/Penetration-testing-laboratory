<?php
include './database.php';

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);


if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$email = $_POST['inputEmail'];
$password = $_POST['inputPassword'];
$name = $_POST['inputName'];

//filtrar datos
$stmt = $conexion->prepare("SELECT iduser FROM $db_name.$tbl_name WHERE email = ? ;");
$stmt->bind_param("s",$email);
$stmt->execute();
$result = $stmt->get_result();
echo $email;

if($result->num_rows > 0){
    echo 'Error creatring user:  ' . $conexion->error;
    header('Location: ./signup.php?error=true');
    exit();
}

$stmt = $conexion->prepare("SELECT iduser FROM $db_name.$tbl_name WHERE name = ? ;");

$stmt->bind_param("s",$name);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    echo 'Error creatring user:  ' . $conexion->error;
    header('Location: ./signup.php?error=false');
    exit();
}


$salt = uniqid(mt_rand(), true);
$salt = '$6$'.$salt;
$password = crypt($password, $salt);
$stmt = $conexion->prepare("INSERT INTO $db_name.$tbl_name (email, password, name, salt) VALUES (? , ? , ? , ? )");
$stmt->bind_param("ssss",$email , $password , $name , $salt);
$stmt->execute();
$result = $stmt->get_result();


if ($result-> num_rows = 1) {
    echo 'User created successfully';

    header('Location: ./login.php?created=true');

} else {
    echo 'Error creatring user: ' . $conexion->error;
    header('Location: ./signup.php?error=true');

}
mysqli_close($conexion);
$stmt->close();
