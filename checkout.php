<?php
session_start();
include_once("navbar.php");
include_once("connectDB.php");
$conn = new DB_conn;
$name  = $_POST['id'];
$sql = $conn -> autofill_name($name);
while($data = mysqli_fetch_array($sql)){
    $f_name = $data['first_name'];
    $l_name = $data['last_name'];
    $e_mail = $data['email'];
    $u_name = $data['username'];
    $t_ype = $data['type'];
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
  
<form id="form1" method= "PORT" action="insert_cart.php" enctype="multipart/form-data" >
<div class="row justify-content-sm-left mt-2 ms-4 col-11 ">
    <div class = "col-md-5 ms-auto">
        ชื่อ-นามสกุล:
        <div class="control-group">
        <input type="text" name="cus_name" class = "form-control mb-2 " required placeholder="ชื่อ-นามสกุล ..."
        value="<?php echo $f_name," ",$l_name?>" readonly>
        </div>
        ที่อยู่สำหรับการจัดส่ง:
        <div class="control-group">
        <textarea class = "form-control mt-2 " required placeholder="ที่อยู่..." name="cus_add" id="cus_add" rows="10"></textarea>
        </div>
        เบอร์โทรศัพท์:
        <div class="control-group">
        <input type="number" name="cus_tel" id="cus_tel" class = "from-control mt-3" required placeholder="เบอร์โทรศัพท์ ...">
        </div>
        <br><br>
        <button class="btn btn-primary py-2 px-4" type="submit" name ='sendcart' id="sendcart">เข้าสู่ระบบ</button>
        </form>
    </div>

    </form>
    <div class = "col-md-5 ms-auto mt-4">
            <table class="table table-hover">
                <tr>
                    <th>ลำดับที่</th>
                    <th>ชื่อ</th>
                    <th>ราคา</th>
                    <th>จำนวน</th>
                    <th>ราคารวม</th>
                </tr>
                <?php
                $Total=0;
                $sumprice = 0;
                $m=1;
                if(isset($_SESSION["intLine"]) ){

                for($i=0; $i <= (int)$_SESSION["intLine"]; $i++){
                   if( isset($_SESSION["strProductID"][$i])){
                    if(($_SESSION["strProductID"][$i]) != ""){
                    $sql1 = $conn->select_product_by_session($_SESSION["strProductID"][$i]);
                 
                        //$result1 = mysqli_query($conn, $sql1);
                        $row_pro = mysqli_fetch_array($sql1);

                       $_SESSION["price"] = $row_pro['pPrice'];
                        $Total = $_SESSION["strQty"][$i];
                        $sum = $Total * $row_pro['pPrice'];
                        $sumprice  =$sumprice + $sum;
                ?>
              <tr>
                <td><?=$m?></td>
                <td><?=$row_pro['pName']?></td>
                <td><?=$row_pro['pPrice']?></td>
                <td><?=$_SESSION['strQty'][$i]?></td>
                <td><?=$sum?></td>
            </tr>
            <?php
            $m+=1;
                }
                }
            }
        }
        else{
            echo "<script> alert('asdasdasd'); </script>";
            echo "<script>window.location.href='index.php' </script>";

        }
                ?>
            </table>
            
        </div>
    
</div>
</body>
</html>