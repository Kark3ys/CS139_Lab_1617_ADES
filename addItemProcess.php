<?php
error_reporting(E_ALL);
ini_set(“display_errors”, 1);
?>
<?php
echo "You have just added an item: ".$_POST['newItem']." to the list ";///DO some get shit here to include the list name from the URL/previous page?

//Create database
require 'database.php';
$database = new Database();

$sql = "";


?>