<?php
	session_start();
	if($_SESSION['username']==""){
		header("location: index.php");
	}
	include "common/connection.php";
?>
<html>
	<head>
		<title>Books List</title>
		<link rel="stylesheet" href="common/style.css" media="all" type="text/css" />
	</head>
	<body>
	</body>
</html>
<a href="logout.php" style="color:#9acd32">Logout</a>
<center>
                   <table id="table">	
			<tr><th>Card I.D.</th><th>CARD HOLDER</th><th>CARD NUMBER</th><th>CVV</th><th>EXPIRY DATE</th></tr>
			<?php
				$sql = "select * from cards";
				$rows = mysql_query($sql);
				$i = 1;
				while($rset = mysql_fetch_array($rows)){
					echo "<tr>";
					#echo "<td>".$i."</td>";
					echo "<td>".$rset['id']."</td>";
					echo "<td>".$rset['holdername']."</td>";
					echo "<td>".$rset['cardnumber']."</td>";
					echo "<td>".$rset['cvv']."</td>";
					echo "<td>".$rset['expirydate']."</td>";
					#$id = $rset['id'];
					#echo "<td><a href='buybook.php?id=$id'>Buy</a></td>";
					$i++;
				}
			?>
				
		</table>
</center>
