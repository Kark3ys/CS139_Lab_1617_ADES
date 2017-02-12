<?php require "header.php"; ?>
<?php
error_reporting(E_ALL);
ini_set(“display_errors”, 1);
	require 'db.php';
	$db = new Database();
	echo '<table id="lists">';
	$result = $db->query("SELECT lists.listID FROM lists 
	INNER JOIN listRel ON lists.listID = listRel.listID
	INNER JOIN users ON listRel.userID = users.userID 
	WHERE users.userID = 2;");
	//Get all lists we have access to.
	while ($list = $result->fetchArray()) {
		$result2 = $db->query("SELECT * FROM lists
			INNER JOIN listRel ON lists.listID = listRel.listID
			INNER JOIN users ON listRel.userID = users.userID
			WHERE lists.listID = ".$list["listID"]."
			AND listRel.perm = 0");
			while ($row = $result2->fetchArray()) {
			echo '<tr><td><a class="fitem" href=list.php?list='.$row["listID"].'>'
				.$row["name"].'</a></td><td>Last Edited: '.$row["lastTS"].'</td>
				<td>Owner: '.$row["username"].'</tr>';
			}
	}
	echo '</table>';
?>

<!--Link to add a new list-->
<a href="addList.php">Add a new list</a>

<?php require "footer.php"; ?>