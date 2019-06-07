<!DOCTYPE html>
<html lang="en">
<!-- https://demos.creative-tim.com/material-dashboard-pro-angular2/forms/regular -->
<?php
//coger el token y el mail para volverlo a enviar para poder resetear la password

?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link href="stylelogs.css" rel="stylesheet">
</head>

<body class="text-center">

<form class="form-signin" action="/recover.php" method="POST">

    <h1 class="h3 mb-3 font-weight-normal">Please type your password</h1>

    <input type="password" name="inputPassword" class="form-control" placeholder="Password" required="" autofocus="">

    <button class="btn btn-lg btn-primary btn-block" type="submit">Reset</button>


</form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</html>