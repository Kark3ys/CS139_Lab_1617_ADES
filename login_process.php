<?php
require "database.php";
$db = new Database();
if(!empty($_POST["email"])) {
	$result = $db->querySingle("SELECT * FROM users WHERE email='".$_POST["email"]."'");
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
