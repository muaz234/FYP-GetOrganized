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
<title> Leave Approval </title>

 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
<style>
body {
    background-color: #d1f4ff;
}
</style>
</head>
<body>
<center>
<h1> Leave Approval </h1>
</center>
<div class="container">
<table class="table table-bordered">
<thead  class="thead-dark">
        <tr>

            <th>Name</th>
            <th>Title</th>
            <th>Dept</th>
            <th>EmpID</th>
            <th>Type of leave </th>
            <th>DateBefore</th>
            <th>DateAfter</th>
            <th>NumDays</th>
            <th>Remarks</th>
            <th>Approve</th>

        </tr>
        </thead>

<?php


require_once 'database.php';


$sql="SELECT * FROM cuti where Approval='0' ";
$result=mysqli_query($conn, $sql);
echo "<form action='approvecuti.php' method='POST'>";
while($row = mysqli_fetch_array( $result )) {

?>
 <center>
 <tbody>
 	<tr>

		<td> <?php echo $row['Name'] ?>  </td>
		<td> <?php echo $row['Title'] ?>  </td>
		<td> <?php echo $row['Dept'] ?>  </td>
		<td> <?php echo $row['EmpID'] ?>  </td>
		<td> <?php echo $row['Request'] ?>  </td>
    <?php
     $datebefore_format =$row['DateBefore'] ;
     $datebefore_convert = date("d-m-Y",strtotime($datebefore_format)) ;
     $dateafter_format =$row['DateAfter'] ;
     $dateafter_convert = date("d-m-Y",strtotime($dateafter_format)) ;


      ?>
		<td> <?php echo $datebefore_convert ?>  </td>
        <td> <?php echo $dateafter_convert ?>  </td>
		<td> <?php echo $row['NumDays'] ?>  </td>
		<td> <?php echo $row['Remarks'] ?>  </td>

		 <td>
		<input name='approve[]' type='checkbox' value='<?php echo $row['ID'] ?>' >
		</td>
		</tr>
	</tbody>
</center>
<?php
	}
?>



</table>
</div>
<div class="w3-container">
<center>
<input type='submit' value='Approve' name='Submit' class="btn btn-primary" >
</center>
</div>
</form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
