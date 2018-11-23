<html>
<head>
<title> Leave Approval </title>
</head>

<?php

require 'verifyuser.php';
$conn=mysqli_connect('localhost','root','','test');


$sql="SELECT * FROM cuti where Approval='0' ";
$result=mysqli_query($conn, $sql);
echo "<center>";
echo "<table border='1' cellpadding='10'>";
echo "<tr>  <th>ID</th> <th>Name</th> <th>Title</th> <th>Dept</th> <th>EmpID</th> <th>Request</th> <th>DateBefore</th> <th>DateAfter</th> <th>NumDays</th> <th>Approve</th>  </tr>";
echo "<form action='approvecuti.php' method='POST'>";
while($row = mysqli_fetch_array( $result )) {

			echo "<tr>";
		echo '<td>' . $row['ID'] . '</td>';	
		echo '<td>' . $row['Name'] . '</td>';
		echo '<td>' . $row['Title'] . '</td>';
		echo '<td>' . $row['Dept'] . '</td>';
		echo '<td>' . $row['EmpID'] . '</td>';
		echo '<td>' . $row['Request'] . '</td>';
		echo '<td>' . $row['DateBefore'] . '</td>';
        echo '<td>' . $row['DateAfter'] . '</td>';
		echo '<td>' . $row['NumDays'] . '</td>';
		
		echo '<td>'; 
		echo '<input name="approve[]" type="checkbox" value='.$row["ID"].'>' ;
		echo '</td>';
			echo "</tr>";
	}

	// close table>
	echo "</table>";
	echo "</center>";
	echo "<input type='submit' value='Approve' name='Submit' ></form>"; 



?>