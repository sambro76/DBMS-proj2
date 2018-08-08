<html>

<head>        <title>CAR RENTAL COMPANY </title>  
<style type="text/css">
.auto-style1 {
	text-align: right;
}
.auto-style2 {
	text-align: left;
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

	$startDate=$_POST["startDate"];
	$vid=$_POST["vehicleID"];
	$status=$_POST["status"];
	$amountPaid=$_POST["amountPaid"];

	$sql1="UPDATE rent SET Status='$status',AmountPaid=$amountPaid WHERE VehicleID=$vid AND StartDate='$startDate'";
	mysqli_query($connection,$sql1) or die(mysqli_error($connection));

	$sql2="SELECT * FROM (SELECT rent.VehicleID, car.Type, car.Model, Rent_Option, No_Weeks, No_Days, Deposit, StartDate, DATE_ADD(StartDate, INTERVAL No_weeks*7+No_Days DAY) as ReturnDate, Status, (D_Rate*No_Days+W_Rate*No_Weeks-Deposit) AS AmountDue, AmountPaid, customer.CustID as CustomerID 	FROM customer, rent, car, category	WHERE customer.CustID=Rent.CustID and rent.VehicleID=car.VehicleID and car.type=category.Type) as tmpInfo WHERE VehicleID=$vid and StartDate='$startDate' ";
	mysqli_query($connection,$sql2) or die(mysqli_error($connection));
	echo "<h4>Rental Information for VehicleID=$vid and Start Date=$startDate: </h4>";
?>

<table border='1' cellpadding="0" cellspacing="0">
<tr>
<th>Vehicle ID&nbsp;</th>
<th>Type&nbsp;</th>
<th>Model&nbsp;</th>
<th>RentOption&nbsp;</th>
<th>No_Days&nbsp;</th>
<th>No_Weeks&nbsp;</th>
<th>Deposit&nbsp;</th>
<th>StartDate&nbsp;</th>
<th>ReturnDate&nbsp;</th>
<th>Status&nbsp;</th>
<th>AmountDue&nbsp;</th>
<th>AmountPaid&nbsp;</th>
<th>CustomerID&nbsp;</th>

</tr>

<?php
	$sql3=mysqli_query($connection, $sql2);
	if (mysqli_num_rows($sql3) > 0) {
	while($row = mysqli_fetch_assoc($sql3)){
		echo "<tr>";
		echo "<td>" . $row["VehicleID"] . "</td>";
		echo "<td>" . $row["Type"] . "</td>";
		echo "<td>" . $row["Model"] . "</td>";
		echo "<td>" . $row["No_Days"] . "</td>";
		echo "<td>" . $row["No_Weeks"] . "</td>";				
		echo "<td>" . $row["Rent_Option"] . "</td>";				
		echo "<td>" . $row["Deposit"] . "</td>";				
		echo "<td>" . $row["StartDate"] . "</td>";
		echo "<td>" . $row["ReturnDate"] . "</td>";		
		echo "<td>" . $row["Status"] . "</td>";				
		echo "<td>" . $row["AmountDue"] . "</td>";				
		echo "<td>" . $row["AmountPaid"] . "</td>";				
		echo "<td>" . $row["CustomerID"] . "</td>";				
		echo "</tr>";
	}
	}
?>
</table>
