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

	$custType=$_POST["custType"];
	$ssn=$_POST["ssn"];
	$init=$_POST["init"];
	$lname=$_POST["lname"];
	$phone=$_POST["phone"];
	$cname=$_POST["cname"];
	
	if ($custType=='I') {$cname='';}
	else {$ssn=0; $init=''; $lname='';}
	$sql="CALL AddCustomer('$custType', $ssn, '$init', '$lname', '$phone', '$cname');";
	

	mysqli_query($connection,$sql) or die(mysqli_error($connection));
	echo "<h4>Customer has been added!</h4><br><br>";
	
	if($custType=='I') {$sql1="SELECT * FROM individual WHERE ssn=$ssn";}
	else {$sql1="SELECT * FROM company WHERE cname='$cname'";}
	
	$sql2=mysqli_query($connection,$sql1);

	while($row = mysqli_fetch_assoc($sql2)){
	echo "<h4>Assigned Customer ID is: </h4>".$row["CID"];
	}
?>