<?php
session_start();
if(!isset($_SESSION["empname"])  ) {
header("Location:login.php"); 
}
if($_SESSION["level"]!="staff"){
  header("Location:login.php");
}

?>





<html>
<head>
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Report Form</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">




</head>
<body>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Submit a Report</div>
      <div class="card-body">
        <h1> Fill the details required.  </h1>
    
        <p> A report form for every branch and to be submitted to the manager/headquarters </p>


<form action=""  method="post" >

Branch Name:<select name="branchid" id= "brid" >
   <option value="102" >Kuala Lumpur </option>
   <option value="103" >Kluang </option>
   <option value="101" >Bukit Mertajam </option>
   <option value="100" >Petaling Jaya </option>
   </select>
   <br>

Amount of Employees: <input type="number" name="amtemp" class="form-control" id="emp_amt" placeholder="Employee amount" > <br> 

Actual Employees: <input type="number" name="actemp" id="act_emp" class="form-control" placeholder="Actual number of employee" > <br> 

Number of broken CCTV : <input type="number" name="brokencctv" id="broken_cctv" class="form-control" placeholder="Broken CCTV" > <br> 

Item that needed to be replaced : <tr>
 <textarea rows="3" cols="20" name="itemreplace" id="replaceitem" class="form-control" placeholder="Item replacement" > </textarea> <br>



<input type="submit" value="Submit" name="submit" onclick="clearForm()" >
<input type="reset" value="Reset"  >

</form>
 </div> 
     <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>  
</body>
</html>
 <?php 
require_once 'database.php';
if($conn == false)
  {
    die("Error:Could not connect" . mysqli_connect_error() );
  }
if(isset($_POST['submit'])){
$branch = $_POST['branchid'];
$amtemp = $_POST['amtemp'];
$actemp = $_POST['actemp'];
$cctv = $_POST['brokencctv'];
$item = $_POST['itemreplace'];
$today = date("Y-m-d");
$query = "INSERT into branchreport (branchid,empamt,actemp,cctv,item,datereport) VALUES ('$branch' , '$amtemp','$actemp', '$cctv', '$item' , '$today' )";

if(mysqli_query($conn, $query)) {
  
  header("refresh:2; url=thanks.html");
                    }
else{
  echo"Error, report not received " . mysqli_error($conn) ;

  }
}
?>