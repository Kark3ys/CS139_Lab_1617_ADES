<?php
require 'database.php';
$db = new Database();
if(!empty($_POST["email"])) {
	$stmt = $db->prepare("SELECT * FROM users WHERE email=:email;");
	$stmt->bindValue(":email", $_POST["email"], SQLITE3_TEXT);
	$sqlResult = $stmt->execute();
	$result = $sqlResult->fetchArray();
	if(!empty($result)) {
		if(sha1($result["salt"]."--".$_POST["pass"]) == $result["pass"]) {
			session_start();
			$_SESSION["uid"] = $result["userID"];
			header("Location:folder.php");
			die();
		}
	}
	
	header("Location:login.php?err=1");
	die();
	
}
?>
<?php include "wrongTurn.php"; ?>
