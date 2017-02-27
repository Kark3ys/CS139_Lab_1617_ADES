<?php
session_start();

error_reporting(E_ALL);
ini_set(“display_errors”, 1);
require_once 'database.php';
$db = new Database();

$stmt = $db->prepare("SELECT lists.listID FROM lists 
INNER JOIN listRel ON lists.listID=listRel.listID
INNER JOIN users ON listRel.userID=users.userID
WHERE listRel.userID=:uid AND lists.listID=:lid;");
$stmt->bindValue(":uid", $_SESSION['uid'], SQLITE3_INTEGER);
$stmt->bindValue(":lid", $_POST['lid'], SQLITE3_INTEGER);

$results = $stmt->execute();
$result = $results->fetchArray();


//FetchArray() will return an appropriate array, OR false IF NONE TO RETURN - therefore we can establish if a user has permission as follows:
$permission=true;
//var_dump($result);
/*if (empty($result)) { 
	$permission=false;
}*/
if ($permission == true) {

	//Add new item to items table
	require "security.php";
	//echo 'Before: '.$_POST['newItem'].'<br>';
	$string = h($_POST['newItem']);
	//echo 'After: '.$string;
	$stmt = $db->prepare("INSERT INTO items(listID, val) VALUES (:lid, :nitem);");
	$stmt->bindValue(":lid", $_POST['lid'], SQLITE3_INTEGER);
	$stmt->bindValue(":nitem", $string, SQLITE3_TEXT);
	$result = $stmt->execute();

	echo $db->lastInsertRowID();
	//header('Location: '.$_SERVER['HTTTP_HOST'].'list.php?lid='.$_POST['lid'], 303);

	//if ($result) echo "true"; else echo "false";
} else {
	//echo 'B';
	//error/redirect:
	header('Location: '.$_SERVER['HTTTP_HOST'].'error.php', 303);
}


?>