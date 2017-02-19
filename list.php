<?php require "header.php"; ?>
<?php
	if(empty($_GET) || empty($_GET["lid"]) || !is_numeric($_GET["lid"])) {
		echo "No list found, go <a href='index.php'>home</a>.";
		exit();
	}
	require_once 'database.php';
	$db = new Database();
	$showList = false;
	$editList = false;
	$listData = $db->querySingle("SELECT * FROM lists WHERE listID=" . $_GET["lid"]);
	$listPerm = $listData["defperm"];
	if ($listPerm == 1) $showList = true;
	if (isset($_SESSION) && !empty($_SESSION["uid"])) {
		if (!$showList) {
			$result = $db->querySingle("SELECT perm FROM listRel WHERE userID=" .
				$_SESSION["uid"] . " AND listID=" . $_GET["lid"]);
			if (!empty($result)) {
				$showList = true;
				if ($result["perm"] < 2) $editList = true;
			}
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
		exit();
	}
	
	echo "<form>";
	echo "<h2 id='listTitle'>".$listData["name"]."</h2>";
	$listItems = $db->query("SELECT * FROM items 
		INNER JOIN lists ON items.listID = lists.listID 
		WHERE items.listID =" . $_GET["lid"] . " 
		ORDER BY items.itemID;");
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

	//echo $_GET['lid']; //Testing
	echo '<a href="addItem.php?lid='.$_GET['lid'].'">Add Item</a>';
	//send lid as GET, and then check ownership of lid in addItemProcess.php IMMEDIATLEY before allowing the user to add the item, redirecting to an error page/back here if not. 
?>
<?php require "footer.php"; ?>