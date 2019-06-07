<!DOCTYPE html>
<html lang="en">
<?php
include "./loadContainers.php";
?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?php echo($container["cve_container"]); ?>
    </title>

    <!-- Bootstrap core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
          crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="./css/shop-homepage.css" rel="stylesheet">
    <script src="./js/functionalities.js"></script>

</head>

<body>

<!-- Navigation -->
<?php include "./navigation.php" ?>


<p>


</p>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4 text-primary">
                <?php echo($container["name_container"]); ?>
            </h1>
            <h3>
                <?php echo("(" . $container["cve_container"] . ")"); ?>
            </h3>
            <!-- Esto deberia de hacerse con JS -->
            <div class="list-group">
                <a href="#" class="list-group-item active">Description</a>
                <a href="#" class="list-group-item">Solution</a>
            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">


            <div class="row">

                <div class="col-lg-7 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src=<?php echo($container["image_container"]); ?>
                            alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href=<?php echo("container.php?cve=" . $container["cve_container"]); ?>>
                                    <?php echo($container["name_container"]); ?></a>
                            </h4>
                            <h5>
                                <?php echo($container["cve_container"]); ?>
                            </h5>
                            <p class="card-text">
                                <?php echo($container["description_container"]); ?>
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                <?php
                                $i = 0;
                                while ($i < $container["diff_container"]) {
                                    ?>
                                    &#9733;
                                    <?php
                                    $i++;
                                }

                                for ($a = 0; $a < (5 - $i); $a++) {
                                    ?>
                                    &#9734;
                                    <?php
                                }
                                ?>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 mb-4">
                    <div class="card h-45">

                        <div class="card-body">
                            <h4 class="card-title">
                                <?php
                                if ($container["command_container"] != "no") {
                                 ?>  
                                    <a href=<?php echo $container["command_container"];?>> Exploit me!</a>
                                    <?php
                                }
                                ?>
                            </h4>
                            <p>Remember to use the common flag check in this website using this syntax:
                                flag{your answer's md5 hash}</p>

                            <form class="form-signin"
                                  action="./checkHash.php" method="GET">
                                <input type="hidden" name="cve" value="<?php echo($container["cve_container"]); ?>"/>
                                <input id="flag" type="hash" name="flag" class="form-control" placeholder="flag{md5}"
                                       required="true"
                                       autofocus="">
                                <button id="botonFlag" class="btn btn-primary btn-block" type="submit">Check flag
                                </button>
                            </form>
                            <?php
                            if (isset($_GET["error"]) && $_GET["error"] == 'false') {
                                echo("That's correct! Congatrulations");
                                ?>
                                <script>
                                    obtenerConseguidos();
                                    setActual(<?php echo json_encode($_GET["cve"]);?>);
                                </script> <?php
                            }
                            if (isset($_GET["error"]) && $_GET["error"] == 'true') {
                                echo("That's not the correct flag. Try harder!");
                            }

                            ?>

                        </div>

                    </div>
                </div>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<?php include "./footer.html" ?>


<!-- Bootstrap core JavaScript -->
<script src="./vendor/jquery/jquery.min.js"></script>
<script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
    window.onload = () => {
        obtenerConseguidos();
        setActual(<?php echo json_encode($_GET["cve"]);?>);
    }
</script>
</body>


</html>
