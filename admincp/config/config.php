<?php
$mysqli = new mysqli("localhost", "root", "", "web_mysqli");
if ($mysqli->connect_errno){
	echo "Kết Nỗi Lỗi".$mysqli->connect_errno;
	exit();
}
?>