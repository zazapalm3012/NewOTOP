<?php
session_start();
include_once("navbar.php");
include_once("connectDB.php");
$conn = new DB_conn;
$name  = $_GET['id'];
$sql = $conn -> autofill_name($name);
while($data = mysqli_fetch_array($sql)){
    $f_name = $data['first_name'];
    $l_name = $data['last_name'];
    $e_mail = $data['email'];
    $u_name = $data['username'];
    $t_ype = $data['type'];
    $f_name .= $l_name;
   $fullname =  $f_name ." ". $l_name;
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    

</head>
<body>
<form id="form1" method= "POST" action="">
<div class="row justify-content-md-center mt-2">
    <div class = "col-md-6">
        <div class = "alert alert-success " h4 role alert="alert">
            ข้อมูลสำหรับจัดส่งสินค้า
        </div>
        ชื่อ-นามสกุล:
        <!--
        <input type="text" name="cus_name" class = "form-control mb-2 " disabled value=<?=$f_name ?>>
        -->
        <input type="text" name="cus_name" class = "form-control mb-2 " required placeholder="ชื่อ-นามสกุล ...">
        
        ที่อยู่สำหรับการจัดส่ง:
        <textarea class = "form-control mt-2 " required placeholder="ที่อยู่..." name="cus_add" rows="10"></textarea>
        เบอร์โทรศัพท์:
        <input type="number" name="cus_tel" class = "from-control mt-3" required placeholder="เบอร์โทรศัพท์ ...">
        <br><br>
        <button><a>ยืนยัน</a>
    </div>
</div>
</form>

</body>
