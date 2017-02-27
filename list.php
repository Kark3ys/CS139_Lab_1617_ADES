<?php require "header.php"; ?>
<?php
	if(empty($_GET) || empty($_GET["lid"]) || !is_numeric($_GET["lid"])) {
		echo "No list found, go <a href='index.php'>home</a>.";
		require_once "footer.php";
		exit();
	}
	require_once 'database.php';
	$db = new Database();
	$showList = false;
	$editList = false;
	$lid = $_GET["lid"];
	$stmt = $db->prepare("SELECT * FROM lists WHERE listID=:lid");
	$stmt->bindValue(":lid", $lid, SQLITE3_INTEGER);
	$sqlResult = $stmt->execute();
	$listData = $sqlResult->fetchArray();
	$listPerm = $listData["defperm"];
	if ($listPerm == 1) $showList = true;
	if (isset($_SESSION) && !empty($_SESSION["uid"])) {
		$uid = $_SESSION["uid"];
		$stmt = $db->prepare("SELECT perm FROM listRel WHERE userID=:uid AND listID=:lid");
		$stmt->bindValue(":uid", $uid, SQLITE3_INTEGER);
		$stmt->bindValue(":lid", $lid, SQLITE3_INTEGER);
		$sqlResult = $stmt->execute();
		$result = $sqlResult->fetchArray();
		if (!empty($result)) {
			$showList = true;
			if ($result["perm"] < 2) $editList = true;
		}
	}
	if (!$showList) {
		echo "No access to list, click <a href='";
		if (isset($_SESSION) && !empty($_SESSION["uid"])) {
			echo 'folder.php';
		} else {
			echo 'index.php';
		}
		
		echo "'>here</a> to go back.";
		require_once "footer.php";
		exit();
	}
	
	echo "<form>";
	echo "<h2 id='listTitle'>".$listData["name"]."</h2>";
	$stmt=$db->prepare("SELECT * FROM items 
		INNER JOIN lists ON items.listID = lists.listID 
		WHERE items.listID = :lid ORDER BY items.itemID");
	$stmt->bindValue(":lid", $lid, SQLITE3_INTEGER);
	$listItems = $stmt->execute();
	echo "<div id='listView'>\n
		\t<table>\n
		\t<tbody>\n";
	$itemExists=false;
	while ($item = $listItems->fetchArray()) {
		$itemExists=true;
		$iid = $item["itemID"];
		echo "\t\t<tr id='" .$iid . "'>
		<td><input type='checkbox' name='" . $iid . "[checked]'";
		if ($item["checked"] != 0) echo " checked";
		echo "></td>\n\t\t<td>" . $item["val"] . "</td>\n\t\t</tr>\n\n";
	}
	echo "\t</tbody>\n\t</table>\n</div>\n</form>";

	if (!$itemExists) {
		echo '<p><em>This list has no items...</em></p>';
	}

	if($editList) {

		//OLD addItem:
		//echo '<a href="addItem.php?lid='.$_GET['lid'].'">Add Item</a>';
	}
	//send lid as GET, and then check ownership of lid in addItemProcess.php IMMEDIATLEY before allowing the user to add the item, redirecting to an error page/back here if not. 
?>



<form action="" method="" id="addItemForm">
	<input type="text" name="newItem" maxlength="30" pattern="[a-zA-Z0-9]+" autofocus required >
	<?php echo '<input type="hidden" name="lid" value="'.$_GET['lid'].'" >'; ?>
	<?php echo '<input type="hidden" name="uid" value="'.$_SESSION['uid'].'" >'; ?>
</form>
<button id="addItemButton">Submit</button>
<p id="retstuff"></p>
<script>

$(document).ready(function () {

	$("#addItemButton").click(function() {
		//alert("Form has been submitted. ");//Testing alert

		//Data retrieval (input, list):
		var input = $("#addItemForm input[name='newItem']").val();//Retrieve the new item input from the form
		var list = $("#addItemForm input[name='lid']").attr('value');//Retrieve the list to be submitted to the processing file
		//alert(input +  " " + list);

		//Sending this data to the processing file:
		$.post( "addItemAJAX.php",
			{lid:list, newItem:input},
			function ( data, status ) {//Action to be carried out on processing script completion, to update the page to include the item
				$("#retstuff").html("Hey"); 
				$("#listView table tbody").append("<tr id='" + data + "'><td><input type='checkbox' name='" + data + "' ></td><td>" + input + "</td></tr>");
				$("#addItemForm input[name='newItem']").val("");

			});//.done(function(){alert("Post Done");}).fail(function(){alert("Post Fail");});

		return false;
		});



});

</script>

<?php require_once "footer.php"; ?>