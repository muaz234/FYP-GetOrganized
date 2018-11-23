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
  <script
    src="http://code.jquery.com/jquery-3.3.1.slim.js"
    integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA="
    crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
body {
    background-color: #d1f4ff;
}
div.container6 {

  display: flex;
  align-items: right;
  justify-content: right ;
}

</style>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>

  <div class="container-fluid">

      <h2 align="center">Inventory Record</h2>
  <center>    <a href="indexadmin.php"  class="btn btn-info"  align="center" role="button" class="pull-right" > Home  </a> </center>
      	<div class="row">
  			<div class="col-md-6 col-md-offset-3" style="margin-top:100px;">
  				<div class="panel panel-primary">

            <div class="panel-heading">
  						<h3 class="panel-title">Inventory Out</h3>
  					</div>
            <div class="container6">
  					<table class="table table-hover" id="dev-table">
  						<thead>
  							<tr>
  								<th>Item</th>
  								<th>Quantity</th>
  								<th>Date Request</th>

  							</tr>
  						</thead>
  						<tbody>
<?php
require_once 'database.php' ;
$query = "SELECT * FROM checkout" ;
$result = mysqli_query($conn,$query) ;
  while($row = mysqli_fetch_array($result))
  {
    ?>
    <tr>
      <td><?php echo $row['Item'] ?></td>
      <td><?php echo $row['quantity'] ?></td>
      <?php
       $date= $row['DateRequest'];
       $convert_date = date("d-m-Y",strtotime($date));
        ?>
      <td><?php echo $convert_date ?></td>

    </tr>


  <?php
  }

 ?>



  						</tbody>
  					</table>
  				</div>
  			</div>

  		</div>
    </div>
  </div>


</body>

</html>
