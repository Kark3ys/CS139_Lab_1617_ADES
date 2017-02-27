<?php require "header.php"; ?>

<?php 
echo '<p>Current user\'s ID: '.$_SESSION['uid'].'</p>'; 
echo '<p>Adding to listID: '.$_GET['lid'].'</p>';
?>
<form action="addItemProcess.php" method="post">
	<input type="text" name="newItem" maxlength="30" pattern="[a-zA-Z0-9]+" autofocus required >
	<?php echo '<input type="hidden" name="lid" value="'.$_GET['lid'].'" >'; ?>
	<input type="submit" value="Add">
</form> 

<?php require "footer.php"; ?>