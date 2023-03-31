<?php
include_once ("connectDB.php");
$conn = new DB_conn;


?>

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
            <a class="nav-link" href="#">Product</a>
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
              
              function sum_count(){
                  $Total =0;
              if(isset($_SESSION["intLine"])){   //CHECK
               for($i=0; $i <= (int)$_SESSION["intLine"]; $i++) { ////LOOP สินค้าที่มีตามบรรทัด
                if( isset($_SESSION["strProductID"][$i])){        ////CHECK
                  if(($_SESSION["strProductID"][$i]) != ""){
                    $Total = $Total + $_SESSION['strQty'][$i];
                      }
                    }
               }
        }
        return $Total;
        }
    echo sum_count();
      

?>
 
          
          </a>
          </li>
          <li class="nav-item ">
            
            <a class="nav-link " href="logout.php"  >Logout</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>


<!--navbar end-->