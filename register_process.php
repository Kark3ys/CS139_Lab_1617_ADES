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
	$stmt = $db->prepare("SELECT * FROM users WHERE username=:user");
	$stmt->bindValue(":user", $html_free_user, SQLITE3_TEXT);
	$sqlResult = $stmt->execute();
	$result = $sqlResult->fetchArray();
	if(!empty($result)) {
		header("Location:register.php?err=1");
		exit();
	}
  
	$stmt = $db->prepare("SELECT * FROM users WHERE email=:email");
	$stmt->bindValue(":email", $html_free_email, SQLITE3_TEXT);
	$sqlResult = $stmt->execute();
	$result = $sqlResult->fetchArray();
	if(!empty($result)) {
		header("Location:register.php?err=2");
		exit();
	}
	$html_free_pass='A'; /*Take this out later*/
	$salt = sha1(time());
	$encPass = sha1($salt."--".$html_free_pass);
	$stmt = $db->prepare("INSERT INTO users(username, pass, salt, email)
		VALUES(:user, :pass, :salt, :email);");
	$stmt->bindValue(":user", $html_free_user, SQLITE3_TEXT);
	$stmt->bindValue(":pass", $encPass, SQLITE3_TEXT);
	$stmt->bindValue(":salt", $salt, SQLITE3_TEXT);
	$stmt->bindValue(":email", $html_free_email, SQLITE3_TEXT);
	$stmt->execute();
	$result = $db->lastInsertRowID();
	session_start();
	$_SESSION["uid"] = $result;
	header("Location:folder.php");
	exit();
	
}
?>
<?php include wrongTurn.php?>
