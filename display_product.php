
<?php
include_once ("navbar_admin.php");
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

<div class="container pt-5">
 <div class="row" >
 <div class="col-lg-8 table-responsive mb-5">
 <table class="table table-bordered text-center mb-0">
 <thead class="bg-secondary text-dark">
 <tr>
 <td colspan="7"><h3>ข้อมูล สินค้า </h3    ></td>
 </tr>
 <tr>
 <th>ลําดับ</th>
 <th>ชื่อ</th>
 <th>ลายละเอียด</th>
 <th>ราคา</th>
 <th>แก้ไข</th>
 <th>ลบ</th>

 </tr>
 </thead>
 <tbody class="align-middle">
 <?php 
 $sql    = $conn->display_product();
 $i =1 ;
 while($data = mysqli_fetch_array($sql)){
    //echo $data['first_name'];?>

 <tr>
 <td class="align-middle"> <?php echo $i; ?></td>
 <td class="align-middle"> <?php echo $data['pName']; ?> </td>
 <td class="align-middle"> <?php echo $data['pDetail']; ?> </td>
 <td class="align-middle"><?php echo $data['pPrice']; ?></td>
 <td class="align-middle"><a href="form_pro_edit.php?id=<?php echo $data['pId']?>" class="btn btn-sm btn-primary"> Edit</a></td> 
 <td class="align-middle"><a href="del_product.php?id=<?php echo $data['pId']?>" class="btn btn-sm btn-primary" onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่')"><i class="fa fa-times"></i></a></td>
</tr>

 <?php  $i= $i+1;}?>

 </tbody>
 </table>
 </div>

 </div>
 </div> 
 </body>
 </html>
