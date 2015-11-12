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
<?php
if(($_SESSION['username']=='amal')||($_SESSION['username']=='aishwarya')){
?>
<a href="card.php" style="color:#ff4500">Card</a>
<?php
}
?>
<center>
	<form method="post" action="addbooks.php">
		<table id="table">	
			<tr><th>S.No.</th><th>Title</th><th>Author</th><th>Description</th><th>Rate</th><th>Action</th></tr>
			<?php
				$sql = "select * from books";
				$rows = mysql_query($sql);
				$i = 1;
				while($rset = mysql_fetch_array($rows)){
					echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>".$rset['title']."</td>";
					echo "<td>".$rset['author']."</td>";
					echo "<td>".$rset['description']."</td>";
					echo "<td>".$rset['rate']."</td>";
					$id = $rset['id'];
					echo "<td><a href='buybook.php?id=$id'>Buy</a></td>";
					$i++;
				}
			?>
				
		</table>
	</form>
</center>
