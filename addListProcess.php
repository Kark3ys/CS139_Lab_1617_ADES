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
$database = new Database();

//Adding new list
$sql = "INSERT INTO lists (name) VALUES ('".$_POST['listName']."');";
//echo 'Executing:  '.$sql.'   ...<br>';
$database->exec($sql);
//echo 'Success<br><br>';

//Retrieving the corresponding listID:
$listID = $database->lastInsertRowID();
/* 
echo '<p>listID: '.$listID.'</p>';
echo 'Session: ';
foreach($_SESSION as $item) {
	echo $item;
}
echo '<br>';
*/

//Ensuring relation is established between this new list ^, and the user that created it
$sql = "INSERT INTO listRel(userID, listID, perm) VALUES (".$_SESSION['uid'].", ".$listID.",0);";
//var_dump($sql);
//echo 'Executing:  '.$sql.'   ...<br>';
$database->exec($sql);
//echo 'Success<br><br>';




//echo '<br><br><br><hr><p>...ALL Completed successfully</p>';
header('Location: '.$_SERVER['HTTTP_HOST'].'list.php?lid='.$listID, 303);
//This causes the script to redirect to the specified URL (with 303='see other'), however the script continues to run in the background, ehcne it is terminated with 'exit()' below. 

exit();
?>