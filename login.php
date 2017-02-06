<?php require "header.php" ?>
				<div id="BoxWrapper">
					<div class="loginBox">
						<p>Enter your login details below to proceed to the site: </p>

						<form action="forms_submit" method="post" accept-charset="utf-8">
							<label>Email: </label>
							<input type="text" name="Email">
							<label>Password: </label>
							<input type="Password" name="pwd">
							<input type="Submit" name="Login" value="Login">
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
<?php require "footer.php" ?>