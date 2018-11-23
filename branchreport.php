<html>
<head>
<title>Branch Report </title>
<script
  src="http://code.jquery.com/jquery-3.3.1.slim.js"
  integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA="
  crossorigin="anonymous"></script>


<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
<script>
$(document).ready(function(){
    $('#characterLeft').text('140 characters left');
    $('#message').keydown(function () {
        var max = 140;
        var len = $(this).val().length;
        if (len >= max) {
            $('#characterLeft').text('You have reached the limit');
            $('#characterLeft').addClass('red');
            $('#btnSubmit').addClass('disabled');
        }
        else {
            var ch = max - len;
            $('#characterLeft').text(ch + ' characters left');
            $('#btnSubmit').removeClass('disabled');
            $('#characterLeft').removeClass('red');
        }
    });
});
</script>

 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
  <div class="modal fade" id="getmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Submitted</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
              </div>
                  <div class="modal-body" id="body">
                    <h2>Records have been sucessfully updated </h2>

                    <p>This report will be reviewed by  the authorized person </p>
                      </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a type="link" class="btn btn-primary" href="indexdua.php" > Dismiss </a>
                        </div>
          </div>
      </div>
  </div>

<div class="container">
  <div class="container6">
<div class="col-md-6">
    <div class="form-area">
        <form role="form" method="POST" action="" id="branch">
        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Submit  Report</h3>
    				<div class="form-group">
            Branch Name:<select name="branchid" id= "brid" >
               <option value="102" >Kuala Lumpur </option>
               <option value="103" >Kluang </option>
               <option value="101" >Bukit Mertajam </option>
               <option value="100" >Petaling Jaya </option>
               </select>
               <br>
					</div>
					<div class="form-group">
						Amount of Employees: <input type="number" name="amtemp" class="form-control" id="emp_amt" placeholder="Employee amount" > <br>
					</div>
					<div class="form-group">
						Actual Employees: <input type="number" name="actemp" id="act_emp" class="form-control" placeholder="Actual number of employee" > <br>
					</div>
					<div class="form-group">
						Number of broken CCTV : <input type="number" name="brokencctv" id="broken_cctv" class="form-control" placeholder="Broken CCTV" > <br>
					</div>
                    <div class="form-group">
                    Item that needed to be replaced : <tr>
                     <textarea rows="3" cols="20" name="itemreplace" id="replaceitem" class="form-control" placeholder="Item replacement" > </textarea> <br>
                    </div>
                    <input type="submit" value="Submit"   name="submit" class="btn btn-info" data-toggle="modal" data-target="#getmodal" style="float:right;" >

        </form>

    </div>
</div>
</div>
</div>







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
?>
<script type="text/javascript">
$(document).ready(function() {
       $('#getmodal').modal('show'); //twitter bootstrap modal


});
</script>



<?php
                   }
else{
 echo"Error, report not received " . mysqli_error($conn) ;

 }
}
?>
