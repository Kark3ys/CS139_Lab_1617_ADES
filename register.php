<?php require "header.php"; ?>
			<div id="BoxWrapper">
				<div class="loginBox" id="login-redirect">
					<h2>Already Registered?</h2><br />
					<a class="button" href="login.html">Login</a>
				</div>
				<div class="loginBox" id="registration"">
					<form method="POST" id="regform" action="register_process.php">
						<label for="username">Username: </label>
						<input type="text" name="username" maxlength="30" required />
						<?php if($_GET["err"] == 1) echo " Username Already Exists";?><br />
						<label for="email">E-Mail Address: </label>
						<input type="email" name="email" maxlength="50" required />
						<?php if($_GET["err"] == 2) echo " Email Already Registered";?><br />
						<label for="emailc">Reconfirm E-Mail Address: </label>
						<input type="email" name="emailc" maxlength="50" required /><br />
						<label for="pass">Password: </label>
						<input type="password" name="pass" maxlength="20" required /><br />
						<label for="passc">Reconfirm Password: </label>
						<input type="password" name="passc" maxlength="20" required /><br />
						<input type="submit" value="Register" />
					</form>
				</div>
				<div class="loginBox">
				</div>
				
				<div class="loginBox">
				</div>
			</div>
		</main>
<?php require "footer.php"; ?>