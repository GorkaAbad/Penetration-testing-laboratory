<?php
session_start();
/**
 * Created by PhpStorm.
 * User: gorka
 * Date: 15/01/19
 * Time: 13:32
 */

include "database.php";

//mirar si el email existe


if ($_POST["inputPassword"]) {
    $email = $_SESSION["email"];
    $token = $_SESSION["token"];
    $password = $_POST["inputPassword"];
    //cambiar la contraseña
    //hacer el formulario para que meta su nueva contraseña
    //triger para que caduque
    resetPassword($email, $token, $password, $host_db, $user_db, $pass_db, $db_name);
    session_destroy();


} else {
    $email = $_POST["inputEmail"];
    checkEmail($email, $host_db, $user_db, $pass_db, $db_name);
    header("Location: /login.php?recover=false");
    die();
}

function checkEmail($email, $host_db, $user_db, $pass_db, $db_name)
{

    $tbl_name = "user";

    $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

    if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
    }

    $email = $_POST['inputEmail'];
    //filtrar datos

    $stmt = $conexion->prepare("SELECT salt FROM $db_name.$tbl_name WHERE email = ? ;");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        //only will have one row, just one user with that email
        while ($row = $result->fetch_assoc()) {

            $token = crypt($email, $row['salt']);

            saveToken($token, $email, $host_db, $user_db, $pass_db, $db_name);
            sendEmail($token, $email);


        }
    } else {
        echo "Error sending mail: " . $conexion->error;

        header("Location: /passwordRecovery.php?error=true");
        die();
    }


}

function saveToken($token, $email, $host_db, $user_db, $pass_db, $db_name)
{
    $tbl_name = "user";

    $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

    if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
    }

    //filtrar datos
    $stmt = $conexion->prepare("UPDATE $db_name.$tbl_name SET token = ?  WHERE email=?;");
    $stmt->bind_param("ss", $token, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows = 1) {
        echo 'Token created successfully';
    } else {
        echo 'Error creating token: ' . $conexion->error;
        header('Location: /passwordRecovery.php?error=false');

    }

}

function sendEmail($token, $inputEmail)
{


    require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases
    $email = new \SendGrid\Mail\Mail();

    $email->setFrom("gorkaabad12@gmail.com", "Laboratory online");
    $email->setSubject("Restore your password");
    $email->addTo($inputEmail, "");
    $email->addContent("text/plain", "Please click on the link above: http://localhost/recoveryPayload.php");
    /*$email->addContent(
        "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
    );*/

    //  $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
    $sendgrid = new \SendGrid('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');
    try {
        $response = $sendgrid->send($email);
        print $response->statusCode() . "\n";
        print_r($response->headers());
        print $response->body() . "\n";
        $_SESSION["token"] = $token;
        $_SESSION["email"] = $inputEmail;
    } catch (Exception $e) {
        echo 'Caught exception: ' . $e->getMessage() . "\n";
    }

}

function resetPassword($email, $token, $password, $host_db, $user_db, $pass_db, $db_name)
{
    $tbl_name = "user";

    $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

    if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
    }

    //filtrar datos
    $salt = $_SESSION["salt"];
    $password = crypt($password, $salt);

    $stmt = $conexion->prepare("UPDATE $db_name.$tbl_name SET password = (?) where email=? and token=?;");
    $stmt->bind_param("sss", $password, $email, $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows = 1) {
        echo 'Password reseted successfully';
        header('Location: /login.php?recover=true');


    } else {
        echo 'Error reseting password: ' . $conexion->error;
        header('Location: /passwordRecovery.php?error=false');

    }

}

?>