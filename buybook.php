<?php
	session_start();
	if($_SESSION['username']==""){
		header("location: index.php");
	}
	include "common/connection.php";
?>
<html>
	<head>
		<title>Buy a book</title>
	</head>
	<body>	
	<a href="logout.php" style= "color:#9acd32">Logout</a>
	<link rel="stylesheet" href="common/style1.css" media="all" type="text/css" />
		<form action="addcreditcard.php" method="post">
			<center>
			<h1 style="font-family:verdana;color:#483d8b">Buy Book</h1>
			<?php
				$id= $_REQUEST['id'];
				$sql="select * from books where id=$id";
				$row=mysql_query($sql);
				$rset=mysql_fetch_array($row);		
				$title = $rset['title'];
				echo "<strong><u style='color:#7f7f7f'><em><h1 style='color:#7f7f7f'>".$title."</h1></em></u></strong>";					
			?>
			<table>
				<tr>
					<td>Name:</td>
					<td><input type="text" name="uname"/></td>
				</tr>
				<tr>
					<td>Card Number:</td>
					<td><input type="text" name="cnum" maxlength="16"/></td>
				</tr>
				<tr>
					<td>CVV:</td>
					<td><input type="text" name="cvv" maxlength="3"/></td>
				</tr>
				<tr>
					<td>Expiry Date:</td>
					<td><input type="date" name="expirydate" placeholder="DD-MM-YYYY" /></td>
				</tr>
				<tr>
					<td><input type="hidden" name="id" value="<?php echo $id; ?>" /></td>
					<td><input type="submit" name="submit" value="Add Card" /></td>
				</tr>
			</table>
			</center>
		</form>
	</body>
</html>
