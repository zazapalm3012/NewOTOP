<?php
include_once ("connectDB.php");
$conn = new DB_conn;

function component($pName, $pDetail, $pPrice, $pImage, $pId){
    $element = '
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
                <form action="#" method="POST">
                <div class="col">
                    <div class="card">
                        <img src="'.$pImage.' ">
                            <div class="card-body">
                            <h5 class="card-title">'.$pName.'</h5>
                            <p class="card-text">asdadasdasdasd</p>
                            <input type="hidden" name="pId" value="'.$pId.'">
                            <button  name="p_add" class ="btn btn-primary " href="order.php?id="'.$pId.'">สั่งซื้อสินค้า</button>
                           
                            </div>
                    </div>
                </div>
              </form>
            </div>';
        
           return $element;
}
?>