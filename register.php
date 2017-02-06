<?php require "header.php" ?>
			<div id="BoxWrapper">
				<div class="loginBox" id="login-redirect">
					<h2>Already Registered?</h2><br />
					<a class="button" href="login.html">Login</a>
				</div>
				<div class="loginBox" id="registration"">
					<form method="POST" id="regform">
						<label for="email">E-Mail Address: </label>
						<input type="email" name="email" /><br />
						<label for="emailc">Reconfirm E-Mail Address: </label>
						<input type="email" name="emailc" /><br />
						<label for="pass">Password: </label>
						<input type="password" name="pass" /><br />
						<label for="passc">Reconfirm Password: </label>
						<input type="password" name="passc" /><br />
						<input type="submit" value="Register" />
					</form>
				</div>
				<div class="loginBox">
				</div>
				
				<div class="loginBox">
				</div>
			</div>
		</main>
<?php require "footer.php" ?>