<?php
/*
ณัฐนนท์ ชมภูนุช 6430200213
*/
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
    
    public function edit_member($fname, $lname,$email,$id ){
        $str = mysqli_query($this->conn,"UPDATE member SET first_name = '$fname', last_name ='$lastname',email = '$email' WHERE member_id = $id ");
        return $str;
    }

    public function del_member($id) {
        $str = mysqli_query($this->conn,"DELETE FROM member WHERE member_id = $id ");
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

}
?>