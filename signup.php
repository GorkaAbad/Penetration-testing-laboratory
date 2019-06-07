<!DOCTYPE html>
<html lang="en">
<!-- https://demos.creative-tim.com/material-dashboard-pro-angular2/forms/regular -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link href="stylelogs.css" rel="stylesheet">
</head>

<body>
    <form class="form-signin text-center" action="./signupChecker.php" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
        <?php
       if(isset($_GET["error"]) && $_GET["error"] == 'true'){
        echo'<p class=" mb-3 font-weight-normal text-danger">The user already exists</p>';
    }
     ?>
       <?php
       if(isset($_GET["error"]) && $_GET["error"] == 'false'){
        echo'<p class=" mb-3 font-weight-normal text-danger">The username is already in use.</p>';
    }
     ?>
     
        <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
        <input type="text" name="inputName" class="form-control" placeholder="Name" required="">

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="inputPassword" class="form-control" placeholder="Password" required="">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
        <p class="text-muted">Have an account? <a href="./login.php" class="btn btn-default">Sign in</a>
    </form>


</body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</html>
