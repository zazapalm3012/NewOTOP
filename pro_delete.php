<?php
ob_start();
session_start();

if(isset($_GET["Line"])){
    $Line = $_GET["Line"];
  /*  $_SESSION["strProductID"][$Line] = "";
    $_SESSION["strQty"][$Line] = "";*/
    unset( $_SESSION["strProductID"][$Line] );
    unset($_SESSION["strQty"][$Line]);
    unset($_SESSION["cart"][$Line]);

}

header("location:cart2.php");

  
?>