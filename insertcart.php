<?php
session_start();
include_once("connectDB.php");
$conn = new DB_conn;
$que = $conn ->select_order_id ();
while($data  = mysqli_fetch_array($que)){
    if($data['cus_name'] == $_GET['cus_name'] ){
        $ORDERID = $data['orderID'];
        echo "<script> alert('$ORDERID') </script>";
    }
}
if(!isset($_POST['sendcart'])){
$cusName = $_GET['cus_name'];
$cusAddress = $_GET['cus_add'];
$cusTel = $_GET['cus_tel'];

$sql = $conn ->insert_cart($cusName, $cusAddress, $cusTel, $_SESSION["sumprice"]);


for($i=0; $i <= (int)$_SESSION["intLine"]; $i++){
    if( isset($_SESSION["strProductID"][$i])){
     if(($_SESSION["strProductID"][$i]) != ""){
     $sql1 = $conn ->select_product_by_session($_SESSION["strProductID"][$i]);
     $data1 = mysqli_fetch_array($sql1);
     $price = $data1["pPrice"];
     $total = $_SESSION["strQty"][$i] * $price;

     $sql2 = $conn -> insert_Detail_order($ORDERID,$_SESSION["strProductID"][$i], $price, $_SESSION["strQty"][$i], $total);
     $data2 = mysqli_fetch_array($sql2);  
     if($data2)
    {
        echo "<script> alert('บันทึกข้อมูลเสร็จสิ้น') </script>";
        unset($_SESSION["strQty"][$Line]);

        
    }
     }
    }
}
}
else{
    $ids = $_SESSION['name'];
    echo "<script> alert('SOMETHING ABOUT WRONG') </script>";

    echo "<script>window.location.href='checkout.php?id= $ids' </script>";



;}
?>