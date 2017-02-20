<?php
//NOTE - all commented out 'echo' statements are for debugging, but have been removed to allow for the appropriate redirect AT THE END of the process
session_start();
error_reporting(E_ALL);
ini_set(“display_errors”, 1);
?>
<?php 
//echo '<p>You have just created a list: '.$_POST['listName'].'</p>';


//Create database
require 'database.php';
$db = new Database();

//Adding new list
$stmt = $db->prepare("INSERT INTO lists (name) VALUES (:ln);");
$stmt->bindValue(":ln", $_POST['listName'], SQLITE3_TEXT);
//echo 'Executing:  '.$sql.'   ...<br>';
$stmt->execute();
//echo 'Success<br><br>';

//Retrieving the corresponding listID:
$listID = $db->lastInsertRowID();
/* 
echo '<p>listID: '.$listID.'</p>';
echo 'Session: ';
foreach($_SESSION as $item) {
	echo $item;
}
echo '<br>';
*/

//Ensuring relation is established between this new list ^, and the user that created it
$stmt = $db->prepare("INSERT INTO listRel(userID, listID, perm) VALUES (:uid, :lid, 0);");
$stmt->bindValue(":uid", $_SESSION['uid'], SQLITE3_INTEGER);
$stmt->bindValue(":lid", $listID, SQLITE3_INTEGER);
//var_dump($sql);
//echo 'Executing:  '.$sql.'   ...<br>';
$stmt->execute();
//echo 'Success<br><br>';




//echo '<br><br><br><hr><p>...ALL Completed successfully</p>';
header('Location: '.$_SERVER['HTTTP_HOST'].'list.php?lid='.$listID, 303);
//This causes the script to redirect to the specified URL (with 303='see other'), however the script continues to run in the background, ehcne it is terminated with 'exit()' below. 

exit();
?>