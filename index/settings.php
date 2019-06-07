<!DOCTYPE html>
<html lang="en">
<?php
include "../cargarDatos.php";
?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Settings</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
          crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/stylelogs.css" rel="stylesheet">


</head>

<body>

<?php include "./navigation.php" ?>

<p>


</p>

<!-- Page Content -->

<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4 text-primary">Settings
            </h1>
            <div class="list-group">
                <a href="/index/settings.php" class="list-group-item active">Privacy</a>
                <?php
                if (isset($_GET["changed"]) && $_GET["changed"] == 'true') {
                    echo '<p class=" h3 mb-3 font-weight-normal text-success">Credentials have been updated successfully</p>';
                } else if (isset($_GET["changed"]) && $_GET["changed"] == 'false') {
                    echo '<p class=" h3 mb-3 font-weight-normal text-danger">An error ocurred updating credentials</p>';

                }

                ?>
            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">


            <div class="row">

                <div class="col-lg-4 col-md-6 mb-4">
                    <form class="form-signin" action="/index/changeChecker.php" method="POST">
                        <h1 class="h3 mb-3 font-weight-normal">Change your password</h1>

                        <label for="inputPassword" class="sr-only"> Password</label>
                        <input type="password" name="oldPassword" class="form-control arriba" placeholder="Old Password"
                               required="">
                        <input type="password" id="newPassword" name="newPassword" class="form-control medio"
                               placeholder="New Password" required="" onkeyup='check();'>
                        <input type="password" id="newPassword2" name="newPassword2" class="form-control abajo"
                               placeholder="New Password" required="" onkeyup='check();'>
                        <span id='message'></span>
                        <button class="btn btn-lg btn-primary btn-block" id="btn" type="submit" disabled>Change
                            Password
                        </button>

                    </form>


                </div>
                <script>
                    var check = function () {
                        if (document.getElementById('newPassword').value ==
                            document.getElementById('newPassword2').value) {
                            document.getElementById('message').style.color = 'green';
                            document.getElementById('message').innerHTML = 'Matching';
                            document.getElementById('btn').removeAttribute('disabled');
                        } else {
                            document.getElementById('message').style.color = 'red';
                            document.getElementById('message').innerHTML = 'Not matching';
                            document.getElementById('btn').setAttribute('disabled', '');

                        }
                    }
                </script>
                <script>
                    var check2 = function () {
                        if (document.getElementById('newEmail').value ==
                            document.getElementById('newEmail2').value) {
                            document.getElementById('message2').style.color = 'green';
                            document.getElementById('message2').innerHTML = 'Matching';
                            document.getElementById('btn2').removeAttribute('disabled');

                        } else {
                            document.getElementById('message2').style.color = 'red';
                            document.getElementById('message2').innerHTML = 'Not matching';
                            document.getElementById('btn2').setAttribute('disabled', '');

                        }
                    }
                </script>
                <script>
                    var check3 = function () {
                        if (document.getElementById('newName').value ==
                            document.getElementById('newName2').value) {
                            document.getElementById('message3').style.color = 'green';
                            document.getElementById('message3').innerHTML = 'Matching';
                            document.getElementById('btn3').removeAttribute('disabled');

                        } else {
                            document.getElementById('message3').style.color = 'red';
                            document.getElementById('message3').innerHTML = 'Not matching';
                            document.getElementById('btn3').setAttribute('disabled', '');

                        }
                    }
                </script>

                <div class="col-lg-4 col-md-6 mb-4">
                    <form class="form-signin" action="/index/changeChecker.php" method="POST">
                        <h1 class="h3 mb-3 font-weight-normal">Change your email</h1>

                        <label for="inputEmail" class="sr-only"> Email</label>
                        <input type="email" name="oldEmail" class="form-control arriba" placeholder="Old Email"
                               required="">
                        <input type="email" name="newEmail" id='newEmail' class="form-control medio"
                               placeholder="New Email"
                               required="" onkeyup='check2();'>
                        <input type="email" id='newEmail2' name="newEmail2" class="form-control abajo"
                               placeholder="New Email"
                               required="" onkeyup='check2();'>
                        <span id='message2'></span>

                        <button class="btn btn-lg btn-primary btn-block" type="submit" id="btn2" disabled>Change Email
                        </button>

                    </form>


                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <form class="form-signin" action="/index/changeChecker.php" method="POST">
                        <h1 class="h3 mb-3 font-weight-normal">Change your name</h1>

                        <label class="sr-only">Name</label>
                        <input type="text" name="oldName" class="form-control arriba" placeholder="Old Name"
                               required="">
                        <input type="text" name="newName" id='newName' class="form-control medio" placeholder="New Name"
                               required="" onkeyup='check3();'>
                        <input type="text" name="newName2" id='newName2' class="form-control abajo"
                               placeholder="New Name"
                               required="" onkeyup='check3();'>
                        <span id='message3'></span>

                        <button class="btn btn-lg btn-primary btn-block" type="submit" id="btn3" disabled>Change Name
                        </button>

                    </form>


                </div>


            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<p style=" padding-bottom: 200px">

</p>
<!-- Footer -->
<?php include "./footer.html" ?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>