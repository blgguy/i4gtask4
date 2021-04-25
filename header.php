<?php
require_once('class/engine.php');
$engine     = new engine();
$courses   = $engine->view('courses');
session_start();

if(!isset($_SESSION['i4gTrainigTask4[87656578996879g'])) {
  header('location: ./signout.php');
  exit;
}
$mainID       = $_SESSION['i4gTrainigTask4[87656578996879g']['id'];
$mainName     = $_SESSION['i4gTrainigTask4[87656578996879g']['fname'].' '.$_SESSION['i4gTrainigTask4[87656578996879g']['lname'];
$mainemail    = $_SESSION['i4gTrainigTask4[87656578996879g']['email'];
$mainPass     = $_SESSION['i4gTrainigTask4[87656578996879g']['password'];

?>