<?php
require_once('class/engine.php');

$engine = new engine();
	$authID = $_GET['id'];
	$sucess = $engine->del('users', $authID);
	if ($sucess) {
		echo "<script>
		alert('deleted!');
		setTimeout(function(){
			window.location.href = './course.php';
		}, 2000);
		</script>";
	}else{
		header('location: signout.php');
	}
?>