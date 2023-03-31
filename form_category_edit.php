<?php
include_once ("connectDB.php");
$conn = new DB_conn;
$sql = $conn->display_category_edit($_GET['id']);
while($data = mysqli_fetch_array($sql)){
 $cName = $data['c_name'];
}
$id = $_GET['id'];
 if(isset($_POST['edit'])){
 $cate_name = $_POST['c_name'];
 $sql = $conn->edit_category($cate_name,$id);
 echo $sql;
 if($sql){
 echo "<script>alert('บันทึกข้อมูลสําเร็จ')</script>";
 echo "<script>window.location.href='display_category.php' </script>";
 } else {
 echo "<script>alert('เกิดข้อผิดพลาด')</script>"; 
 }  
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container"> 
  <h3 class="mt-5">แก้ไขข้อมูลประเภทสินค้า</h3>
  <form method="POST">
    <div class="mb-3">
    <label for="fname" class="form-label">ชื่อประเภทสินค้า:</label>
    <input type="text" class="form-control" id="c_name" name="c_name" value= <?php echo $cName ;  ?> >
    </div>

    <button type="submit" class="btn btn-primary " id="edit" name="edit">บันทึกการเปลี่ยนแปลง</button>
  </form>
  
</div>
<body>