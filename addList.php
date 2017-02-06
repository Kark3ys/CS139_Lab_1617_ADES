<?php include "header.php"; ?>
<form action="[*2]" method="post">
  <table border="1">
    <tr><th>Item</th><tr>
    <tr><td><input type="text" name="1"></td><tr>
    <tr><td><input type="text" name="2"></td><tr>
    <tr><td><center>[*1]</center></td></tr>
    <tr><td><center>...</center></td></tr>
  </table>
  <input type="submit" name="createNewList" value="Save new list">
</form>

<p>[*1] Will add PHP here to dynamically add another list item here when the last item has a value entered</p>
<p>[*2] Will specify the action here one I get this POSTing thing figured out</p>
<?php include "footer.php"; ?>