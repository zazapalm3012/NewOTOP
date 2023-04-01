<?php
DEFINE("DB_SERVER","localhost");
DEFINE("DB_USERNAME","root");
DEFINE("DB_PASSWORD","");
DEFINE("DB_NAME","otop");

class DB_conn{
    function __construct(){
        $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

        if($conn ===false)
        {
            die("ERROR:Could not connect database". mysqli_connect_error());
        }
        else
        {
        //echo "Connect success!!";
        }
        $this->conn = $conn;
        
    }
    public function select_all_by_id(){
        $str = mysqli_query($this->conn, "SELECT * FROM product order by pId");
                return $str;
    }
    public function select_product_by_id($pId){
        $str = mysqli_query($this->conn, "SELECT * from product where pId = '$pId'");
                return $str;
    }
    public function select_product_by_session($pId){
        $str = mysqli_query($this->conn, "select * from product where pId = '" . $pId."' ");
                return $str;
    }

    function insert_member($fname,$lname,$mname,$email,$username,$password,$type){
        $sql = "INSERT INTO member(first_name, last_name, middle_name, email, username, password, type)
        VALUES ('$fname', '$lname',' $mname', '$email', '$username', '$password', '$type')";
        return($sql);
    }

    public function display_member(){
        $str = mysqli_query($this->conn,"SELECT * from member");
        return $str;
        }
    public function display_product(){
        $str = mysqli_query($this->conn,"SELECT * from product");
        return $str;
        }
        public function display_category(){
            $str = mysqli_query($this->conn,"SELECT * from category");
            return $str;
            }
    
    public function edit_member($fname, $lname,$email,$id ){
        $str = mysqli_query($this->conn,"UPDATE member SET first_name = '$fname', last_name ='$lname',email = '$email' WHERE member_id = $id ");
        return $str;
    }
    public function edit_product($pname, $dtail,$Pprice,$id ){
        $str = mysqli_query($this->conn,"UPDATE product SET pName = '$pname', pDetail ='$dtail',pPrice = '$Pprice' WHERE pId = $id ");
        return $str;
    }
    public function edit_category($cate_name,$id ){
        $str = mysqli_query($this->conn,"UPDATE category SET c_name = '$cate_name' WHERE c_id = $id ");
        return $str;
    }

    public function del_member($id) {
        $str = mysqli_query($this->conn,"DELETE FROM member WHERE member_id = $id ");
        return $str;
    }
    public function del_product($id) {
        $str = mysqli_query($this->conn,"DELETE FROM product WHERE pId = $id ");
        return $str;
    }
    public function del_category($id) {
        $str = mysqli_query($this->conn,"DELETE FROM category WHERE c_id = $id ");
        return $str;
    }
    public function registration($fname, $lname,$email, $uname,$password,$type){
        $str = mysqli_query($this->conn, "INSERT INTO member (first_name,last_name,email,username,password,type)
        VALUES ('$fname','$lname','$email','$uname','$password','$type')");
        return $str;
        }
    
        public function display_member_edit($id){
        $str = mysqli_query($this->conn,"SELECT * from member where member_id = $id");
        return $str;    
        }
        public function display_product_edit($id){
            $str = mysqli_query($this->conn,"SELECT * from product where pId = $id");
            return $str;    
            }
            public function display_category_edit($id){
                $str = mysqli_query($this->conn,"SELECT * from category where c_id = $id");
                return $str;    
                }
        public function select_category(){
            $strSQL = "SELECT * FROM category ORDER BY c_name ASC";
            $str = mysqli_query($this->conn, $strSQL);
            return $str;
            }

        public function insert_product($p_name,$p_detail,$p_price,$p_category,$path_img){
            $strSQL = "INSERT INTO product (pName, pDetail, pPrice, c_id, pImage)
            values ('$p_name', '$p_detail',$p_price,$p_category,'$path_img')"; 
            $str = mysqli_query($this->conn,$strSQL); 
            return $str;
            }
            public function insert_category($category_name){
                $strSQL = "INSERT INTO category (c_name)
                values ('$category_name')"; 
                $str = mysqli_query($this->conn,$strSQL); 
                return $str;
                }

            public function check_login($uname,$password){
                $str = mysqli_query($this->conn, "SELECT member_id, first_name, last_name
                from member where username = '$uname' and password = '$password' ");
                return $str;
            }

            public function select_all_product(){
                $str = mysqli_query($this->conn, "SELECT * from product ");
                return $str;
            }


            public function delete_product_by_id($product_id){
                $str = mysqli_query($this->conn, "DELETE from product where pId in (". implode(',', $product_id) . ")");
                return $str;
            }
            function addToCart($product_id, $quantity) {
                if(isset($_SESSION['cart'][$product_id])) {
                  $_SESSION['cart'][$product_id] += $quantity;
                } else {
                  $_SESSION['cart'][$product_id] = $quantity;
                }
              }
              function autofill_name($name){
                $str = mysqli_query($this->conn, "SELECT * from member where first_name = '$name'");
                  return $str;
          }
          function select_order_id (){
            $str = mysqli_query($this -> conn , "select * from tb_order");
            return $str;
          }
          function insert_cart($cus_name, $addess, $tel, $total){
            $str = mysqli_query($this->conn, "insert into tb_order(cus_name,address,telephone,total_price,order_status)
            values('$cus_name','$addess','$tel',' $total ','1')");
                  return $str;
          }
          function insert_Detail_order($oId,$proId,$oPrice,$oQty,$Total){
            $str = mysqli_query($this->conn, "insert into order_detail(orderID,pro_id,orderPrice,orderQty,Total)
            values('$oId',' $proId ','$oPrice',' $oQty ','$Total'");
              return $str;
          }
          function select_order_Npay(){
            $str = mysqli_query($this->conn, "select COUNT(orderID) AS order_no from tb_order where order_status ='1'");
              return $str;
          }
             
}
?>