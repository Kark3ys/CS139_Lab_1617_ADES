<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'database.php';

//Removing special cahracters from inputs:
require "security.php";
$html_free_user = h($_POST["username"]);
$html_free_email = h($_POST["email"]);
$html_free_emailc = h($_POST["emailc"]);
$html_free_pass = h($_POST["pass"]);

if(!empty($html_free_user)) {
	//Check for duplicate email/username.
	$db = new Database();
	$result = $db->querySingle("SELECT * FROM users WHERE username='".$html_free_user."';");
	if(!empty($result)) {
		header("Location:register.php?err=1");
		exit();
	}
	$result = $db->querySingle("SELECT * FROM users WHERE email='".$html_free_email."';");
	if(!empty($result)) {
		header("Location:register.php?err=2");
		exit();
	}
	
	$salt = sha1("B");
	$encPass = sha1($salt."--A");
	$db->exec("INSERT INTO users(username, pass, salt, email)
		VALUES('".$html_free_user."','".$encPass."','".$salt."','".$html_free_email."');");
	$result = $db->lastInsertRowID();
	session_start();
	$_SESSION["uid"] = $result;
	header("Location:folder.php");
	exit();
	
}
?>
<html>
<?php include wrongTurn.php?>
