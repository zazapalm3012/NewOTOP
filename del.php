<?php

include_once ("connectDB.php");
$conn = new DB_conn;

$sql = $conn->del_member($_GET['id']);
if($sql){
    echo "<script>alert('ลบข้อมูลเสร็จสิ้น')</script>";
    echo "<script>window.location.href='display_member.php' </script>";
    } 
    else {
    echo "<script>alert('เกิดข้อผิดพลาด')</script>"; 
    }  
    
?>
