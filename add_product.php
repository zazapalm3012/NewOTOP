<?php
/*
ณัฐนนท์ ชมภูนุช 6430200213
*/
include_once ("connectDB.php");
$conn = new DB_conn;
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
    <link href="../css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
    <!--Header-->

<div class="container">
 <h3 class="mt-5">เพิ่มข้อมูลสินค้า</h3>
 <form method="POST" action = "insert_product.php" enctype="multipart/form-data">
 <div class="mb-3">
 <label class="form-label">ชื่อสินค้า:</label>
 <input type="text" class="form-control" id="name" name="name">
 </div>
 <div class="mb-3">
 <label class="form-label">รายละเอียดสินค้า:</label>
 <input type="text" class="form-control" id="detail" name="detail">
 </div>
 <div class="mb-3">
 <label class="form-label">ราคา: </label>
 <input type="text" class="form-control" id="price" name="price">
 </div>
 <div class="mb-3">
 <label class="form-label">รูปภาพสินค้า</label>
 <input type="file" class="form-control" id="picture" name="picture">
 </div>
 <div class="mb-3">
 <select class="form-control" name="category" id="category ">
 <option value=""><-- กรุณาเลือกประเภท --></option>
 <?php
 $sql = $conn->select_category();
 while($data = mysqli_fetch_array($sql)){
 ?>
 <option value="<?php echo $data['c_id'];?>" > <?php echo $data['c_name'];?> </option>
 <?php
 }
 ?>
 </select>
 </div>
 <button type="submit" class="btn btn-primary" id="submit" name="submit">บันทึกข้อมูลสินค้า </button>
 </form>
 </div>


</body>
</html>