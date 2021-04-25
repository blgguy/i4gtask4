<?php
require_once('class/engine.php');
/**
$hash = 'hgghj46578';
$var = password_verify('123', $hash);
if ($var) {
    // corect
}else{
    // wrong.
}
**/
$engine     = new engine();

session_start();

$error_message='';

if(isset($_POST['loginBtn'])) {
    $userid 	= sentize($_POST['userId']);
    $pass 		= sentize($_POST['password']);
        
    if(empty($userid) || empty($pass)) {
        $error_message = 'UserId or Password can not be empty!<br>';
    } else {
        $logIn = $engine->login($userid);
        
        if($logIn){
            foreach($logIn as $row) { 
                $dbPassword = $row['password'];
            }
            $verifyPass = password_verify($pass, $dbPassword);
            if (!$verifyPass) {
              $error_message = 'Password is wrong!<br>';
            }else{     
              $_SESSION['i4gTrainigTask4[87656578996879g]'] = $row;
              header("location: ./dashboard.php");
            }
        }else{
            $error_message = "Account doesn't exist! <br>";
            //return $error_message;
        }
	}
}
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-8"></div>
    <div class="col-md-4">

      <div style="background-color: red; color: white;" align="center">
      <?php 
        if( (isset($error_message)) && ($error_message !='') ):
          echo '<p>'.$error_message.'</p>';
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
        <button type="submit" name="loginBtn" class="btn btn-color">SignIn</button>
        <a href="signup.php">regNo</a>
      </form>
    </div>
    
  </div>
</div>
                