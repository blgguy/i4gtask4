<?php 
require_once('header.php');

if (isset($_POST['passReset'])) {
  $currentPass    = $mainPass;
  $pass0          = $_POST['password0'];
  $pass           = $_POST['password'];
  $password       = password_hash(sentize($pass), PASSWORD_DEFAULT);

  if (empty($pass0) || empty($pass)) {
    $message  =  "<b style='color:red;'>please fill the require fields</b>";
  }else{
    //$verifyPass = password_verify($pass, $currentPass);
    if ($pass !== $pass0) {
      $message = "<b style='color:red;'>password not match!</b>";
    }else{     
      // update database
      $data = array(  
          'password'    =>  $password,      
      );
      $updated  = $engine->update('users', $data, $mainID);
      if ($updated) {
        $message  =  "<b style='color:green;'>You Successfully change your password</b>";
      }else{
        $message  =  "<b style='color:red;'>having some error!</b>";
      }
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

    <title>Password Reset Page | I4G_Training Task 04</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
        <div class="d-grid gap-2 d-md-block">
            <a href="dashboard.php"><button class="btn btn-success" type="button">Dashboard</button></a>
        </div>
        </div>
        <div class="col-md-8">
            <div align="center">
            <?php 
                if( (isset($message)) && ($message!='') ):
                echo '<p>'.$message.'</p>';
                endif;
            ?>
            </div>
            <form method="post">
                <h6 class="heading-small text-muted mb-4">Edit password</h6>
                <div class="col-lg-6">
                    <div class="form-group">
                    <label class="form-control-label" for="input-pass">password</label>
                    <input type="password" name="password0" id="input-pass" class="form-control form-control-alternative" placeholder="******">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                    <label class="form-control-label" for="input-pass">Verify password</label>
                    <input type="password" name="password" id="input-pass" class="form-control form-control-alternative" placeholder="******">
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-md" name="passReset">Reset Password</button>
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