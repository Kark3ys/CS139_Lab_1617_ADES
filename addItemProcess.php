<?php
//NOTE - all commented out 'echo' statements are for debugging, but have been removed to allow for the appropriate redirect AT THE END of the process
session_start();

error_reporting(E_ALL);
ini_set(“display_errors”, 1);
?>
<?php
//echo 'You have just attempted to add an item [ '.$_POST['newItem'].' ] to the list with ID '.$_POST['lid'].'. Processing...<br><br>';


//Check ownership of list ID in get
	//If owned - proceed to add item to database then redirect to list
	//If not owned - redirect to [list page OR error page?]

//Create database
require 'database.php';
$database = new Database();

//OLD-->
/*
//Establish ownership state with query (written in such a way that it is (hopefully) extendable to include permission checking also, so this oculd be added later)...
//Establishing what lists (by listID) are owned by the currently logged in user (from _SESSION):
$sql = 'SELECT lists.listID FROM lists 
INNER JOIN listRel ON lists.listID=listRel.listID
INNER JOIN users ON listRel.userID=users.userID
WHERE users.userID='.$_SESSION['uid'].';';//Select ID where the user matches the current login
$owned_list_records=$database->query($sql);

//Comparing these listIDs with the one this script is attempting to add an item too:
//Parse these values, set boolean to true if found
$permission=false;
echo '<br><br>';



while (($owned_list_record = $owned_list_records->fetchArray())) {
	echo '<p>'.$owned_list_record['listID'].' vs '.$_POST['lid'].'</p>';
	if ($owned_list_record['listID'] == $_POST['lid']) {
		$permission=true;
		echo 'True SET for '.$owned_list_record['listID'];
	}
}
echo '<br><br> --- ---';
*/
//<--OLD
//The above can be replaced with a single, more complex database query that returns the listIDs where
//the listRel userID matches the session uid AND
//listID is the same as the lid from _POST
//if BOTH of these are the case, as single value will be returned. If any value is returned, we can therefore assume ownership. 


$sql = 'SELECT lists.listID FROM lists 
INNER JOIN listRel ON lists.listID=listRel.listID
INNER JOIN users ON listRel.userID=users.userID
WHERE listRel.userID='.$_SESSION['uid'].' AND lists.listID='.$_POST['lid'].';';
//var_dump($sql);

$results = $database->query($sql);
$result = $results->fetchArray();


//FetchArray() will return an appropriate array, OR false IF NONE TO RETURN - therefore we can establish if a user has permission as follows:
$permission=true;
//var_dump($result);
if ($result == false) { 
	$permission=false;
}
//var_dump($permission);
//echo '<br>Path: ';

///Could put some permissions stuff here - currently only checks ownership (all the marking point wants)

//Acting based on if the user has rights for the current list or not
if ($permission == true) {

	//Add new item to items table
	$sql = 'INSERT INTO items (listID, val) VALUES ('.$_POST['lid'].', "'.$_POST['newItem'].'");';
	$database->exec($sql);
	//echo 'A';
	header('Location: '.$_SERVER['HTTTP_HOST'].'list.php?lid='.$_POST['lid'], 303);

} else {
	//echo 'B';
	//error/redirect:
	header('Location: '.$_SERVER['HTTTP_HOST'].'error.php', 303);
}


?>