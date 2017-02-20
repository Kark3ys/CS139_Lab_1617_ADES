<?php
header("X-XSS-Protection:0");
?>
<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<h1>XSS Testbed</h1>
	<p>This testbed is designed to demonstrate the usage of PHP's functions for preventing XSS attacks.</p>
	<p>Safari and Chrome have some inbuilt protection against the XSS attack in this demo (i.e rendering it to the same page), so the X-XSS-Protection header is set to 0 to turn off their in built auditor.</p>
	
	<form action='example.php' method='post'>
		<label for="user_input">User Input</label><br>
		<textarea name='user_input' cols='80' rows='10'>
My name is HAL. 
<script>
	alert("This should not run!");
	alert("Seriously!");	
</script>
Goodbye.
		</textarea>
		<br>
		<label>PHP Method</label><br/>
		<input type="radio" name="method" value="none" id="none" checked>None
		<input type="radio" name="method" value="strip" id="strip">strip_tags
		<input type="radio" name="method" value="escape" id="escape">htmlspecialchars	<br>			
		<input type="submit" name="Submit" value="Submit Data" id="Submit">
	</form>
	
	
	
	<h2>PHP Output</h2>
	<?php
		if($_POST['user_input']) {
			if($_POST['method'] == "none") {
				echo "No XSS Protection<br>";
				echo $_POST['user_input'];
			} else if($_POST['method'] == "strip") {
				echo "Using strip_tags<br>";
				echo strip_tags($_POST['user_input']);
			} else {
				echo "Using htmlspecialchars<br>";
				echo htmlspecialchars($_POST['user_input']);
			}
			
			
		}
	?>
	
	
	
</body>
</html>