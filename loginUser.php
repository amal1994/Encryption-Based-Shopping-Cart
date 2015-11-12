<?php
	session_start();
	include "common/connection.php";
	$username = $_POST['fname'];
	$password = $_POST['pwd'];
	
	$sql = "select * from user where username = '$username' and password = '$password'";
	$row = mysql_query($sql);
	$rset=mysql_fetch_array($row);
	if($rset['username']==""){
		header("location: index.php?msg=nl");
	}
	else{
		$_SESSION['username']=$rset['username'];
		header("location: showbooks.php");
	}
?>
