<?php
error_reporting(E_ALL);
ini_set(“display_errors”, 1);
?>
<!DOCTYPE html>
<html>
<head>
<title>demo1</title>
</head>
<body>
<?php
function h($string) {

	//return $string;
	$temp = htmlspecialchars($string, ENT_QUOTES, 'utf-8');
	return $temp;
}
echo 'This page is working... The output of my function should show below: <br>';
$var_passed = "Hello World";
echo h($var_passed);

/*
echo '<br><br><br><br><br><br><br><hr>Seperate testing of htmlspecialchars: <br>';
$string='<script>alert("Some alert to test htmlspecialchars")</script>';//"Hello world";

echo $string;

echo htmlspecialchars($string, ENT_QUOTES, 'utf-8');
//echo h("Hello");
*/
?>
</body>
</html>