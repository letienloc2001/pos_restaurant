<?php

// require('connect.php');
$host = "localhost";
$username = "root";
$password = "";
$table = "respos2";

$connect = new mysqli($host, $username, $password, $table) or die ('Cannot connect to database');
mysqli_set_charset($connect, 'UTF8');

if($connect === false){ 
die("ERROR: Could not connect. " . mysqli_connect_error()); 
}

if (isset($_POST["login"])) {
    // lấy thông tin người dùng
    $username = $_POST["username"];
    $password = $_POST["password"];
    //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
    //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    mysqli_select_db($connect, $table);
    if ($username == "" || $password =="") {
        echo '<div class="row">Please enter your username and password</div>';
    }else{
        $sql = "select * from admin where username = '$username' and password = '$password' ";
        $res = $connect->query($sql);

        if (!empty($res) and $res->num_rows != 0) {
            //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
            $_SESSION['username'] = $username;
            // Thực thi hành động sau khi lưu thông tin vào session
            // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
            header('Location: index.php');
            
        }

            echo '<div class="row">Invalid username or password</div>';
        
    }
}
$connect->close();
?>