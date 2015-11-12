<?php
	session_start();
	include "common/connection.php";
	$username = $_POST['fname'];
	$password = $_POST['pwd'];
	if(($username=="")||($password=="")){
		header("location: index.php?msg=nl");
		die();
	}
	if(isset($_POST['register'])){
		$sql = "select username from user where username = '$username'";
		$row = mysql_query($sql);
		$rset = mysql_fetch_array($row);
		if($rset['username']!=""){	
			header("location: index.php?msg=uae");
			die();
		}
		$sqlins = "insert into user(username, password) values('$username','$password')";
		if(mysql_query($sqlins)){
			header("location: index.php?msg=rs");
		}
		else{
			header("location: index.php?msg=seo");
		}
	}
	if(isset($_POST['login'])){
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
	}
	
?>
