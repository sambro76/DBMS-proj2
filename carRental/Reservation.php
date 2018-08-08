<html>
    <head>        <title>CAR RENTAL COMPANY </title>  
        <title>CAR RENTAL COMPANY </title>    
    	<style type="text/css">
		.auto-style1 {
			border-width: 0;
		}
		.auto-style2 {
			text-align: right;
		}
		.auto-style3 {
			text-align: left;
		}
		</style>
    </head>
<body>
		<div class="menu">
  			<span class="auto-style2">
  			<a href="index.html">Home</a>&nbsp; |&nbsp;
  			<a href="AddCustomer.html">Add/View Customer</a>&nbsp; |&nbsp; 
  			<a href="AddCar.html">Add/View Car/Owner</a>&nbsp; |&nbsp;
			<a href="Reservation.php">Reservation</a>&nbsp; |&nbsp;
			<a href="return.html">Car Return</a>&nbsp; |&nbsp;
			<a href="weeklyReport.php">Weekly Report</a></span>
			</div>
			
	<div class="leftContent">
	
    <form action="reserve.php" method="post">
	<h2>Please complete the following to make new reservation: </h2>
		<p>&nbsp;</p>
		<table cellpadding="0" cellspacing="0" class="auto-style1">
			<tr>
				<td class="auto-style2">Start Date:</td>
				<td> <input type="text" name="startDate"></td>
				<td style="width: 359px">(YYYY-MM-DD)</td>
			</tr>
			<tr>
				<td class="auto-style2" style="height: 24px">No of Days:</td>
				<td style="height: 24px"> 
				<input type="text" name="No_Days" value="0"></td>
				<td style="width: 359px">&nbsp;</td>
			</tr>
			<tr>
				<td class="auto-style2" style="height: 24px">No of Weeks:</td>
				<td style="height: 24px"> 
				<input type="text" name="No_Weeks" value="0"></td>
				<td style="width: 359px">&nbsp;</td>
			</tr>
			<tr>
				<td class="auto-style2">Rent Option:</td>
				<td><select name = "rentOption">
<option value="DAILY">DAILY</option>
<option value="WEEKLY">WEEKLY</option>
</select></td>
				<td style="width: 359px">&nbsp;</td>
			</tr>
			<tr>
				<td class="auto-style2" style="height: 24px">Deposit:</td>
				<td style="height: 24px"> <input type="text" name="deposit"></td>
				<td style="height: 24px; width: 359px">&nbsp;</td>
			</tr>
			<tr>
				<td class="auto-style2">Vehicle ID:</td>
				<td> <input type="text" name="VehicleID" style="width: 92px"></td>
				<td style="width: 359px">(4-digit number from 1001-9999)</td>
			</tr>
			<tr>
				<td class="auto-style2">Customer ID:</td>
				<td> <input type="text" name="custID"></td>
				<td style="width: 359px">&nbsp;</td>
			</tr>
			<tr>
				<td class="auto-style2">Status:</td>
				<td> <input type="text" name="status"></td>
				<td style="width: 359px">(CP for Completed &amp; Paid, <br>CU 
				for Completed but Unpaid, <br>NS as no-show or canceled)</td>
			</tr>
			<tr>
				<td class="auto-style2" style="height: 22px">Amount Paid:</td>
				<td style="height: 22px"><input type="text" name="amountPaid"></td>
				<td style="width: 359px; height: 22px;">&nbsp;</td>
			</tr>
			<tr>
				<td class="auto-style2">&nbsp;</td>
				<td>
					<input type="submit" name="submit" value="Make Reservation"></td>
				<td style="width: 359px">&nbsp;</td>
			</tr>
		</table>
	</form>
    </div>	

<?php
	$database_host = "localhost";
	$database_user = "root";
	$database_pass = "";
	$database_name = "mysqlDB";
	$connection = mysqli_connect($database_host, $database_user, $database_pass, $database_name);
	if(mysqli_connect_errno()){
		die("Failed connecting to MySQL DB" . mysqli_connect_error(). "(" .mysqli_connect_errno(). ")" ); }
	
	$sql1="SELECT VehicleID, Type, StartDate, ReturnDate, Deposit, Availability from tmpReport ORDER BY VehicleID ASC, StartDate ASC";
	$sql2=mysqli_query($connection,$sql1);
?>

<table border='1' cellpadding="0" cellspacing="0">
<tr>
<th class="auto-style3" colspan="6">Below is the list of available and scheduled 
cars</th>
</tr>

<tr>
<th>Vehicle ID&nbsp;</th>
<th>Type&nbsp;</th>
<th>StartDate&nbsp;</th>
<th>ReturnDate&nbsp;</th>
<th>Deposit&nbsp;</th>
<th>Availibility&nbsp;</th>
</tr>

<?php
if (mysqli_num_rows($sql2) > 0) {
	while($row = mysqli_fetch_assoc($sql2)){
	echo "<tr>";
	echo "<td>" . $row["VehicleID"] . "</td>";
	echo "<td>" . $row["Type"] . "</td>";
	echo "<td>" . $row["StartDate"] . "</td>";
	echo "<td>" . $row["ReturnDate"] . "</td>";
	echo "<td>" . $row["Deposit"] . "</td>";
	echo "<td>" . $row["Availability"] . "</td>";
	echo "</tr>";
	}
}
?>
</table>

