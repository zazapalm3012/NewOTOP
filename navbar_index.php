<?php
include_once ("connectDB.php");

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
            <a class="nav-link active" aria-current="page" href="show_product.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="session_destroy.php">sessionkill</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About us</a>
          </li>

        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item line">
            <a class="nav-link " href="register.php"  aria-disabled="true">Sign up</a>
          </li>

          <li>
            <a class="nav-link " href="login.php"  aria-disabled="true">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


<!--navbar end-->