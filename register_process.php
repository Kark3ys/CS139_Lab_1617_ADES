<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'database.php';
if(!empty($_POST["username"])) {
	//Check for duplicate email/username.
	$db = new Database();
	if(!empty($db->querySingle("SELECT userID FROM users 
			WHERE username='".$_POST["username"]."';"))) {
		header("Location:register.php?err=1");
	} elseif(!empty($db->querySingle("SELECT userID FROM users 
			WHERE email='".$_POST["email"]."';"))) {
		header("Location:register.php?err=2");
	} else {
		$salt = sha1("B");
		$encPass = sha1($salt."--A");
		$db->exec("INSERT INTO users(username, pass, salt, email) 
			VALUES(".$_POST["username"].",".$encPass.",".$salt.",".$_POST["email"].");");
		header("Location:index.php");
	}
}
?>
<html>
<body>
An error has occured, click <a href="index.php">here</a> to return to the index page.
</body>
</html>