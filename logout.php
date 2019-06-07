<?php

session_start();
unset ($SESSION['name']);
session_destroy();

header('Location: ./login.php');

?>
