<?php
ob_start();
session_start();

include_once ("connectDB.php");
$conn  = new DB_conn;
$ids = $_GET["id"];


if(!isset($_SESSION["intLine"]))    //เช็คว่าแถวเป็นค่าว่างมั๊ย ถ้าว่างให้ทำงานใน {}
{
	 $_SESSION["intLine"] = 0;
	 $_SESSION["strProductID"][0] = $_GET["id"];   //รหัสสินค้า
	 $_SESSION["strQty"][0] = 1;                   //จำนวนสินค้า
	 $_SESSION["cart"][0] = 1;                   //จำนวนสินค้า
	header("location:cart2.php");
}
else
{
	if(isset($_SESSION["strProductID"])){
	$key = array_search($_GET["id"], $_SESSION["strProductID"]);
	}
	if((string)$key != "")
	{
		 $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + 1;
		 $_SESSION["cart"][$key] = $_SESSION["cart"][$key] + 1;


	}
	else
	{
		 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		 $intNewLine = $_SESSION["intLine"];
		 $_SESSION["strProductID"][$intNewLine] = $_GET["id"];
		 $_SESSION["strQty"][$intNewLine] = 1;
		 $_SESSION["cart"][$intNewLine] = 1;

	}
	header("location:cart2.php");
}


?>