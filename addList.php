<?php include "header.php"; ?>
<form action="addListProcess.php" method="post">
	<p>List title: <input type="text" name="listName"></p>
	<table border="1">
		<tr><th>Item</th><tr>
		<?php $i=1?>
		<tr><td><input type="text" name="<?php echo $i; $i=$i+1?>"></td><tr>
		<tr><td><input type="text" name="<?php echo $i; $i=$i+1?>"></td><tr>
		<tr><td><input type="text" name="<?php echo $i; $i=$i+1?>"></td><tr>
		<tr><td><input type="text" name="<?php echo $i; $i=$i+1?>"></td><tr>
		<tr><td><input type="text" name="<?php echo $i; $i=$i+1?>"></td><tr>
		<tr><td><center>[*1]</center></td></tr>
		<tr><td><center>...</center></td></tr>
	</table>
	<input type="submit" value="Create">
</form>

<p>[*1] Will add PHP/JS here to dynamically add another list item here when the last item has a value entered</p>
<?php include "footer.php"; ?>