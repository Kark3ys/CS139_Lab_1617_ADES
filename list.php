<?php require "header.php"; ?>
		<form>
		<h2 id="listTitle">Shopping</h2>
		<aside id="listMeta">
		</aside>
		<div id="listView">
			<table>
				<tbody>
					<tr id="1234">
						<td><input type="checkbox" name="1234[checked]"></td>
						<td><input type="text" value="Bannanas" name="1234[val]"></td>
						<input type="hidden" value="0" name="1234[itemOrder]">
					</tr>
					<tr id="1235">
						<td><input type="checkbox" id ="1235" name="1235[checked]"></td>
						<td>Cereal</td>
					</tr>
					<tr>
						<td><input type="checkbox" id = "1236" name="1236"></td>
						<td>Milk</td>
					</tr>


				</tbody>
			</table>
		</div>
		</form>
<?php require "footer.php"; ?>