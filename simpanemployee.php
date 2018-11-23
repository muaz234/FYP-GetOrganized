
<html lang="en">

<head>
  <title>Employee Details</title>
  <script
    src="http://code.jquery.com/jquery-3.3.1.slim.js"
    integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA="
    crossorigin="anonymous"></script>

 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

  <style>

  .red{
      color:red;
      }
  .form-area
  {
      background-color: #FAFAFA;
  	padding: 10px 40px 60px;
  	margin: 10px 0px 60px;
  	border: 1px solid GREY;
  	}
    div.container6 {

      display: flex;
      align-items: center;
      justify-content: center
    }
    body {
        background-color: #d1f4ff;
    }

  </style>

</head>
<body>
<div class="container">
  <div class="container6">
      <div class="col-md-6">
          <div class="form-area">

                <div class="card-body">
                    <form action="" method="POST" >
                        <br style="clear:both">
                          <h3 style="margin-bottom: 25px; text-align: center;">Enter An Employee Details</h3>

          <div class="form-group">
 						<label for="Acc Number">Account Number</label>
            <input type="number" id="accno" name="accno" type="accno" placeholder="Account Number" required>    <br>
					</div>
          <div class="form-group">
 						<label for="Acc Number">IC Number</label>
            <input type="number"  name="icno" type="accno" placeholder="IC Number" required>    <br>
					</div>
          <div class="form-group">
             <label for="Branch">Join Date</label>
            <input type="date"  name="join_date"   required>     <br>
					</div>
					<div class="form-group">
             <label for="Address">Address</label>
            <input type="text" id="address" name="address" type="address" placeholder="Address" required>    <br>
					</div>
					<div class="form-group">
             <label for="Branch">Branch</label>
            <input type="text" id="branch" name="branch" type="branch" placeholder="Branch" required>     <br>
					</div>
          <div class="form-group">
             <label for="Branch">Department</label>
            <input type="text" id="department" name="dept" type="branch" placeholder="Department" required>     <br>
					</div>
				<div class="form-group">
             <label for="remarks">Remarks</label>
            <textarea rows="3" cols="20" name="remarks" id="remarks" class="form-control" placeholder="Remarks" > </textarea> <br>
					</div>

					<div class="form-group">

					Status <select name="status" value="status">
						<option value="Active" selected >Active</option>
						<option value="Resigned">Resigned </option>
						<option value="Dismissed">Dismissed </option>
						<option value="Retired">Retired </option>
						<option value="Deceased">Deceased </option>
</select> <br>
</div>
<div class="form-group">
          <input type="submit" value="Submit" name="submit" class="btn btn-info" style="float:right;" >

				</div>
        </form>


          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<?php

session_start();
require_once 'database.php';
if(isset($_POST['submit']))
{
if($conn == false)
	{

		die("Error:Could not connect" . mysqli_connect_error() );
	}


//$empID = $_POST['userid'] ;
//$empName = $_POST['empName'] ;
$empJoin = $_POST['join_date'] ;
$DateJoin=date('Y-m-d',strtotime($empJoin));

$empIcno = $_POST['icno'] ;
$empAcc = $_POST['accno'] ;
$empAddress = $_POST['address'] ;
$empBranch = $_POST['branch'] ;
$empRemarks = $_POST['remarks'] ;
$status = $_POST['status'];
$staff = "staff";
$department = $_POST['dept'];
$insert = "UPDATE employee SET designation='$staff' , department = '$department' , datejoin='$DateJoin' , accno='$empAcc' , icno='$empIcno' , address='$empAddress' , branch='$empBranch' , comment='$empRemarks' , status='$status' where  empid = '".$_SESSION['empid']."' " ;

$sql ="INSERT into employee (datejoin,icno,accno,address,branch,comment) VALUES ( '$empJoin' , '$empIcno' , '$empAcc' , '$empAddress' , '$empBranch' , '$empRemarks') SELECT datejoin,icno,accno,address,branch,comment from employee  where empname = '".$_SESSION['empname']."' " ;






if(mysqli_query($conn, $insert)) {

	header('Location:tgkemployee.php');
									  }
else{
	echo"Error occured.Please retry. " . mysqli_error($conn) ;

	}

}
mysqli_close($conn)  ;
?>
