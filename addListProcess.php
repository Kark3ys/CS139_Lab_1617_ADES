<?php
header('Location: '.$_SERVER['HTTTP_HOST'].'folder.php', 303);//This causes the script to redirect to the specified URL (with 303='see other'), however the script continues to run in the background. 
//There MAY be issues with attempts to load/view the newly created list before the script has completed IF the script redirects to such a page here. Another solution is commented out below (JS):
//echo "<script>window.location = 'list.php'</script>";

error_reporting(E_ALL);
ini_set(“display_errors”, 1);
?>
<?php 
echo '<p>You have just created a list: '.$_POST['listName'].'</p>';

//Add list PLAN:
	//Create database
	//SQL string
		//listName will be isolated and added as 'name' in the database
	//Execute string on database


//Create database
require 'database.php';
$database = new Database();

//Adding new list
$sql = "INSERT INTO lists (name) VALUES ('".$_POST['listName']."');";
echo 'Executing:  '.$sql.'   ...<br>';
$database->exec($sql);
echo 'Success<br><br>';

//Retrieving the corresponding listID:
$listID = $database->lastInsertRowID();
/*//OLD
$sql = "SELECT listID FROM lists WHERE name='".$_POST['listName']."';";
//$listIDs = -1;//shows that there is an error if this is returned in testing
$listIDs = $database->query($sql);
$listIDs = $listIDs->fetchArray();
$listID = $listIDs['listID'];
*/
echo 'Returned listID : '.$listID.'<br><br>';

//Ensuring relation is established between this new list ^, and the user that created it
$sql = "INSERT INTO listRel (userID, listID, perm) VALUES (2,".$listID.",0);";
echo 'Executing:  '.$sql.'   ...<br>';
$database->exec($sql);
echo 'Success<br><br>';







echo '<br><br><br><hr><p>...ALL Completed successfully</p>';
exit();
?>