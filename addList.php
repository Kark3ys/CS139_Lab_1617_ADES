<?php include "header.php"; ?>
<form action="addListProcess.php" method="post">
	<p>List title: <input type="text" name="listName" maxlength="30" autofocus required ></p>

	<input type="submit" value="Create">
</form>
<?php include "footer.php"; ?>