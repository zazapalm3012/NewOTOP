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

<div class="col-lg-7 mb-5">
                <div class="contact-form">

                    <form name="loginMember" id="loginMember" action = "check_login.php" method = "POST">

                        <div class="control-group">
                            <input type="text" class="form-control" id="username" name = "username" placeholder="Your Username"
                                required="required" data-validation-required-message="Please enter your Username" />
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="control-group">
                            <input type="password" class="form-control" id="password" name = "password" placeholder="Your password"
                                required="required" data-validation-required-message="Please enter your password" />
                            <p class="help-block text-danger"></p>
                        </div>

                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" name ='login_user' id="login_user">เข้าสู่ระบบ</button>
                        </div>
                    </form>
                </div>
