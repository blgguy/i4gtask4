<?php
require_once('class/engine.php');
$engine = new engine();

$id = $_GET['id'];
$delete = $engine->del('courses', $id);
if ($delete) {
	echo "<script>
	alert('deleted!');
	setTimeout(function(){
		window.location.href = './dashboard.php';
	}, 1000);
	</script>";
}else{
	header('location: signout.php');
}
?>