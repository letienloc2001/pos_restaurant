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
    <div class="container">
        <h2>Adding a new food</h2>
        <form method="post" action="addingFood.php">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="form6Example1" class="form-control" name="itemID" placeholder="Item ID" required />
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="form6Example2" class="form-control" name="price" placeholder="Price" required />
                    </div>
                </div>
            </div>
            <div class="form-outline mb-4">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="category" placeholder="">
                    <?php
                        include 'connect.php';

                        $sql = "SELECT categoryName FROM category";
                        $res = $connect->query($sql);
                        if (empty($res) or $res->num_rows > 0){
                            while ($row = $res->fetch_assoc()){
                                echo '<option value="'.$row['categoryName'].'">'.$row['categoryName'].'</option>';
                            }
                        }
                    ?>
                </select>
            </div>
            <!-- Text input -->
            <div class="form-outline mb-4">
                <input type="text" id="form6Example3" class="form-control" name="itemName" placeholder="Item name" required />
            </div>

            <!-- Message input -->
            <div class="form-outline mb-4">
                <textarea class="form-control" id="form6Example7" rows="4" name="itemDescription" placeholder="Description"></textarea>
            </div>

            <div class="form-outline mb-4">
                <input type="text" id="form6Example3" class="form-control" name="itemImage" placeholder="Link to the item image" required />
            </div>


            <!-- Submit button -->
            <button type="submit" name="addButton" class="btn btn-primary btn-block mb-4">Add food</button>
            <?php
            if (isset($_POST['addButton'])) {

                include 'connect.php';

                $itemID = $_POST['itemID'];
                $price = $_POST['price'];
                $itemName = $_POST['itemName'];
                $description = $_POST['itemDescription'];
                $image = $_POST['itemImage'];
                $categoryName = $_POST['category'];

                $find = "SELECT foodID FROM food WHERE foodID = '$itemID'";
                $res = $connect->query($find);

                if (!empty($res) and $res->num_rows == 0) {

                    $sql = "INSERT INTO food (foodID, name, price, description, image, categoryName)
                VALUE ('$itemID', '$itemName', '$price', '$description', '$image', '$categoryName' )";
                    $result = $connect->query($sql);
                    echo '<div class="text-success">Successfully</div>';
                } else {
                    echo '<div class="text-danger">Item ID already exists</div>';
                }
            }
            ?>
        </form>


        <h2>Adding a new category</h2>
        <form method="post" action="addingFood.php">
            <!-- Text input -->
            <div class="form-outline mb-4">
                <input type="text" id="form6Example3" class="form-control" name="newCategory" placeholder="Category name" required />
            </div>

            <!-- Submit button -->
            <button type="submit" name="categoryButton" class="btn btn-primary btn-block mb-4">Add category</button>
            <?php
            if (isset($_POST['categoryButton'])) {

                include 'connect.php';

                $categoryName = $_POST['newCategory'];

                $find = "SELECT categoryName FROM category WHERE categoryName = '$categoryName'";
                $res = $connect->query($find);

                if (!empty($res) and $res->num_rows == 0) {

                    $sql = "INSERT INTO category (categoryName) VALUE ('$categoryName' )";
                    $result = $connect->query($sql);
                    echo '<div class="text-success">Successfully</div>';
                } else {
                    echo '<div class="text-danger">Category already exists</div>';
                }
            }
            ?>
        </form>
    </div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

        body {
            font-family: "Poppins", sans-serif;
            color: #444444;
        }
    </style>
</body>

</html>