<?php
        if (isset($_GET['action'])){
            $action = $_GET['action'];
            if ($action == 'order'){
                header('Location:  order.php');
            }
            if ($action == 'cart'){
                header('Location:  mycart.php');
            }
            if ($action == 'login' or $action == 'register'){
                header('Location: index.php');
            }
        }
?>