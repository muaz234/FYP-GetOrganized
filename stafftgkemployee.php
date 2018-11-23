<html>
<head>
	 <meta charset="utf-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<center>
	<h1> Employee  Submitted by Staff </h1>



<?php

require_once 'database.php';
if($conn == false)
	{
	
		die('Error:Could not connect'. mysqli_connect_error() );
	}
 



    


$result='SELECT * FROM employee' ;

$result = mysqli_query($conn, $result) 
	or die(mysqli_error($conn)) ;

// echo " <center> < table border='1'  cellpadding='10' > " ; 
 // echo "<tr>  <th>  Branch ID </th>  <th>   Employee Amount </th>   <th>   Actual Employee </th>   <th>   Broken CCTV </th>    <th>   Broken Item </th>     <th>   Date of Report   </th>    </tr> " ;

   echo "<center>";
	echo "<table border='1' cellpadding='10'>";
	echo "<tr> <th>ID</th> <th>Name</th> <th>Join Date</th>  <th>IC Number</th> <th>Account Number </th> <th> Address </th> <th> Branch </th> <th> Remarks </th>    </tr> ";

	// loop through results of database query, displaying them in the table
	while($row = mysqli_fetch_array( $result )) {

		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['empid'] . '</td>';
		echo '<td>' . $row['empname'] . '</td>';
		echo '<td>' . $row['date'] . '</td>';
		echo '<td>' . $row['icno'] . '</td>';
		echo '<td>' . $row['accno'] . '</td>';
		echo '<td>' . $row['address'] . '</td>';
        echo '<td>' . $row['branch'] . '</td>';
		echo '<td>' . $row['comment'] . '</td>';
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
		<br>

<a  href="indexdua.php" > Home </a> 
<input type ="button" value="Download as .pdf" >
<input type ="button" value="Print" >
</body>
</html>