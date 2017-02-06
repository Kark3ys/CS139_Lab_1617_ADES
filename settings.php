<?php require "header.php" ?>
		<div id="BoxWrapper">
		<div class="settingsBox">
			<h2>Change password</h2>
			<form>
				<label>Enter current password:</label>
				<input type="password" name="oldPassword" /><br>
				<label>Enter new password: </label>
				<input type="password" name="newPassword1" /><br>
				<label>Re-enter new password: </label>
				<input type="password" name="newPassword2" /><br>
			</form>
		</div>
		<div class="settingsBox">
			<h2>Select theme</h2><br>
			<form>
				<table>
					<tr>
						<td><input type="radio" name="theme" value="Grey" class="colourSelector" id="colourGrey"></td>
						<td><input type="radio" name="theme" value="Blue" class="colourSelector" id="colourBlue"></td>
					</tr>
					<tr>
						<td><input type="radio" name="theme" value="Orange" class="colourSelector" id="colourOrange"></td>
						<td><input type="radio" name="theme" value="some_colour..." class="colourSelector" id="anIDHere"></td>
					</tr>
				</table>
				

			</form>
		</div>
		<div class="settingsBox">
			
		</div>
		<div class="settingsBox">
			
		</div>
		</div>
<?php require "footer.php" ?>