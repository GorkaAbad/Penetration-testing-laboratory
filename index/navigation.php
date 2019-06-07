

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <?php echo $points; ?> points</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <div class="dropdown ">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" role="button" id="dropdownMenuLink"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <?php echo $name; ?></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="./leaderboard.php">Leaderboard</a>
                                <a class="dropdown-item" href="./settings.php">Settings</a>
                                <a class="dropdown-item" href="../logout.php">Log out</a>
                            </div>
                    </ul>
                    </li>

                </div>
            </ul>
        </div>
    </div>
</nav>

