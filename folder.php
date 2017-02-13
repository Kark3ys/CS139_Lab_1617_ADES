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
	$result = $db->query("SELECT lists.listID FROM lists 
	INNER JOIN listRel ON lists.listID = listRel.listID
	INNER JOIN users ON listRel.userID = users.userID 
	WHERE users.userID = " . $uid . ";");
	//Get all lists we have access to.
	while ($list = $result->fetchArray()) {
		$result2 = $db->query("SELECT * FROM lists
			INNER JOIN listRel ON lists.listID = listRel.listID
			INNER JOIN users ON listRel.userID = users.userID
			WHERE lists.listID = ".$list["listID"]."
			AND listRel.perm = 0");
			while ($row = $result2->fetchArray()) {
			echo '<tr><td><a class="fitem" href=list.php?lid='.$row["listID"].'>'
				.$row["name"].'</a></td><td>Last Edited: '.$row["lastTS"].'</td>
				<td>Owner: '.$row["username"].'</tr>';
			}
	}
	echo '</table>';
?>
<?php require "footer.php"; ?>