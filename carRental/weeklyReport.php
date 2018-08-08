<html>
    <head>
        <title>CAR RENTAL COMPANY </title>    
    	<style type="text/css">
		.auto-style2 {
			text-align: right;
		}
		.auto-style1 {
			border-width: 0;
		}
		.auto-style3 {
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
		<table cellpadding="0" cellspacing="0" style="width: 100%">
			<tr>
				<td style="width: 637px" class="auto-style3" valign="top">
			
	<div class="leftContent">
	
    <form action="report.php" method="post">
		<h2>Weekly report: </h2>
		<table cellpadding="0" cellspacing="0" class="auto-style1">
			<tr>
				<td class="auto-style2" style="height: 24px">Week starts:</td>
				<td style="height: 24px"> 
				<input type="text" name="startWeek" style="width: 47px" value="11" size="2"></td>
				<td style="width: 359px">(Week of the year between 1-52, for 
				example 
				11)</td>
			</tr>
			<tr>
				<td class="auto-style2" style="height: 24px">Week ends:</td>
				<td style="height: 24px"> 
				<input type="text" name="endWeek" style="width: 47px" value="20" size="2"></td>
				<td style="height: 24px; width: 359px">(Week of the year between 
				1-52, for example 20)</td>
			</tr>
			<tr>
				<td class="auto-style2">Select report by:</td>
				<td> 
					<select name = "rptBy">
					<option selected="">Owner</option>
					<option>Type</option>
					<option>CarUnit</option>
					</select></td>
				<td style="width: 359px">&nbsp;</td>
			</tr>
			<tr>
				<td class="auto-style2">&nbsp;</td>
				<td>
				&nbsp;</td>
				<td style="width: 359px">&nbsp;</td>
			</tr>
			<tr>
				<td class="auto-style2">&nbsp;</td>
				<td>
					<input type="submit" name="submit1" value="Report"></td>
				<td style="width: 359px" class="auto-style2">
				</td>
			</tr>
		</table>
&nbsp;</form>
</div>

    <form action="report-detail.php" method="post">
		<h3>For detail report: </h3>
		<table cellpadding="0" cellspacing="0" class="auto-style1">
			<tr>
				<td class="auto-style2" style="height: 24px">Week starts:</td>
				<td style="height: 24px"> 
				<input type="text" name="startWeek" style="width: 47px" value="11" size="2"></td>
				<td style="width: 359px">(Week of the year between 1-52, for 
				example 
				11)</td>
			</tr>
			<tr>
				<td class="auto-style2" style="height: 24px">Week ends:</td>
				<td style="height: 24px"> 
				<input type="text" name="endWeek" style="width: 47px" value="20" size="2"></td>
				<td style="height: 24px; width: 359px">(Week of the year between 
				1-52, for example 20)</td>
			</tr>
			<tr>
				<td class="auto-style2">&nbsp;</td>
				<td>
				&nbsp;</td>
				<td style="width: 359px">&nbsp;</td>
			</tr>
			<tr>
				<td class="auto-style2">&nbsp;</td>
				<td>
					<input type="submit" name="submit" value="Detail Report"></td>
				<td style="width: 359px" class="auto-style2">
				</td>
			</tr>
		</table>
&nbsp;</form>
				</td>
				<td class="auto-style3" valign="top">
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
for ($i=1; $i<=52; $i++) {
	$result = Start_End_Date_of_a_week($i, 2018);
	echo 'Week'.$i.' starts From: '. $result[0].' To: '. $result[1];
	echo '<br>';
}
?>
</td>
			</tr>
		</table>

</html>