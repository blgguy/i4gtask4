<?php
require_once('class/engine.php');

$engine     = new engine();

session_start();

$con = new mysqli("localhost", "root", "", "farmKonect");
if ($con->connect_errno) {
    echo "Failed to connect (".$con->connect_errno.")".$con->connect_error;
}
$error_message='';

	if(isset($_POST['logoon'])) {

		$userid 	= sentize($_POST['email']);
		$pass 		= sentize($_POST['password']);
	        
	    if(empty($userid) || empty($pass)) {
	        $error_message = 'Email and/or Password can not be empty<br>';
	    } else {
	    	$sql = "SELECT * FROM users WHERE email = '$userid' && is_verified = 1";
	        $query = $con->query($sql);
	        //$rows = $query->fetch_array();

	            if($query->num_rows > 0){
	                foreach($query as $row) { 
	                    $row_password = $row['password'];
	                }

	                if( $row_password != md5($pass) ) {
	                    $error_message = 'Password does not match<br>';
	                } else { 
	                //echo "you're good to go";      
						$_SESSION['farmkonectuser'] = $row;
	                    header("location: ./board");
	                }
	            }else{
	                $error_message = 'Email Address does not match<br>';
	                //return $error_message;
	            }
		}
	}

if (isset($_POST['requestBtn'])) {
    $fullName       =   sentize($_POST['fullName']);
    $email          =   sentize($_POST['email']);
    $password       =   sentize($_POST['password']);
    $password       =   md5($password);
    $userType       =   sentize($_POST['userType']);

    if (empty($fullName) || empty($email) || empty($password) || empty($userType)) {
        echo "please fill the require fields";
    }else{
        $data = array(  
            'fullname'      =>  $fullName,
            'email'         =>  $email,      
            'password'      =>  $password,  
            'userType'      =>  $userType,    
        );
        $insert = $engine->Insert('users', $data);
        if (!$insert) {
            echo "Sorry! <br>Having issue Registration come back later, Thank you.";
        }else{
            echo "You Successfully Register click <a href='src/login.php' style='font-size:18px; color: #fff font-weight: bolder;'>here</a> to Login";
        }
    }
}

?>