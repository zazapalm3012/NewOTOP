
<?php
session_start();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    

</head>

<body>
    <?php
    include_once('navbar_index.php');
?>
<div class="container">
    <form id="form1" method= "get" action="">
    <div class="row">
        <div class = "col-md-10">
            <table class="table table-hover">
                <tr>
                    <th>ลำดับที่</th>
                    <th>ชื่อ</th>
                    <th>ราคา</th>
                    <th>จำนวน</th>
                    <th>ราคารวม</th>
                </tr>
                <?php
                
                $id =  $_GET['id'];
                $sql = $conn->select_product_by_id($id);
                //$result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($sql);
                
                $Total=0;
                $sumprice = 0;
                $m=1;
                for($i=0; $i <= (int)$_SESSION["intLine"]; $i++){
                   
                    if(($_SESSION["strProductID"][$i]) != ""){
                $sql1 = $conn->select_product_by_session($_SESSION["strProductID"][$i]);
                 
                        //$result1 = mysqli_query($conn, $sql1);
                        $row_pro = mysqli_fetch_array($sql1);

                       $_SESSION["price"] = $row_pro['pPrice'];
                        $Total = $_SESSION["strQty"][$i];
                        $sum = $Total * $row_pro['pPrice'];
                        $sumprice +=$sum;
                ?>
              <tr>
                <td><?=$m?></td>
                <td><?=$row_pro['pName']?></td>
                <td><?=$row_pro['pPrice']?></td>
                <td><?=$_SESSION["strQty"][$i]?></td>
                <td><?=$sumprice?></td>
                <td>
                    <a href="order.php?id=<?=$row_pro['pId']?>" class= "btn btn-outline-primary">+</a>
                    <a href="order_del.php" class= "btn btn-outline-primary">-</a>
                    
                </td>
            </tr>
            <?php
            $m+=1;
                }
                }
                ?>
            </table>
        </div>
    </div>


    </form>
    
</div>


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


      <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>