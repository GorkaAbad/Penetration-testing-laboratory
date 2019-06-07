<!DOCTYPE html>
<html lang="en">
<?php
include "./cargarDatosLadeboard.php";
include "../cargarDatos.php";

?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laderboard </title>

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
<div class="container">

    <div class="row">

        <div class="col-lg-3">
            <!-- Aqui hay que hacer una funcion de js o asi que rellene esto -->
           

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Points</th>
                </tr>
                </thead>


                <?php
                echo(' <tbody> ');
                $find = 0;

                for ($i = 0; $i < sizeof($names); $i++) {
                    $nameaux = $names[$i];
                    $pointsaux = $puntos[$i];


                    if (strcmp($nameaux , $name) === 0 ) {
                        //the user in the laderboard, remark
                        $find = 1;
                        ?>

                        <tr class="tetx-primary">
                            <th scope="row">
                                <b>  <?php echo($i + 1); ?> </b>
                            </th>
                            <td>
                                <a  href="user.php?user=<?php echo($nameaux); ?>"> <b><?php echo($nameaux); ?></b></a>
                            </td>
                            <td>
                               <b> <?php echo($pointsaux); ?></b>
                            </td>

                        </tr>
                        <?php
                    } else {
                        ?>
                        <tr>
                            <th scope="row">
                                <?php echo($i + 1); ?>
                            </th>
                            <td>
                                <a  href="user.php?user=<?php echo($nameaux); ?>"> <?php echo($nameaux); ?></a>
                            </td>
                            <td>
                                <?php echo($pointsaux); ?>
                            </td>

                        </tr>
                        <?php
                    }


                }
                if ($find == 0) {
                    ?>
                    <tr>
                        <th scope="row">
                            <?php echo($pos); ?>
                        </th>
                        <td>
                            <b><?php echo($name); ?></b>
                        </td>
                        <td>
                            <b><?php echo($points); ?></b>
                        </td>

                    </tr>
                    <?php
                }

                ?>
                </tbody>
            </table>

        </div>

    </div>
</div>


<!-- Footer -->
<?php include "./footer.html" ?>


<!-- Bootstrap core JavaScript -->
<script src="./vendor/jquery/jquery.min.js"></script>
<script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
