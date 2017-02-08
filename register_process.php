<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'database.php';
if(!empty($_POST["username"])) {
	//Check for duplicate email/username.
	$db = new Database();
	$result = $db->querySingle("SELECT * FROM users WHERE username='".$_POST["username"]."';");
	if(!empty($result)) {
		header("Location:register.php?err=1");
		exit();
	}
	$result = $db->querySingle("SELECT * FROM users WHERE email='".$_POST["email"]."';");
	if(!empty($result)) {
		header("Location:register.php?err=2");
		exit();
	}
	
	$salt = sha1("B");
	$encPass = sha1($salt."--A");
	$db->exec("INSERT INTO users(username, pass, salt, email)
		VALUES('".$_POST["username"]."','".$encPass."','".$salt."','".$_POST["email"]."');");
	header("Location:index.php");
	exit();
	
}
?>
<html>
<body>
An error has occured, click <a href="index.php">here</a> to return to the index page.
</body>
</html>
