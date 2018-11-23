<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Employee Details</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Enter An Employee Details</div>
      <div class="card-body">
        <form action="" method="POST" >
            

                 <label for="Join Date">Join Date</label>
            <input type="date" id="joindate" name="join_date" type="joindate" placeholder="Join Date" > <br>

 <label for="IC Number">IC Number</label>
            <input type="number" id="ICno" name="ICno" type="ICno" placeholder="IC Number">  <br>


 <label for="Acc Number">Account Number</label>
            <input type="number" id="accno" name="accno" type="accno" placeholder="Account Number">    <br>

             <label for="Address">Address</label>
            <input type="text" id="address" name="address" type="address" placeholder="Address">    <br>

             <label for="Branch">Branch</label>
            <input type="text" id="branch" name="branch" type="branch" placeholder="Branch">     <br>

             <label for="remarks">Remarks</label>
            <textarea rows="3" cols="20" name="remarks" id="remarks" class="form-control" placeholder="Remarks" > </textarea> <br>
            Status <select name="status" value="status">
              <option value="Active" selected >Active</option>
              <option value="Resigned">Resigned </option>
              <option value="Dismissed">Dismissed </option>
              <option value="Retired">Retired </option>
              <option value="Deceased">Deceased </option>
</select> <br>


        <!--<div class="form-group">
   <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
           -->




          <input type="submit" value="Submit" name="submit" >
          <input type="reset" value="Reset"  >
        </form>
        <div class="text-center">

        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>




<?php

session_start();
require_once 'database.php';

if($conn == false)
	{

		die("Error:Could not connect" . mysqli_connect_error() );
	}

if(isset($_POST['submit']))
{
$empID = mysqli_real_escape_string($conn,$_POST['userid']) ;

$empName = mysqli_real_escape_string($conn,$_POST['empName']) ;
$empJoin = $_POST['join_date'] ;
$empJoin=date('Y-m-d',strtotime($empJoin));

$empIcno = mysqli_real_escape_string($conn,$_POST['ICno']) ;
$empAcc = mysqli_real_escape_string($conn,$_POST['accno']) ;
$empAddress = mysqli_real_escape_string($conn,$_POST['address']) ;
$empBranch = mysqli_real_escape_string($conn,$_POST['branch']) ;
$empRemarks = mysqli_real_escape_string($conn,$_POST['remarks']) ;
$empStatus = mysqli_real_escape_string($conn,$_POST['status']) ;

$insert = "UPDATE employee SET datejoin='$empJoin' , icno='$empIcno' , accno='$empAcc' , address='$empAddress' , branch='$empBranch' , comment='$empRemarks', status = '$empStatus' where  empid = $empID " ;

$sql ="INSERT into employee (datejoin,icno,accno,address,branch,comment) VALUES ( '$empJoin' , '$empIcno' , '$empAcc' , '$empAddress' , '$empBranch' , '$empRemarks') SELECT datejoin,icno,accno,address,branch,comment from employee  where empname = '".$_SESSION['empname']."' " ;



if(mysqli_query($conn, $insert)) {

	header('Location:viewallemployee.php');
									  }
else{
	echo"Error occured.Please retry. " . mysqli_error($conn) ;

	}

}
mysqli_close($conn)  ;
?>
