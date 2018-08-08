<html>

<head>        <title>CAR RENTAL COMPANY </title>    
<style type="text/css">

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
		die("Failed connecting to Maria DB..." . mysqli_connect_error(). "(" .mysqli_connect_errno(). ")" ); }
	$sql="SELECT * FROM customer";
	$result=mysqli_query($connection,$sql);
?>

<table cellpadding="0" cellspacing="0" style="width: 85%">
	<tr>
		<td>
		<h3>All customers:</h3>
		<table border='1' cellpadding="0" cellspacing="0">
			<tr>
			<th>CustomerID&nbsp;</th>
			<th>Type&nbsp;</th>
			</tr>
			<?php
			if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result))
			{
			echo "<tr>";
			echo "<td>" . $row["CustID"] . "</td>";
			echo "<td>" . $row["CustType"] . "</td>";
			echo "</tr>";
			}
			}
			?>
			</table>
		</td>
		
		<td>
			<?php
				$sql="SELECT * FROM individual";
				$result=mysqli_query($connection,$sql);
			?>
			<h3>Individual:</h3>
			<table border='1' cellpadding="0" cellspacing="0">
			<tr>
			<th>SSN&nbsp;</th>
			<th>FI&nbsp;</th>
			<th>Last Name&nbsp;</th>
			<th>Phone&nbsp;</th>
			<th>CustomerID&nbsp;</th>
			</tr>
			<?php
			if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result))
			{
			echo "<tr>";
			echo "<td>" . $row["SSN"] . "</td>";
			echo "<td>" . $row["Init"] .'.'. "</td>";
			echo "<td>" . $row["LName"] . "</td>";
			echo "<td>" . $row["Phone"] . "</td>";
			echo "<td>" . $row["CID"] . "</td>";
			echo "</tr>";
			}
			}
			?>
			</table>
		</td>
		<td>
			<?php
				$sql="SELECT * FROM company";
				$result=mysqli_query($connection,$sql);
			?>
			<h3>Company:</h3>
			<table border='1' cellpadding="0" cellspacing="0">
			<tr>
			<th>Company Name&nbsp;</th>
			<th>Phone&nbsp;</th>
			<th>CustomerID&nbsp;</th>
			</tr>
			<?php
				if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result))
				{
				echo "<tr>";
				echo "<td>" . $row["CName"] . "</td>";
				echo "<td>" . $row["Phone"] . "</td>";
				echo "<td>" . $row["CID"] . "</td>";
				echo "</tr>";
				}
				}
			?>
			</table>
		</td>
	</tr>
</table>



