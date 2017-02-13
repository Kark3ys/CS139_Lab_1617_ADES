<?php require "header.php"; ?>
				<div id="BoxWrapper">
					<div class="loginBox">
						<p>Enter your login details below to proceed to the site: </p>

						<form action="login_process.php" method="POST">
							<?php if($_POST["err"] == 1) echo "Email/Password combination invalid<br />";?>
							<label for="email">Email: </label>
							<input type="email" name="email">
							<label for="login">Password: </label>
							<input type="password" pattern="[a-zA-Z0-9]+" name="pass">
							<input type="Submit" name="login" value="login">
						</form>
					</div>
					<div class="loginBox">
						<h2>Need an account?</h2><br />
						<a class="button" href="register.html">Register</a>
					</div>
					<div class="loginBox">

					</div>
					<div class="loginBox">

					</div>

				</div>
<?php require "footer.php"; ?>
