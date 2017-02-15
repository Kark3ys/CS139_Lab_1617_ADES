<?php 
if(!isset($_SESSION)) {
	session_start();
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'database.php';
$isLog = !empty($_SESSION["uid"]);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>ToDo.list</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<div id="ocwrap">
		<header>
		<div id="logo"><img src="Images/LogoV2.png"></div>
		<h1>ToDo list</h1>
		</header>
		<nav id="top">
		<a href="index.php">Home</a>
		<?php if (!$isLog)
			echo '<a href="login.php">Login</a>
			<a href="register.php">Register</a>'; ?>
		<?php if($isLog){
			echo '<a href="settings.php">';
			$db = new Database();
			$result = $db->querySingle("SELECT username FROM users WHERE userid =" . $_SESSION["uid"]);
			echo $result["username"];
			echo '</a>' . "\n";
			echo "\t\t" . '<a href="folder.php">Folder</a>' . "\n";
		}
		?>
		<?php if($isLog) echo '<a href="logout.php">Logout</a>'; ?>
		</nav>
		<main>