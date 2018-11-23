<html>
<head>
<title>View User</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body {
    background-color: #d1f4ff;
}
html, body {
    width: 100%;
}
table {
    margin: 0 auto;
    position:fixed;
    margin-left:-150px; /* half of width */
    margin-top:-150px;
    top:50%;
    left:50%;
    width:300px;
    height:300px;
}
a {



}
.center {
    margin: auto;
    width: 80%;

    padding: 20px;
}
h2.sansserif {
    font-family: Arial, Helvetica, sans-serif;
}
h2.serif {
    font-family: "Times New Roman", Times, serif;
}
.content {
    max-width: 500px;
    margin: auto;
}
.w-auto {
    width: auto;
}
</style>
</head>
<body>

<div class="center">
<center>
<h2 class="serif"> Employee Details </h2>
</center>


<?php
session_start();
require_once 'database.php';
if($conn == false)
	{

		die('Error:Could not connect'. mysqli_connect_error() );
	}







$result="SELECT * FROM employee where empid = '".$_SESSION["empid"]."'  " ;

$result = mysqli_query($conn, $result)
	or die(mysqli_error($conn)) ;

// echo " <center> < table border='1'  cellpadding='10' > " ;
 // echo "<tr>  <th>  Branch ID </th>  <th>   Employee Amount </th>   <th>   Actual Employee </th>   <th>   Broken CCTV </th>    <th>   Broken Item </th>     <th>   Date of Report   </th>    </tr> " ;


	// loop through results of database query, displaying them in the table
	while($row = mysqli_fetch_array( $result )) {
?>

<div class="container">
  <div style="display:flex;justify-content:center;align-items:center;">
  <div class="col-sm-4 text-center" >
<table class="table table-striped table-responsive w-auto"  border='1' cellpadding='50'>
   	 <center>

	<tr>
	<th scope="row" >ID</th>
 	<td><?php echo  $row['empid'] ?> </td>
	</tr>
	<tr><th scope="row">Name</th>
	<td> <?php echo $row['empname'] ?> </td>
	</tr>
	<tr><th scope="row" >Email</th>
	<td> <?php echo $row['email'] ?> </td>
	</tr>
	<tr><th scope="row">Join Date</th>
    <?php $display = $row['datejoin'];
          $display_user = date("d-m-Y",strtotime($display)) ;
    ?>
	<td> <?php echo $display_user ; ?>	</td>
	</tr>
	<tr><th scope="row">IC Number</th>
	<td> <?php echo $row['icno'] ?> </td>
	</tr>
	<tr><th scope="row">Account Number </th>
	<td><?php echo $row['accno'] ?> </td>
	</tr>
	<tr><th scope="row"> Address </th>
	<td> <?php echo $row['address'] ?> </td>
	</tr>
	<tr> <th scope="row"> Branch </th>
	<td> <?php echo  $row['branch'] ?> </td>
	</tr>
	<tr> <th scope="row"> Remarks </th>
	 <td> <?php echo $row['comment'] ?> </td>
	</tr>


<?php
}
?>



</center>
</table>
</div>
</div>
</div>

<div style="text-align:center"> 
<a  href="simpanemployee.php"  class="btn btn-info" role="button" > Update Information </a>

  <a  href="indexdua.php"  class="btn btn-info" role="button" > Home </a>
</div>


</div>
</body>
</html>
