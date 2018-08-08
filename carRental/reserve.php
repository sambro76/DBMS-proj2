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

	$startDate=$_POST["startDate"];
	$NoDays=$_POST["No_Days"];
	$NoWeeks=$_POST["No_Weeks"];
	$rentOption=$_POST["rentOption"];
	$deposit=$_POST["deposit"];
	$vid=$_POST["VehicleID"];
	$custID=$_POST["custID"];
	$status=$_POST["status"];
	$amountPaid=$_POST["amountPaid"];
	if ($NoDays=="") {$NoDays=0;}
	if ($NoWeeks=="") {$NoWeeks=0;}
	if ($deposit=="") {$deposit=0;}
	if ($amountPaid=="") {$amountPaid=0;}
	if ($startDate < date("Y-m-d") ) {
		echo "Start date cannot be less than today's date nor empty!!!<br>";
	}
	elseif ($NoDays+$NoWeeks*7==0){echo "Please verify rental duration!!!<br>";}
	elseif ($vid=="") {echo "Vehicle ID is required!!!<br>";}
	elseif ($custID=="") {echo "Customer ID is required!!!<br>";}

	else {
		$flag = 1;
		$sql1="SELECT * FROM rent WHERE vehicleID=$vid ORDER BY StartDate DESC";
		$sql2=mysqli_query($connection, $sql1);
		if (mysqli_num_rows($sql2) > 0) {
			while($row = mysqli_fetch_assoc($sql2)){
				$totalDays = $row["No_Days"]+ $row["No_Weeks"]*7 + 1;
				$AvailDate=date('Y-m-d', strtotime($row["StartDate"].'+ '. $totalDays .' days') );
								
				if ($startDate >= $row["StartDate"] && $startDate < $AvailDate) {
					$flag = 1;
					echo "<br>".$row["StartDate"]."<br>";
					echo $startDate;
					echo "<h3>This transaction has an overlapped schedule with another. Please check the schedule!</h3>";
					break;
				}
				elseif ($startDate < $row["StartDate"]) {
						$newTotalDays = $NoDays+ $NoWeeks*7 + 1;
						$newAvailDate=date('Y-m-d', strtotime($startDate.'+ '.$newTotalDays.' days') );
						echo $newAvailDate;
						if ($newAvailDate >= $row["StartDate"] ) {
							$flag = 1;
							echo "<h3>aaaa!</h3>";
							break;
						}
						else {
							$flag=0;
						}									
				}					
				else {	
					$flag = 0;
				}
			}
		}
		if ($flag==0) {		
			$sql="INSERT INTO rent VALUES ('$startDate',$NoDays,$NoWeeks,'$rentOption',$deposit,$vid,$custID,'$status',$amountPaid) ";
			mysqli_query($connection,$sql) or die(mysqli_error($connection));
			echo "<h4>Reservation has been completed!</h4><br><br>";
			echo "<h4>The following is the completed reservation information: </h4>";
			echo "<table border='1' cellpadding='0' cellspacing='0'>";
			echo "<tr>";
			echo "<th>Vehicle ID&nbsp;</th>";
			echo "<th>StartDate&nbsp;</th>";
			echo "<th>No_Days&nbsp;</th>";
			echo "<th>No_Weeks&nbsp;</th>";
			echo "<th>RentOption&nbsp;</th>";
			echo "<th>Deposit&nbsp;</th>";
			echo "<th>Customer ID&nbsp;</th>";
			echo "<th>Status&nbsp;</th>";
			echo "<th>AmountPaid&nbsp;</th>";
			echo "</tr>";

			$sql1="SELECT * FROM rent WHERE vehicleID=$vid and startDate='$startDate'";
			$sql2=mysqli_query($connection, $sql1);
			if (mysqli_num_rows($sql2) > 0) {
				while($row = mysqli_fetch_assoc($sql2)){
					echo "<tr>";
					echo "<td>" . $row["VehicleID"] . "</td>";
					echo "<td>" . $row["StartDate"] . "</td>";
					echo "<td>" . $row["No_Days"] . "</td>";
					echo "<td>" . $row["No_Weeks"] . "</td>";				
					echo "<td>" . $row["Rent_Option"] . "</td>";				
					echo "<td>" . $row["Deposit"] . "</td>";				
					echo "<td>" . $row["CustID"] . "</td>";				
					echo "<td>" . $row["Status"] . "</td>";				
					echo "<td>" . $row["AmountPaid"] . "</td>";				
					echo "</tr>";
				}
			}
		}
	}			
?>
