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
$sql = 'INSERT INTO lists (name) VALUES ("'.$_POST['listName'].'")';
$db->execute($sql);
echo 'Executed:  '.$sql;
//Retrieving the corresponding listID:
$sql = '';
$listID = $db.query($sql);

//Adding provided items
//Generating sql string:
$sql = '';



echo '<p>...Completed successfully</p>';

//Query to check items have been added to db successfully

?>