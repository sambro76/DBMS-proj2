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
		die("Failed connecting to MySQL DB" . mysqli_connect_error(). "(" .mysqli_connect_errno(). ")" ); }

	$vid=$_POST["vid"];
	$model=$_POST["model"];
	$year=$_POST["year"];
	$type=$_POST["type"];
	$oid=$_POST["oid"];
	
	$sql="INSERT INTO car VALUES($vid,'$model',$year,'$type',$oid);";
	mysqli_query($connection,$sql) or die(mysqli_error($connection));
	echo "<h4>Car has been added!</h4><br><br>";
	
	$sql1="SELECT * FROM car WHERE VehicleID=$vid";
	$sql2=mysqli_query($connection,$sql1);
?>

<table border='1' cellpadding="0" cellspacing="0">
<tr>
<th>Vehicle ID&nbsp;</th>
<th>Model&nbsp;</th>
<th>Year&nbsp;</th>
<th>Type&nbsp;</th>
<th>Owner ID&nbsp;</th>
</tr>

<?php
if (mysqli_num_rows($sql2) > 0) {
	while($row = mysqli_fetch_assoc($sql2)){
	echo "<tr>";
	echo "<td>" . $row["VehicleID"] . "</td>";
	echo "<td>" . $row["Model"] . "</td>";
	echo "<td>" . $row["Year"] . "</td>";
	echo "<td>" . $row["Type"] . "</td>";
	echo "<td>" . $row["OID"] . "</td>";
	echo "</tr>";
	}
}
?>
</table>