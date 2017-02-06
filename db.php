<?php
//PHP object pulled from Lecture 7 slides.
//All credit to Adam Chester
class Database {
function exec($query) {
	 	 $db = $this->getConnection();
	 	 $db.exec($query);
}
function query($query) {
	 	 $db = $this->getConnection();
	 	 $result = $db.query($query);
	 	 return $result;
}
private function getConnection() {
	 	 $conn = new SQLite3('forum.db');
	 	 return $conn;
}
}
?>