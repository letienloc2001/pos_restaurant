<?php
        if (isset($_GET['action'])){
            $action = $_GET['action'];
            if ($action == 'logout'){
                header('Location:  logout.php');
            }
            if ($action == 'addingFood'){
                header('Location:  addingFood.php');
            }
            if ($action == 'manage'){
                header('Location: manage.php');
            }
            if ($action == 'orders'){
                header('Location: orders.php');
            }
        }
?>