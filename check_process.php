<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'database.php';

if (!empty($_POST["itemID"])){
	$db = new Database();
	$stmt = $db->prepare("UPDATE items SET checked=:checked WHERE itemID=:iid");
	$checkBool = $_POST["checked"] == "true";
	$stmt->bindValue(":checked", $checkBool, SQLITE3_INTEGER);
	$stmt->bindValue(":iid", $_POST["itemID"], SQLITE3_INTEGER);
	$result = $stmt->execute();
	if ($result) {
		$output = true;
	} else {
		$output = false;
	}
	
	echo " - Recieved Data: ";
	echo var_dump($_POST);
	echo "<br \> - Query Complete: ".$output;
	
} else {
	include "wrongTurn.php";
}
?>