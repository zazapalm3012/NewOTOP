<?php
include_once("connectDB.php");

$conndb = new DB_conn;  //สร้าง obj ชื่อ $conndb
$con = $conndb->conn;   //การดข้าถึงตัวแปรใน class ตั้งชื่อเป็น $conn
#------ทำการรับค่าจากหน้าสมัครสมาชิก-------------#
$error = array();

if(($_POST['fname']) != "" and ($_POST['lname']) != "" and ($_POST['email']) != "" and ($_POST['username']) != "" and ($_POST['password']) != "" and     ($_POST['rdType']) != "" ){
                if(isset($_POST['sendButton'])){
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $mname = $_POST['mname'];
                    $email = $_POST['email'];
                    $user = $_POST['username'];
                    $pass = $_POST['password'];
                    $type = $_POST['rdType'];
                    $query = "select username from member where username =  '$user' ";
                    $query2 = "select email from member where email =  '$email' ";
                    $result = mysqli_query($con ,$query);
                    $result2 = mysqli_query($con ,$query2);

                    if(mysqli_num_rows($result) > 0){
                        echo "<script>alert('Username นี้มีคนใช้แล้ว') </script>";
                        echo "<script>window.location ='register.php' </script>";
                    }
                    if(mysqli_num_rows($result2) > 0){
                        echo "<script>alert('Email นี้มีคนใช้แล้ว') </script>";
                        echo "<script>window.location ='register.php' </script>";
                    }
                    
                    else{
                        if(($_POST['fname']) != ""){
                            array_push($error,"Your Firstname is required");
                        }
                        if(($_POST['lname']) != ""){
                            array_push($error,"Your Lastname is required");
                        }
                        if(($_POST['mname']) != ""){
                            array_push($error,"Your email is required");
                        }
                        if(($_POST['email']) != ""){
                            array_push($error,"Your user is required");
                        }
                        if(($_POST['username']) != ""){
                            array_push($error,"Your password is required");
                        }
                        if(($_POST['password']) != ""){
                            array_push($error,"Your pastypesword is required");
                        }
                        if(($_POST['rdType']) != ""){
                            array_push($error,"Your rdType is required");
                        }
                        if(count($error) == 0){
                            $sql = $conndb -> check_login($user,$pass);
                            if(mysqli_num_rows($sql) == 1){
                                $data = mysqli_fetch_array($sql);
                                $_SESSION['name'] = $data ['first_name'];
                                echo "<script>alert('Your login successfully') </script>";
                                echo "<script>window.location ='index.php' </script>";
                                
                            }
                            else
                            {
                                array_push($error,"WRONG username or password");
                                echo "<script>alert('Your username or password is incorrect') </script>";   
                                echo "<script>window.location ='login.php' </script>";
                            }
                        }
                        echo $fname;
                        $sql = $conndb->insert_member($fname,$lname,$mname,$email,$user,$pass,$type);
                    //$sql = $conndb->insert_member();
    
                    if(mysqli_query($con,$sql)){
                        printf(" %d Row inserts.\n", mysqli_affected_rows($con));
                        echo "<script>alert('Register successfully') </script>";
    
        echo "<script>window.location ='register.php' </script>";  
    
                    }
                    }
    }
    
    else{
        echo "<script>alert('กรุณาลองใหม่อีกครั้ง') </script>";
        echo "<script>window.location ='register.php' </script>";  
    }
    
                    }

                    
mysqli_close($con);
?>