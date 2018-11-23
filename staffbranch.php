

<html>
<head>
	<center>
	<h1> Report Submitted by User </h1>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<?php
require_once 'database.php';
if($conn == false)
	{
	
		die('Error:Could not connect'. mysqli_connect_error() );
	}
 



    


$sql='SELECT * FROM branchreport' ;

$result = mysqli_query($conn, $sql ) 
	or die(mysqli_error($conn)) ;

// echo " <center> < table border='1'  cellpadding='10' > " ; 
 // echo "<tr>  <th>  Branch ID </th>  <th>   Employee Amount </th>   <th>   Actual Employee </th>   <th>   Broken CCTV </th>    <th>   Broken Item </th>     <th>   Date of Report   </th>    </tr> " ;

   echo "<center>";
	echo "<table border='1' cellpadding='10'>";
	echo "<tr> <th>ID</th> <th>Amount of Employees</th> <th>Actual Employees</th><th>Broken CCTV</th><th>Broken Item</th><th> DateReport </th> ";

	// loop through results of database query, displaying them in the table
	while($row = mysqli_fetch_array( $result )) {

		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['branchid'] . '</td>';
		echo '<td>' . $row['empamt'] . '</td>';
		echo '<td>' . $row['actemp'] . '</td>';
		echo '<td>' . $row['cctv'] . '</td>';
		echo '<td>' . $row['item'] . '</td>';
		echo '<td>' . $row['datereport'] . '</td>';

		echo "</tr>";
	}

	// close table>
	echo "</table>";
	echo "</center>";

?>
<!DOCTYPE html>
<html>
<head>
	<title>View Existing Report</title>

</head>
<body>
	<center>

<a  href="indexdua.php" > Home </a> 
<input type ="button" value="Download as .pdf" >
<input type ="button" value="Print" >
</body>

</body>
</html>



