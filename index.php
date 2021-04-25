<?php 
require_once('class/engine.php');
$engine     = new engine();
$courses   = $engine->view('courses');
session_start();

if(isset($_POST['loginBtn'])) {
    $userid 	= sentize($_POST['userId']);
    $pass 		= sentize($_POST['password']);
        
    if(empty($userid) || empty($pass)) {
        $message = 'UserId or Password can not be empty!<br>';
    } else {
        $logIn = $engine->login($userid);
        
        if($logIn){
            foreach($logIn as $row) { 
                $dbPassword = $row['password'];
            }
            $verifyPass = password_verify($pass, $dbPassword);
            if (!$verifyPass) {
              $message = 'Password is wrong!<br>';
            }else{     
              $_SESSION['i4gTrainigTask4[87656578996879g'] = $row;
              header("location: ./dashboard.php");
            }
        }else{
            $message = "Account doesn't exist! <br>";
            //return $message;
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
          if( (isset($message)) && ($message !='') ):
            echo '<p>'.$message.'</p>';
          endif;
        ?>
        </div>

        <form method="post" action="">
          <div class="form-group">
            <label for="exampleInputEmail1">Username / Email address</label>
            <input name="userId" type="text" class="form-control" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" placeholder="Password">
          </div>
          <button type="submit" name="loginBtn" class="btn btn-success">SignIn</button>
          <a href="signup.php">regNo</a>
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
                  