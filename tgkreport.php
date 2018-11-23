
<?php
session_start();
if(!isset($_SESSION["empname"])  ) {
header("Location:login.php");
}
if($_SESSION["level"]!="manager"){
  header("Location:login.php");
}

?>


<html>
<head>
	<title>View Existing Report</title>



	 <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body {
    background-color: #d1f4ff;
}
.points_table thead{
  background: #33A1DE ;
  color: #fff;
}
</style>
</head>
	<center>
	<h2> Report Submitted by Staff </h2>
<body>
  <div class="container">

    	<center>
    <a  href="carireport.php" class="btn btn-primary" role="button" > Search </a>
    <a  href="indexadmin.php"  class="btn btn-primary" role="button"> Home </a>


    </center>
<div class="table-responsive" style="margin-top:100px;" >
<table class="table table-striped">

    <!--Table head-->
    <thead  class="thead-dark">
        <tr class="table-primary" >
            <th>ID</th>
            <th>Employee Amount</th>
            <th>Actual Amount</th>
            <th>Broken CCTV</th>
            <th>Item Replacement</th>
            <th>Report Date </th>

        </tr>
        </thead>


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


	// loop through results of database query, displaying them in the table
	while($row = mysqli_fetch_array( $result )) {
?>

<center>
 <tbody>
	<tr>
 	<td><?php echo  $row['branchid'] ?> </td>


	<td> <?php echo $row['empamt'] ?> </td>


	<td> <?php echo $row['actemp'] ?> </td>


	<td> <?php echo $row['cctv'] ?>	</td>


	<td> <?php echo $row['item'] ?> </td>

  <?php
    $date = $row['datereport'] ;
    $display_date = date("d-m-Y",strtotime($date)) ;
   ?>
	<td><?php echo $display_date ?> </td>

	</tr>
</tbody>

<?php
}
?>



</center>
</table>
</div>


</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
