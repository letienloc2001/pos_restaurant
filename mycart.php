<?php
    if (session_id() === '') {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en" style="height: 100%" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

    <meta name="viewport" content="width=device_width, initial_scale=1">

    <title>My cart</title>
</head>
<body>
    <?php
        include "template/header.php";
    ?>
    <!-- Menu -->
    <?php
        include "template/cart.php";
    ?>
</body>
</html>