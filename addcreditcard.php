<?php
	session_start();
	if($_SESSION['username']==""){
		header("location: index.php");
	}
	include "common/connection.php";
	$holdername=($_POST['uname']);
	$cnum = md5($_POST['cnum']);
	$cvv = md5($_POST['cvv']);
	$expirydate = ($_POST['expirydate']);
	$user = $_SESSION['username'];
	$id = $_POST['id'];
	echo $sql = "insert into cards(holdername, cardnumber, cvv, expirydate, addedby, bookname) values('$holdername', '$cnum', '$cvv', '$expirydate', '$user', $id)";
	if(mysql_query($sql)){
		header("location: buybook.php?id=$id&msg=success");
	}
	else{
		header("location: buybook.php?id=$id&msg=failure");
	}

?>
