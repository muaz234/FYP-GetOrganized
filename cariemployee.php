
<html>
<head> 
<title> Search Employee </title>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<center>


<form method="post" action=""  >

<label for="cariemployee" </label>  Employee Name: <input type="text" name="id"  > <br> <br>

 <!-- Search by Name <input type="text" name="nama" placeholder="Enter name" > <br> -->
<input type="submit" value="submit" name="submit" > 
<input type="reset" value="reset" > 



<br>
</form>

</body>
</html>


<?php

require_once 'database.php';

if($conn == false)
	{
	
		die('Error:Could not connect'. mysqli_connect_error() );
	}
 


if (!empty($_REQUEST['id'])) {

$id = mysqli_real_escape_string($conn,$_REQUEST['id']);     
  // $name = mysqli_real_escape_string($conn,$_REQUEST['nama']);  

$sql = "SELECT * FROM employee WHERE empname LIKE '%".$id."%' "; 
$result = mysqli_query($conn,$sql); 


echo "<center>";

	echo "<table border='1' cellpadding='10'>";
	echo "<tr> <th>ID</th> <th>Name</th> <th>Join Date</th>  <th>IC Number</th> <th>Account Number </th> <th> Address </th> <th> Branch </th> <th> Remarks </th>    </tr> ";

	// loop through results of database query, displaying them in the table
	while($row = mysqli_fetch_array($result)) {

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

	// fetch semua dlm array pastu display as table
	
     ///display table yg dah search
		
	}

	// setelll
	echo "</table>";
	echo "</center>";



}


else 
	{
	echo "not found" ; 
     }

mysqli_close($conn);
?>




