<?php
session_start();
include_once("connectDB.php");
$conn = new DB_conn;


$error = array();

if(isset($_POST['login_user'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if(empty($user)){
        array_push($error,"Your user is required");
    }
    if(empty($pass)){
        array_push($error,"Your password is required");
    }
    if(count($error) == 0){
        $sql = $conn -> check_login($user,$pass);
        if(mysqli_num_rows($sql) == 1){
            $data = mysqli_fetch_array($sql);
            $_SESSION['name'] = $data ['first_name'];
            echo "<script>alert('Your login successfully') </script>";
            echo "<script>window.location ='index.php' </script>";

        }
        else{
        array_push($error,"WRONG username or password");

            echo "<script>alert('Your username or password is incorrect') </script>";   
            echo "<script>window.location ='login.php' </script>";



        }
    }

}
?>
