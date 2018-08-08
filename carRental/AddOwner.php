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

	$ownerType=$_POST["ownerType"];
	$ssn=$_POST["ssn"];
	$init=$_POST["init"];
	$name=$_POST["name"];
	$address=$_POST["address"];
	$phone=$_POST["phone"];
	$ownerID=$_POST["ownerID"];
	echo "$ownerID";	
	
	if ($ownerType=='P') {$address='';}
	else {$ssn=0; $init='';}
	$sql="CALL AddOwner('$ownerType', $ssn, '$init', '$name', '$address', '$phone', $ownerID);";
	mysqli_query($connection,$sql) or die(mysqli_error($connection));
	echo "<h4>Owner has been added!</h4><br><br>";
?>
<h3>The following is the added owner information: </h3>
<table border='1' cellpadding="0" cellspacing="0">
<tr>
<th>Owner ID&nbsp;</th>
<th>Type&nbsp;</th>
</tr>

<?php
	$sql1="SELECT * FROM owner WHERE ownerID=$ownerID";
	$sql2=mysqli_query($connection, $sql1);
	if (mysqli_num_rows($sql2) > 0) {
	while($row = mysqli_fetch_assoc($sql2)){
		echo "<tr>";
		echo "<td>" . $row["OwnerID"] . "</td>";
		echo "<td>" . $row["OwnerType"] . "</td>";
		echo "</tr>";
	}
	}
	echo "</table><p>&nbsp;</p>";

	if ($ownerType=='P') {
		$sql1="SELECT * FROM person WHERE ownerID=$ownerID";
		$sql2=mysqli_query($connection, $sql1);
		echo "<table border='1' cellpadding='0' cellspacing='0'>";
		echo "<tr>";
		echo "<th>SSN&nbsp;</th>";
		echo "<th>Initial&nbsp;</th>";
		echo "<th>Last Name&nbsp;</th>";
		echo "<th>Phone&nbsp;</th>";
		echo "<th>Owner ID&nbsp;</th>";
		echo "</tr>";
		if (mysqli_num_rows($sql2) > 0) {
			while($row = mysqli_fetch_assoc($sql2)){
			echo "<tr>";
			echo "<td>" . $row["SSN"] . "</td>";
			echo "<td>" . $row["Init"] . "</td>";
			echo "<td>" . $row["LName"] . "</td>";
			echo "<td>" . $row["Phone"] . "</td>";
			echo "<td>" . $row["OwnerID"] . "</td>";
			echo "</tr>";
			}
		}
	}
	elseif ($ownerType=='B') {
		$sql1="SELECT * FROM bank WHERE ownerID=$ownerID";
		$sql2=mysqli_query($connection, $sql1);
		echo "<table border='1' cellpadding='0' cellspacing='0'>";
		echo "<tr>";
		echo "<th>Bank Name&nbsp;</th>";
		echo "<th>Address&nbsp;</th>";
		echo "<th>Phone&nbsp;</th>";
		echo "<th>Owner ID&nbsp;</th>";
		echo "</tr>";
		if (mysqli_num_rows($sql2) > 0) {
			while($row = mysqli_fetch_assoc($sql2)){
			echo "<tr>";
			echo "<td>" . $row["BName"] . "</td>";
			echo "<td>" . $row["BAddress"] . "</td>";
			echo "<td>" . $row["Phone"] . "</td>";
			echo "<td>" . $row["OwnerID"] . "</td>";
			echo "</tr>";
			}
		}
	}
	else {
		$sql1="SELECT * FROM rental_company WHERE ownerID=$ownerID";
		$sql2=mysqli_query($connection, $sql1);
		echo "<table border='1' cellpadding='0' cellspacing='0'>";
		echo "<tr>";
		echo "<th>Rental Company&nbsp;</th>";
		echo "<th>Address&nbsp;</th>";
		echo "<th>Phone&nbsp;</th>";
		echo "<th>Owner ID&nbsp;</th>";
		echo "</tr>";
		if (mysqli_num_rows($sql2) > 0) {
			while($row = mysqli_fetch_assoc($sql2)){
			echo "<tr>";
			echo "<td>" . $row["RCName"] . "</td>";
			echo "<td>" . $row["RCAddress"] . "</td>";
			echo "<td>" . $row["Phone"] . "</td>";
			echo "<td>" . $row["OwnerID"] . "</td>";
			echo "</tr>";
			}
		}
	}
?>

