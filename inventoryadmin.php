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
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <style>
  .points_table thead {
  	width: 100%;
  }

  .points_table tbody {
  	height: 562px;
  	overflow-y: auto;
  	width: 100%;
  }

  .points_table thead tr{
  	width: 99%;
  }

   .points_table tr{
   	width: 100%;
   }

  .points_table thead, .points_table tbody, .points_table tr, .points_table td, .points_table th{
  	display: inline-block;
  }

  .points_table thead{
  	background: #33A1DE ;
  	color: #fff;
  }

  .points_table tbody td, .points_table thead > tr> th{
  	float: left;
  	border-bottom-width: 0;
  }

  .points_table>tbody>tr>td, .points_table>tbody>tr>th, .points_table>tfoot>tr>td, .points_table>tfoot>tr>th, .points_table>thead>tr>td, .points_table>thead>tr>th{
  	padding: 12px;
  	height: 50px;
  	text-align: center;
  	line-height: 32px;
  }

  .odd {
  	background: #ffffff;
  	color: #000;
  }

  .even {
  	background: #efefef;
  	color: #000;
  }

  .points_table_scrollbar{
  	height: 612px;
  	overflow-y: scroll;
  }

  .points_table_scrollbar::-webkit-scrollbar-track{
  	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.9);
  	border-radius: 10px;
  	background-color: #444444;
  }

  .points_table_scrollbar::-webkit-scrollbar{
  	width: 1%;
  	min-width: 5px;
  	background-color: #F5F5F5;
  }

  .points_table_scrollbar::-webkit-scrollbar-thumb{
  	border-radius: 10px;
  	background-color: #D62929;
  	background-image: -webkit-linear-gradient(90deg, transparent, rgba(0, 0, 0, 0.4) 50%, transparent, transparent)
  }
  body {
      background-color: #d1f4ff;
  }
  </style>
</head>
<body>

<div class="container">
  <h2 align="center">Inventory</h2>
<center><a href="checkoutinventoryadmin.php"  class="btn btn-info"  align="center" role="button" class="pull-right" > Inventory Checkout  </a>
<a href="indexadmin.php"  class="btn btn-info"  align="center" role="button" class="pull-right" > Home  </a> </center>
	<div class="row" style="margin-top:100px;">

		<table class="points_table">
			<thead>
				<tr>
					<th class="col-xs-2">Item</th>
					<th class="col-xs-2">First Count</th>
					<th class="col-xs-2">Date</th>
					<th class="col-xs-2">Second Count</th>
					<th class="col-xs-2">Date</th>
					<th class="col-xs-2">Remarks</th>
				</tr>
			</thead>

			<tbody class="points_table_scrollbar">
      <?php
      require_once 'database.php' ;
      $sql = "SELECT * FROM inventory";
      $result = mysqli_query($conn,$sql);
      while($row=mysqli_fetch_array($result))
      {
?>
        <tr class="odd">
					<td class="col-xs-2"><?php echo $row['item']; ?> </td>
					<td class="col-xs-2"><?php echo $row['count1'] ; ?></td>
          <?php
           $date= $row['date1'];
           $convert_date = date("d-m-Y",strtotime($date));
            ?>
            <?php
             $second_date= $row['date2'];
             $convert_date_second = date("d-m-Y",strtotime($second_date));
              ?>
					<td class="col-xs-2"><?php echo $convert_date ; ?></td>
					<td class="col-xs-2"><?php echo $row['count2'] ; ?></td>
					<td class="col-xs-2"><?php echo $convert_date_second ; ?> </td>
					<td class="col-xs-2"><?php echo $row['remarks'] ; ?> </td>
				</tr>



<?php

      }



      ?>


			</tbody>
		</table>
	</div>
</div>


</body>
</html>



</html>
