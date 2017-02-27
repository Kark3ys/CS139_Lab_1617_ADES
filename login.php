<?php require "header.php"; ?>
				<div id="BoxWrapper">
					<div class="loginBox">
						<p>Enter your login details below to proceed to the site: </p>

						<form action="login_process.php" method="POST">
							<?php 
							if(!empty($_GET)){
								if($_GET["err"] == 1) echo "Email/Password combination invalid.<br />";
								if($_GET["err"] == 2) echo "Must be logged in.<br />";
							}
							?>
							<label for="email">Email: </label>
							<input type="email" maxlength="50" name="email" required>
							<label for="login">Password: </label>
							<input type="password" pattern="[a-zA-Z0-9]+" maxlength="20" name="pass" required>
							<input type="Submit" name="login" value="login">
						</form>
					</div>
					<div class="loginBox">
						<h2>Need an account?</h2><br />
						<a class="button" href="register.php">Register</a>
					</div>
				</div>
<?php require "footer.php"; ?>
