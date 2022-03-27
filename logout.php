<?php
	session_start();
	unset($_SESSION['id']);
		unset($_SESSION['type']);
	session_destroy();
//	header("Location:index.php");
echo "<script>window.location.href='index.php';</script>";
?>