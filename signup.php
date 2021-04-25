<?php
require_once('class/engine.php');

$engine     = new engine();
$error_message='';

if (isset($_POST['signUpBtn'])) {
    $fname          =   sentize($_POST['f_name']);
    $lname          =   sentize($_POST['l_name']);
    $email          =   sentize($_POST['email']);
    $password       =   password_hash($_POST['password'], PASSWORD_DEFAULT);
    $password       =   sentize($password);

    if (empty($fname) || empty($fname) || empty($email) || empty($password)) {
        echo "please fill the require fields";
    }else{
        $data = array(  
          'fname'      =>  $fname,
          'lname'      =>  $lname,      
          'email'      =>  $email,  
          'username'   =>  rand(23457647, 86398735),
          'password'   =>  $password,      
          'ip'         =>  '23.4.56.7.8',  
          'browser'    =>  'chrome',      
        );
        $insert = $engine->Insert('users', $data);
        if (!$insert) {
            echo "Sorry! <br>Having issue Registration come back later, Thank you.";
        }else{
            echo "You Successfully Register click <a href='index.php' style='font-size:18px; color: #fff font-weight: bolder;'>here</a> to Login";
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
        if( (isset($error_message)) && ($error_message!='') ):
          echo '<p>'.$error_message.'</p>';
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
                