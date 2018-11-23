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
<title> Search Report </title>


 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
table.d {
    table-layout: fixed;
    width: 100%;
}
body {
    background-color: #d1f4ff;
}
</style>
</head>
<body>
<center>
  <div class="container">
    <form method="post" action=""  >


    Branch :<select name="brid" id ="branchid"  >

       <option value="102" >Kuala Lumpur </option>
       <option value="103" >Kluang </option>
       <option value="101" >Bukit Mertajam </option>
       <option value="100" >Petaling Jaya </option>
       </select>



    <button type="submit" value="Search" name="submit"   class="btn btn-primary">Submit</button>
    </form>
<div class="table-responsive" >

<table class="table table-striped"   width="100%" style="margin-top:100px" >

    <!--Table head-->
    <thead >
        <tr class="table-primary" >
            <th>ID</th>
            <th>Employee Amount</th>
            <th>Actual Amount</th>
            <th>Broken CCTV</th>
            <th>Item Replacement</th>
            <th>Report Date </th>

        </tr>
        </thead>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


<?php


require_once 'database.php';

if($conn == false)
	{

		die('Error:Could not connect'. mysqli_connect_error() );
	}

if(isset($_POST['submit']))	{

if (!empty($_POST['brid'])) {

$id = mysqli_real_escape_string($conn,$_POST['brid']);



echo "&nbsp" ;

if($id == '100'){
	echo "Petaling Jaya";
}
else if($id == '101'){

	echo "Bukit Mertajam" ;
}
else if($id == '102'){
	echo "Kuala Lumpur" ;

}
else if($id == '103' ){
	echo "Kluang" ;
}

$sql = "SELECT * FROM branchreport WHERE branchid LIKE '%".$id."%'";
$result = mysqli_query($conn,$sql);




	// fetch semua dlm array pastu display as table
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
        $display = date("d-m-Y",strtotime($date)) ;
    ?>

	<td><?php echo $display ;  ?> </td>

	</tr>
</tbody>

<?php
}
}
else {
	echo "not found" ;
     }
}


?>



</center>
</table>
</div>
<a href="indexadmin.php"   class="btn btn-primary">Home</a>
</div>
</body>
</html>
