<?php
include_once ("connectDB.php");
$conn = new DB_conn;
$category_name = $_POST['name'];

                $sql = $conn->insert_category($category_name,); 
                    if($sql){
                        echo "<script>alert('บันทึกข้อมูลของท่านเรียบร้อยแล้ว')</script>";
                        echo "<script>window.location='display_category.php'</script>";
                        }
                        else 
                        {
                        echo "<script>alert( Error: " . $sql . ":-" . mysqli_error($conn).")</script>";
                        }
           
?>
