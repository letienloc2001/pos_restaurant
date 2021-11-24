<?php
session_start();
if (!isset($_SESSION['username']) && $_SESSION['username'] == NULL) {
    header('Location: login.php');
}
?>
<html>

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

    <title>Admin Panel</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <section class="section-products">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-8 col-lg-6">
                <div class="header">
                    <h3>Featured Product</h3>
                    <h2>Popular Food</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Product -->
            <?php
                if (isset($_GET['delete'])){
                    $item = $_GET['delete'];
                    include 'connect.php';
        
                    $sql = "DELETE FROM food WHERE foodID = '$item'";
                    $res = $connect->query($sql);
                }

            ?>
            <?php
                include 'connect.php';
                if (isset($_GET['category'])){
                    $category = $_GET['category'];

                    $sql = "SELECT foodID, name, description, price, image FROM food WHERE categoryName = '$category'";
                    
                    $result = $connect->query($sql);
                    if (empty($result) or $result->num_rows > 0){
                        while ($row = $result->fetch_assoc()){
                            echo '<div class="col-md-6 col-lg-4 col-xl-3">
                            <div id="product-'.$row['foodID'].'" class="single-product">
                                <style>
                                    .section-products #product-'.$row['foodID'].' .part-1::before {
                                        background: url("'.$row["image"].'") no-repeat center;
                                        background-size: cover;
                                        transition: all 0.3s;
                                    }
                                </style>
                                <div class="part-1">
                                    <button name="delete_'.$row['foodID'].'" class="btn btn-danger" onclick="confirm(\'Are you sure you want to delete this item\')"><a href="?delete='.$row['foodID'].'">Delete</a></button>
                                </div>
                                <div class="part-2">
                                    <h2 class="product-title">'.$row["name"].'</h2>
                                    <p class="font-weight-lighter">'.$row["description"].'</p>
                                    <h4 class="product-price text-danger">$'.$row["price"].'</h4>
                                </div>
                            </div>
                        </div>';
                        }
                    }
                } else {
                    $sql = "SELECT foodID, name, description, price, image FROM food";
                $res = $connect->query($sql);
                if (empty($res) or $res->num_rows > 0){
                    while ($row = $res->fetch_assoc()){
                        echo '<div class="col-md-6 col-lg-4 col-xl-3">
                        <div id="product-'.$row['foodID'].'" class="single-product">
                            <style>
                                .section-products #product-'.$row['foodID'].' .part-1::before {
                                    background: url("'.$row["image"].'") no-repeat center;
                                    background-size: cover;
                                    transition: all 0.3s;
                                }
                            </style>
                            <div class="part-1">
                                <button name="delete_'.$row['foodID'].'" class="btn btn-danger" onclick="confirm(\'Are you sure you want to delete this item\')"><a href="?delete='.$row['foodID'].'">Delete</a></button>
                            </div>
                            <div class="part-2">
                                <h2 class="product-title">'.$row["name"].'</h2>
                                <p class="font-weight-lighter">'.$row["description"].'</p>
                                <h4 class="product-price text-danger">$'.$row["price"].'</h4>
                            </div>
                        </div>
                    </div>';
                    }
                }
                }
                
            ?>
        </div>
    </div>
</section>
</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

    body {
        font-family: "Poppins", sans-serif;
        color: #444444;
    }

    a,
    a:hover {
        text-decoration: none;
        color: inherit;
    }

    .section-products {
        padding: 30px 0 54px;
    }

    .section-products .header {
        margin-bottom: 50px;
    }

    .section-products .header h3 {
        font-size: 1rem;
        color: #fe302f;
        font-weight: 500;
    }

    .section-products .header h2 {
        font-size: 2.2rem;
        font-weight: 400;
        color: #444444;
    }

    .section-products .single-product {
        margin-bottom: 26px;
    }

    .section-products .single-product .part-1 {
        position: relative;
        height: 290px;
        max-height: 290px;
        margin-bottom: 20px;
        overflow: hidden;
    }

    .section-products .single-product .part-1::before {
        position: absolute;
        content: "";
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        transition: all 0.3s;
    }

    .section-products .single-product:hover .part-1::before {
        transform: scale(1.2, 1.2) rotate(5deg);
    }


    .section-products .single-product .part-1 .discount,
    .section-products .single-product .part-1 .new {
        position: absolute;
        top: 15px;
        left: 20px;
        color: #ffffff;
        background-color: #fe302f;
        padding: 2px 8px;
        text-transform: uppercase;
        font-size: 0.85rem;
    }

    .section-products .single-product .part-1 .new {
        left: 0;
        background-color: #444444;
    }

    .section-products .single-product .part-1 ul {
        position: absolute;
        bottom: -41px;
        left: 20px;
        margin: 0;
        padding: 0;
        list-style: none;
        opacity: 0;
        transition: bottom 0.5s, opacity 0.5s;
    }

    .section-products .single-product:hover .part-1 ul {
        bottom: 30px;
        opacity: 1;
    }

    .section-products .single-product .part-1 ul li {
        display: inline-block;
        margin-right: 4px;
    }

    .section-products .single-product .part-1 ul li a {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        background-color: #ffffff;
        color: #444444;
        text-align: center;
        box-shadow: 0 2px 20px rgb(50 50 50 / 10%);
        transition: color 0.2s;
    }

    .section-products .single-product .part-1 ul li a:hover {
        color: #fe302f;
    }

    .section-products .single-product .part-2 .product-title {
        font-size: 1rem;
    }

    .section-products .single-product .part-2 h4 {
        display: inline-block;
        font-size: 1rem;
    }

    .section-products .single-product .part-2 .product-old-price {
        position: relative;
        padding: 0 7px;
        margin-right: 2px;
        opacity: 0.6;
    }

    .section-products .single-product .part-2 .product-old-price::after {
        position: absolute;
        content: "";
        top: 50%;
        left: 0;
        width: 100%;
        height: 1px;
        background-color: #444444;
        transform: translateY(-50%);
    }
</style>
</html>