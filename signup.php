<?php 
require_once('class/engine.php');
$engine     = new engine();
$courses   = $engine->view('courses');
session_start();

if (isset($_POST['signUpBtn'])) {
    $fname          =   sentize($_POST['f_name']);
    $lname          =   sentize($_POST['l_name']);
    $email          =   sentize($_POST['email']);
    $password       =   password_hash($_POST['password'], PASSWORD_DEFAULT);
    $password       =   sentize($password);

    if (empty($fname) || empty($fname) || empty($email) || empty($password)) {
        $message = "please fill the require fields";
    }else{
        $data = array(  
          'fname'      =>  $fname,
          'lname'      =>  $lname,      
          'email'      =>  $email,  
          'password'   =>  $password,     
        );
        $insert = $engine->Insert('users', $data);
        if (!$insert) {
          $message = "Sorry! <br>Having issue Registration come back later, Thank you.";
        }else{
          $message = "You Successfully Register click <a href='index.php' style='font-size:18px; color: #fff font-weight: bolder;'>here</a> to Login";
        }
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Dashboard Page | I4G_Training Task 04</title>
  </head>
  <body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-8"></div>
      <div class="col-md-4">

        <div style="background-color: red; color: white;" align="center">
        <?php 
          if( (isset($message)) && ($message!='') ):
            echo '<p>'.$message.'</p>';
          endif;
        ?>
        </div>

        <form method="post" action="">
          <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input name="f_name" type="text" class="form-control" placeholder="Enter your First Name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input name="l_name" type="text" class="form-control" placeholder="Enter your Last Name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input name="email" type="text" class="form-control" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" placeholder="Password">
          </div>
          <button type="submit" name="signUpBtn" class="btn btn-color">SignUp</button>
        </form>
      </div>
      
    </div>
  </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
                