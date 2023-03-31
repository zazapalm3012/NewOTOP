<?php
include_once ("connectDB.php");
$conn = new DB_conn;

session_start();
function logout(){
    session_destroy();
}

logout();

  header("location:index.php");





?>