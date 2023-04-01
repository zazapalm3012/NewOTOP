<?php
session_start();
include_once("connect2.php");
if(!isset($_POST['sendcart'])){
$cusName = $_GET['cus_name'];
$cusAddress = $_GET['cus_add'];
$cusTel = $_GET['cus_tel'];
$sql = "insert into tb_order(cus_name,address,telephone,total_price ,order_status)
values('$cusName','$cusAddress','$cusTel','". $_SESSION["sumprice"] ."' ,'1' )";
mysqli_query($conn,$sql);
$orderID = mysqli_insert_id($conn);

for($i=0; $i <= (int)$_SESSION["intLine"]; $i++){
    if( isset($_SESSION["strProductID"][$i])){
     if(($_SESSION["strProductID"][$i]) != ""){
     $sql1 = "select * from product where pId = '".$_SESSION["strProductID"][$i]."' ";
     $result1 = mysqli_query($conn,$sql1);
     $row1 = mysqli_fetch_array($result1);
     $price = $row1["pPrice"];
     $total = $_SESSION["strQty"][$i] * $price;
     $sql2 = "insert into order_detail(orderID, pro_id,orderPrice,orderQty,Total)
     values('$orderID', '".$_SESSION["strProductID"][$i]."', '$price', '".$_SESSION["strQty"][$i]."', '$total' )";
     if(mysqli_query($conn,$sql2))
    {
        
        echo "<script> alert('บันทึกข้อมูลเสร็จสิ้น') </script>";
        unset($_SESSION["strQty"]);
        unset($_SESSION["sumprice"]);
        unset($_SESSION["intLine"]);
        unset($_SESSION["strProductID"]);
        unset($_SESSION["cart"]);
        unset($_SESSION["price"]);
        unset($_SESSION["strQty"]);
        unset($_SESSION["strQty"]);
        unset($_SESSION["strQty"]);
        echo "<script>window.location.href='index.php' </script>";


    }
    
    }
    }
}
}
else{
    $ids = $_SESSION['name'];
    echo "<script> alert('SOMETHING ABOUT WRONG') </script>";
    echo "<script>window.location.href='checkout.php?id= $ids' </script>";
}
?>