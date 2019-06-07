<!DOCTYPE html>
<html lang="en">

<?php include "../cargarDatos.php"; ?>
<?php include "./userInfo.php"; ?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home Page</title>

    <script src="./js/functionalities.js"></script>


    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
          crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="./css/shop-homepage.css" rel="stylesheet">

</head>
<body>

<!-- Navigation -->

<?php include "./navigation.php" ?>

<p>


</p>

<!-- Page Content -->
<div class="container" id="contenido">

    <div class="row">

        <div class="col-lg-3">


            <!-- Esto deberia de hacerse con JS -->
            <div class="list-group">
                <p class="list-group-item"><?php echo $nombre; ?></p>
                <p class="list-group-item">Points: <?php echo $puntos; ?></p>

                <input id="search" placeholder="Search" class="list-group-item" onkeypress="search(this)">
            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">


            <div class="row">
                <?php
                foreach ($containers

                         as $container) {
                    ?>

                    <div class="col-lg-4 col-md-6 mb-4" id=<?php echo $container["cve_container"] . "CARD"; ?>>
                        <div class="card h-100">
                            <a href="#"><img class="card-img-top"
                                             src= <?php echo($container["image_container"]); ?> alt=""></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href= <?php echo("/container.php?cve=" . $container["cve_container"]); ?>>
                                        <?php echo($container["name_container"]); ?></a>
                                </h4>
                                <h5>
                                    <?php echo($container["cve_container"]); ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo(substr($container["description_container"], 0, 140) . "..."); ?>
                                </p>
                            </div>
                            <div class="card-footer" id=<?php echo $container["cve_container"]; ?>>
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


                    <?php
                }
                ?>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>

<!-- Footer -->
<?php include "./footer.html" ?>

<!-- Bootstrap core JavaScript -->
<script src="./vendor/jquery/jquery.min.js"></script>
<script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
    let container = [];
    <?php
    foreach ($containers as $container) {
    ?>
    container.push(<?php echo json_encode($container["cve_container"]); ?>);
    <?php
    }
    ?>

    window.onload = () => {

        obtenerConseguidosConId(<?php echo json_encode($iduser); ?>);
        guardarContainers(container);
    }
</script>

</body>

</html>
