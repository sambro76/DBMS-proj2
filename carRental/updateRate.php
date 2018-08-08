<html>

<head>
<title>CAR RENTAL COMPANY </title>  
<style type="text/css">
.auto-style3 {
	border-width: 0;
}
		.auto-style2 {
			text-transform: capitalize;
		}
		</style>
</head>

<body>

<p>
  			<span class="auto-style2">
  			<a href="index.html">Home</a>&nbsp; |&nbsp;
  			<a href="AddCustomer.html">Add/View Customer</a>&nbsp; |&nbsp; 
  			<a href="AddCar.html">Add/View Car/Owner</a>&nbsp; |&nbsp;
			<a href="Reservation.php">Reservation</a>&nbsp; |&nbsp;
			<a href="return.html">Car Return</a>&nbsp; |&nbsp;
			<a href="weeklyReport.php">Weekly Report</a></span>
			</p>

<?php
	$database_host = "localhost";
	$database_user = "root";
	$database_pass = "";
	$database_name = "mysqlDB";
	$connection = mysqli_connect($database_host, $database_user, $database_pass, $database_name);
	if(mysqli_connect_errno()){
		die("Failed connecting to MySQL DB" . mysqli_connect_error(). "(" .mysqli_connect_errno(). ")" ); }

	$d_rate=$_POST["d_rate"];
	$w_rate=$_POST["w_rate"];
	$type=$_POST["type"];

	$sql1="UPDATE category SET D_Rate=$d_rate, W_Rate=$w_rate WHERE TYPE='$type'";
	mysqli_query($connection,$sql1) or die(mysqli_error($connection));
	$sql2=mysqli_query($connection, $sql1);	
?>

<table border='0' cellpadding="0" cellspacing="0" class="auto-style3" style="width: 75%">
	<tr>
		<td>
			<h4>Rental rate for Car Type=$type has been updated </h4>
			<table border='1' cellpadding="0" cellspacing="0">
			<tr>
			<th>Type&nbsp;</th>
			<th>Dayly Rate&nbsp;</th>
			<th>Weekly Rate&nbsp;</th>
			</tr>
			
			<?php
					echo "<tr>";
					echo "<td>" . "$type" . "</td>";
					echo "<td>" . "$d_rate" . "</td>";
					echo "<td>" . "$w_rate" . "</td>";
					echo "</tr>";
			?>
			</table>
		</td>
		<td>
			<h4>List of available car types&nbsp;</h4>
			<?php
			$sql1="SELECT * FROM category";
			mysqli_query($connection,$sql1) or die(mysqli_error($connection));
			$sql2=mysqli_query($connection, $sql1);	

			if (mysqli_num_rows($sql2) > 0) {
				echo "<table border='1' cellpadding='0' cellspacing='0'>";
				echo "<tr>";
				echo "<th>Type&nbsp;</th>";
				echo "<th>Dayly Rate&nbsp;</th>";
				echo "<th>Weekly Rate&nbsp;</th>";
				echo "</tr>";
		
				while($row = mysqli_fetch_assoc($sql2)){
					echo "<tr>";
					echo "<td>" . $row["Type"] . "</td>";
					echo "<td>" . $row["D_Rate"] . "</td>";
					echo "<td>" . $row["W_Rate"] . "</td>";
					echo "</tr>";
				}
				echo "</table>";	
			}
			?></td>
	</tr>
</table>
</body>
</html>
