<?php 
echo '<p>You have just created a list: '.$_POST['listName'].'</p>';


echo '<p>Will now proceed to print out all values just entered:</p>';

foreach($_POST as $itemNum => $value) {
	echo 'Item '.$itemNum.' is '.$value.'<br>';
	//Currently also includes listName - this could be easily removed using an if
}

echo '<p>Will now store these values in the database...</p>';

//Add items to db PLAN
	//Create database
	//SQL string
		//listName will be isolated and added as 'name' in the db
		//the listID that corresponds with where this is added will be stored in a variable $listID
		//all other items in $_POST will be added to the 'items' table, with a reference made wtih the $listID, unles the value is empty
	//Execute string on db


//Create database
require 'db.php';
$db = new Database();

//Adding new list
$sql = "INSERT INTO lists (name) VALUES ('".$_POST['listName']."');";
echo 'Executing:  '.$sql.'   ...<br>';
$db->exec($sql);
echo 'Success<br><br>';

//Retrieving the corresponding listID:
$sql = "SELECT listID FROM lists WHERE name='".$_POST['listName']."';";
$listIDs = -1;//shows that there is an error if this is returned in testing
$listIDs = $db->query($sql);
$listIDs = $listIDs->fetchArray();
$listID = $listIDs['listID'];
echo 'Returned listID : '.$listID.'<br><br>';

//Ensuring relation is established between this new list ^, and the user that created it
$sql = "INSERT INTO listRel (userID, listID, perm) VALUES (1,".$listID.",0);";
echo 'Executing:  '.$sql.'   ...<br>';
$db->exec($sql);
echo 'Success<br><br>';


//Adding provided items
//Generating sql string:
$sql = "";



echo '<br><br><br><hr><p>...ALL Completed successfully</p>';

///Query to check items have been added to db successfully

///Redirect to LIST viewing page for this list? - something like this using JS:
//echo "<script>window.location = 'list.php'</script>";
///Need to try to get it to stow the correct list somehow

?>