<?php
    if (isset($_GET['done'])){
        $cartID = $_GET['done'];

        include 'connect.php';

        $sql = "DELETE FROM ordering WHERE cartID = $cartID";
        $connect->query($sql);

        $sql = "DELETE FROM cart WHERE cartID = $cartID";
        $connect->query($sql);
    }
?>
<?php
include 'connect.php';
$sql = "SELECT * FROM cart ORDER BY dateCreated";

$res = mysqli_query($connect, $sql);

if (empty($res) or $res->num_rows > 0) {
    while ($row = mysqli_fetch_array($res)){
?>
        <div class="container">
            <div class="mt-5 p-3 rounded cart">
                <div class="row no-gutters">
                    <div class="col-md-12">
                        <div class="product-details mr-2">
                            <div class="d-flex flex-row align-items-center">
                                <p class="text-wrapping">
                                    <span class="ml-2">Receipt ID: <b><?php echo $row['cartID'] ?></b></span><br>
                                    <span class="ml-2">Name: <b><?php echo $row['customerName'] ?></b></span><br>
                                    <span class="ml-2">Address: <b><?php echo $row['address'] ?></b></span><br>
                                    <span class="ml-2">Phone number: <b><?php echo $row['phoneNumber'] ?></b></span><br>
                                    <span class="ml-2">Date created: <b><?php echo $row['dateCreated'] ?></b></span>
                                </p>
                            </div>
                            <hr>
                            <h6 class="mb-0">Shopping cart</h6>

                            <?php
                            $cartID = $row['cartID'];
                            $sql = "SELECT foodID, quantity FROM ordering WHERE cartID = '$cartID'";
                            $result = $connect->query($sql);
                            if (empty($result) or $result->num_rows > 0) {
                                while ($row1 = $result->fetch_assoc()) {
                                    $foodID = $row1['foodID'];
                                    $sql2 = "SELECT * FROM food WHERE foodID = '$foodID'";

                                    $result2 = $connect->query($sql2);

                                    if (empty($result2) or $result2->num_rows > 0) {
                                        while ($row2 = $result2->fetch_assoc()) {

                            ?>
                                            <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                                                <div class="col-md-7">
                                                    <div class="d-flex flex-row">
                                                        <img class="rounded" src="<?php echo $row2['image'] ?>" width="40">
                                                        <div class="ml-2">
                                                            <span class="font-weight-bold d-block"><?php echo $row2['name'] ?></span>
                                                            <span class="spec text-wrapped"><?php echo $row2['description'] ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div class="col-md-12">
                                                            <span class="d-block"><?php echo $row1['quantity'] ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                <?php
                                        }
                                    }
                                } ?>
                        </div>
                    </div>
                </div>
                <div class="row d-flex no-gutters justify-content-center">
                    <button class="btn btn-success" onclick="confirm('Are you sure you want to delete this receipt?\nThis cannot be undone')">
                        <a class="text-white" href="?done=<?php echo $row['cartID'] ?>">Done</a>
                    </button>
                </div>
            </div>
            <hr>
        </div>
<?php
                            }
                        }
                    }

?>

<?php
include 'action.php';
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

    body {
        font-family: "Poppins", sans-serif;
        color: #444444;
    }
</style>
<style>
    .payment-info {
        background: blue;
        padding: 10px;
        border-radius: 6px;
        color: #fff;
        font-weight: bold
    }

    .product-details {
        padding: 10px
    }

    body {
        background: #eee
    }

    .cart {
        background: #fff
    }

    .p-about {
        font-size: 12px
    }

    .table-shadow {
        -webkit-box-shadow: 5px 5px 15px -2px rgba(0, 0, 0, 0.42);
        box-shadow: 5px 5px 15px -2px rgba(0, 0, 0, 0.42)
    }

    .type {
        font-weight: 400;
        font-size: 10px
    }

    label.radio {
        cursor: pointer
    }

    label.radio input {
        position: absolute;
        top: 0;
        left: 0;
        visibility: hidden;
        pointer-events: none
    }

    label.radio span {
        padding: 1px 12px;
        border: 2px solid #ada9a9;
        display: inline-block;
        color: #8f37aa;
        border-radius: 3px;
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 300
    }

    label.radio input:checked+span {
        border-color: #fff;
        background-color: blue;
        color: #fff
    }

    .credit-inputs {
        background: rgb(102, 102, 221);
        color: #fff !important;
        border-color: rgb(102, 102, 221)
    }

    .credit-inputs::placeholder {
        color: #fff;
        font-size: 13px
    }

    .credit-card-label {
        font-size: 9px;
        font-weight: 300
    }

    .form-control.credit-inputs:focus {
        background: rgb(102, 102, 221);
        border: rgb(102, 102, 221)
    }

    .line {
        border-bottom: 1px solid rgb(102, 102, 221)
    }

    .information span {
        font-size: 12px;
        font-weight: 500
    }

    .information {
        margin-bottom: 5px
    }

    .items {
        -webkit-box-shadow: 5px 5px 4px -1px rgba(0, 0, 0, 0.25);
        box-shadow: 5px 5px 4px -1px rgba(0, 0, 0, 0.08)
    }

    .spec {
        font-size: 11px
    }
</style>