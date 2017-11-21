<?php
	require 'dbconn.php';
	$idno = $_GET["delete_id"];
	deleteStudent($idno);
	header("location: index.php");
?>