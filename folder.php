<?php session_start();
if (empty($_SESSION["uid"])) {
	header("Location:login.php?err=2");
	exit();
}
?>
<?php require "header.php"; ?>
<?php
	$db = new Database();
	$uid = $_SESSION["uid"];
	echo '<table id="lists">';
	$stmt = $db->prepare("SELECT lists.listID FROM lists 
	INNER JOIN listRel ON lists.listID = listRel.listID
	INNER JOIN users ON listRel.userID = users.userID 
	WHERE users.userID = :uid;");
	$stmt->bindValue(":uid", $uid, SQLITE3_INTEGER);
	$result = $stmt->execute();
	//Get all lists we have access to.
	while ($list = $result->fetchArray()) {
		$stmt = $db->prepare("SELECT * FROM lists
			INNER JOIN listRel ON lists.listID = listRel.listID
			INNER JOIN users ON listRel.userID = users.userID
			WHERE lists.listID = :lid AND listRel.perm = 0;");
		$stmt->bindValue(":lid", $list["listID"], SQLITE3_INTEGER);
		$result2 = $stmt->execute();
			while ($row = $result2->fetchArray()) {
			echo '<tr><td><a class="fitem" href=list.php?lid='.$row["listID"].'>'
				.$row["name"].'</a></td><td>Last Edited: '.$row["lastTS"].'</td>
				<td>Owner: '.$row["username"].'</tr>';
			}
	}
	echo '</table>';

	echo '<a href="addList.php">Add a new list</a>';
?>

<?php require "footer.php"; ?>