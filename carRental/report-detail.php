<html>

<head>
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
	$startWeek=$_POST["startWeek"];
	$endWeek=$_POST["endWeek"];
if (!is_numeric($startWeek) || !is_numeric($endWeek)) { echo "<h3>Please input numeric values...</h3>";}	
elseif ($startWeek > 52 || $endWeek > 52) { echo "<h3>Week of year must not be greater than 52!!!</h3>";}
elseif ($startWeek > $endWeek) { echo "<h3>Start week must be less End week!!!</h3>";}
else {
	$database_host = "localhost";
	$database_user = "root";
	$database_pass = "";
	$database_name = "mysqlDB";
	$connection = mysqli_connect($database_host, $database_user, $database_pass, $database_name);
	if(mysqli_connect_errno()){
		die("Failed connecting to MySQL DB" . mysqli_connect_error(). "(" .mysqli_connect_errno(). ")" ); 
	}
	
		$sql1="CALL EarnReport_All($startWeek,$endWeek)"; 
		$sql2=mysqli_query($connection, $sql1);
		echo "<table border='1' cellpadding='0' cellspacing='0'>";
		echo "<tr>";
		echo "<th>VehicleID</th>";
		echo "<th>Type</th>";
		echo "<th>StartDate&nbsp;&nbsp;&nbsp;&nbsp;</th>";
		echo "<th>NoDays</th>";
		echo "<th>NoWeeks</th>";
		echo "<th>RentOption</th>";		
		echo "<th>Deposit</th>";		
		echo "<th>D_Rate</th>";		
		echo "<th>W_Rate</th>";		
		echo "<th>ReturnDate</th>";		
		echo "<th>Availability&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";		
		echo "<th>OwnerID</th>";		
		echo "<th>StartWeek</th>";		
		echo "<th>ReturnWeek</th>";		
		echo "<th>TotalDays</th>";		
		echo "<th>Status</th>";		
		echo "<th>AmountPaid</th>";		
		for ($x=$startWeek; $x<=$endWeek; $x++) {
			echo "<th>Week$x</th>";
		}
		echo "</tr>";
		if (mysqli_num_rows($sql2) > 0) {
			while($row = mysqli_fetch_assoc($sql2)){
			echo "<tr>";
			echo "<td>" . $row["VehicleID"] . "</td>";
			echo "<td>" . $row["Type"] . "</td>";
			echo "<td>" . $row["StartDate"] . "</td>";
			echo "<td>" . $row["No_Days"] . "</td>";
			echo "<td>" . $row["No_Weeks"] . "</td>";
			echo "<td>" . $row["Rent_Option"] . "</td>";
			echo "<td>" . $row["Deposit"] . "</td>";
			echo "<td>" . $row["D_Rate"] . "</td>";
			echo "<td>" . $row["W_Rate"] . "</td>";
			echo "<td>" . $row["ReturnDate"] . "</td>";
			echo "<td>" . $row["Availability"] . "</td>";
			echo "<td>" . $row["OwnerID"] . "</td>";
			echo "<td>" . $row["Start_WeekOfYear"] . "</td>";
			echo "<td>" . $row["Return_WeekOfYear"] . "</td>";
			echo "<td>" . $row["TotalDays"] . "</td>";
			echo "<td>" . $row["Status"] . "</td>";
			echo "<td>" . $row["AmountPaid"] . "</td>";
			
			for ($x=$startWeek; $x<=$endWeek; $x++) {
				if($row["Week$x"]==0) {$row["Week$x"]='-';}
				else {$row["Week$x"]=number_format($row["Week$x"],2,'.',',');}
				echo "<td align='right'>" . $row["Week$x"] . "</td>";
			}
			echo "</tr>";
			}
		}
	echo "</table>";
}
?> 

<?php
function Start_End_Date_of_a_week($week, $year) {
	$time = strtotime("1 January $year", time());
	$day = date('w', $time);
	$time += ((7* ($week-1) )+1-$day)*24*3600;
	$dates[0] = date('Y-n-j', $time);
	$time += 6*24*3600;
	$dates[1] = date('Y-n-j', $time);
	return $dates;
}
echo "<h4>Note for week of year 2018: </h4>";
for ($i=$startWeek; $i<=$endWeek; $i++) {
	$result = Start_End_Date_of_a_week($i, 2018);
	echo 'Week'.$i.' starts From: '. $result[0].' To: '. $result[1];
	echo '<br>';
}
?>
