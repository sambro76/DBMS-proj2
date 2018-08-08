<html>

<head>
        <title>CAR RENTAL COMPANY </title>  
<style type="text/css">
.auto-style1 {
	border-collapse: collapse;
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
		die("Failed connecting to Maria DB..." . mysqli_connect_error(). "(" .mysqli_connect_errno(). ")" ); }
	$res="SELECT * FROM owner";
	$result=mysqli_query($connection,$res);
?>

<h3>The following is the list of owners: </h3>
<table cellpadding="0" class="auto-style1" style="width: 100%">
	<tr>
		<td>
			<table border='1' cellpadding="0" cellspacing="0">
			<tr>
			<th>Owner ID&nbsp;</th>
			<th>Type&nbsp;</th>
			</tr>
			<?php
			if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result))
			{
			echo "<tr>";
			echo "<td>" . $row["OwnerID"] . "</td>";
			echo "<td>" . $row["OwnerType"] . "</td>";
			echo "</tr>";
			}
			}
			?>
			</table>
		</td>
		<td>
			<?php
				$res="SELECT * FROM RENTAL_COMPANY";
				$result=mysqli_query($connection,$res);
			?>
			<h3>Rental Company:</h3>
			<table border='1' cellpadding="0" cellspacing="0">
			<tr>
			<th>Company Name&nbsp;</th>
			<th>Address&nbsp;</th>
			<th>Phone&nbsp;</th>
			<th>Owner ID&nbsp;</th>
			</tr>
			<?php
			if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result))
			{
			echo "<tr>";
			echo "<td>" . $row["RCName"] . "</td>";
			echo "<td>" . $row["RCAddress"] . "</td>";
			echo "<td>" . $row["Phone"] . "</td>";
			echo "<td>" . $row["OwnerID"] . "</td>";
			echo "</tr>";
			}
			}
			?>
			</table>
			
			<?php
				$res="SELECT * FROM BANK";
				$result=mysqli_query($connection,$res);
			?>
			<h3>Bank:</h3>
			<table border='1' cellpadding="0" cellspacing="0">
			<tr>
			<th>Bank Name&nbsp;</th>
			<th>Address&nbsp;</th>
			<th>Phone&nbsp;</th>
			<th>Owner ID&nbsp;</th>
			</tr>
			<?php
			if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result))
			{
			echo "<tr>";
			echo "<td>" . $row["BName"] . "</td>";
			echo "<td>" . $row["BAddress"] . "</td>";
			echo "<td>" . $row["Phone"] . "</td>";
			echo "<td>" . $row["OwnerID"] . "</td>";
			echo "</tr>";
			}
			}
			?>
			</table>
			
			<?php
				$res="SELECT * FROM PERSON";
				$result=mysqli_query($connection,$res);
			?>
			<h3>Person:</h3>
			<table border='1' cellpadding="0" cellspacing="0">
			<tr>
			<th>SSN&nbsp;</th>
			<th>Initial&nbsp;</th>
			<th>Last Name&nbsp;</th>
			<th>Phone&nbsp;</th>
			<th>Owner ID&nbsp;</th>
			</tr>
			<?php
			if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result))
			{
			echo "<tr>";
			echo "<td>" . $row["SSN"] . "</td>";
			echo "<td>" . $row["Init"] . "</td>";
			echo "<td>" . $row["LName"] . "</td>";
			echo "<td>" . $row["Phone"] . "</td>";
			echo "<td>" . $row["OwnerID"] . "</td>";
			echo "</tr>";
			}
			}
			?>
			</table>

		
		</td>
	</tr>
</table>

