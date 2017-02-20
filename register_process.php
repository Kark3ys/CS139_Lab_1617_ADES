<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'database.php';
if(!empty($_POST["username"])) {
	//Check for duplicate email/username.
	$db = new Database();
	$stmt = $db->prepare("SELECT * FROM users WHERE username=:user");
	$stmt->bindValue(":user", $_POST["username"], SQLITE3_TEXT);
	$sqlResult = $stmt->execute();
	$result = $sqlResult->fetchArray();
	if(!empty($result)) {
		header("Location:register.php?err=1");
		exit();
	}
	$stmt = $db->prepare("SELECT * FROM users WHERE email=:email");
	$stmt->bindValue(":email", $_POST["email"], SQLITE3_TEXT);
	$sqlResult = $stmt->execute();
	$result = $sqlResult->fetchArray();
	if(!empty($result)) {
		header("Location:register.php?err=2");
		exit();
	}
	
	$salt = sha1(time());
	$encPass = sha1($salt."--A");
	$stmt = $db->prepare("INSERT INTO users(username, pass, salt, email)
		VALUES(:user, :pass, :salt, :email);");
	$stmt->bindValue(":user", $_POST["username"], SQLITE3_TEXT);
	$stmt->bindValue(":pass", $encPass, SQLITE3_TEXT);
	$stmt->bindValue(":salt", $salt, SQLITE3_TEXT);
	$stmt->bindValue(":email", $_POST["email"], SQLITE3_TEXT);
	$stmt->execute();
	$result = $db->lastInsertRowID();
	session_start();
	$_SESSION["uid"] = $result;
	header("Location:folder.php");
	exit();
	
}
?>
<?php include wrongTurn.php?>
