<?php
include_once ("connectDB.php");
$conn = new DB_conn;

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Hello, world!</title>
    

  </head>
<!--navbar start-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container ">
      <a class="navbar-brand col-sm-1 p-1 my-3 me-auto" href="#"><img class ="logo "src="../img/otop.jpg" alt=""width="85" height="85"></a>
      <button class="navbar-toggler ms-auto " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show_product.php">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About us</a>
          </li>

        </ul>
        <ul class="navbar-nav ms-auto">
        <li class="nav-item ">

            <a class="nav-link line " href="cart2.php"  >
              <i class="fa-solid fa-cart-shopping"></i>
              <?php
              $_SESSION["Total"] = 0;
              function sum_count(){
              if(isset($_SESSION["intLine"])){   //CHECK
               for($i=0; $i <= (int)$_SESSION["intLine"]; $i++) { ////LOOP สินค้าที่มีตามบรรทัด
                if( isset($_SESSION["strProductID"][$i])){        ////CHECK
                  if(($_SESSION["strProductID"][$i]) != ""){
                    $_SESSION["Total"] = $_SESSION["Total"] + $_SESSION['strQty'][$i];
                      }
                    }
               }
        }
        return $_SESSION["Total"];
        }
    echo sum_count();
?>

          </a>
          </li>
          <li class="nav-item ">
            
            <a class="nav-link " href="logout.php"  onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่')" >Logout</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>


<!--navbar end-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
