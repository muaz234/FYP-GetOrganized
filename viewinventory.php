<?php


require_once 'database.php';



?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

<title>Inventory</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    body {
        color: #566787;
       
    font-family: 'Roboto', sans-serif;
  }
  .table-wrapper {
        background: #fff;
        padding: 20px;
        margin: 30px 0;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
  .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 8px 0 0;
        font-size: 22px;
    }
    .search-box {
        position: relative;        
        float: right;
    }
    .search-box input {
        height: 34px;
        border-radius: 20px;
        padding-left: 35px;
        border-color: #ddd;
        box-shadow: none;
    }
  .search-box input:focus {
    border-color: #3FBAE4;
  }
    .search-box i {
        color: #a0a5b1;
        position: absolute;
        font-size: 19px;
        top: 8px;
        left: 10px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
      background-color: #fcfcfc;
  }
  table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
  }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table td:last-child {
        width: 130px;
    }
    table.table td a {
        color: #a0a5b1;
        display: inline-block;
        margin: 0 5px;
    }
  table.table td a.view {
        color: #03A9F4;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }    
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 95%;
        width: 30px;
        height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 30px !important;
        text-align: center;
        padding: 0;
    }
    .pagination li a:hover {
        color: #666;
    } 
    .pagination li.active a {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
  .pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 6px;
        font-size: 95%;
    }    
    body {
    background-color: #d1f4ff;
}
</style>


</head>
<body>
    <div class="container">
      
        <div class="table-wrapper">
       <center><a href="addinventory.php"  class="btn btn-info"  align="center" role="button" class="pull-right" >Add New Inventory </a>  
  <a href="checkoutinventory.php"  class="btn btn-info"  align="center" role="button" class="pull-right" >Request Inventory </a>  </center> <br>

            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>View Current  <b>Inventory</b></h2></div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>First Count <i class="fa fa-sort"></i></th>
                        <th>Date Count</th>
                        <th>Second Count <i class="fa fa-sort"></i></th>
                        <th>Date Count</th>
                        <th>Remarks <i class="fa fa-sort"></i></th>
                        <th>Options</th>
                        
                    </tr>
                </thead>

 
 
 

      
<?php
require_once 'database.php';
$sql = "SELECT * FROM inventory";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array( $result )) {
?>

<tr>
    <!-- <td class="table-info"><?php //  echo  $row['id'] ?>  </td> -->

   <!--<?php  //echo "<td><img src='images/".$row['image']."'></td>" ?> -->
     <td class="table-info"> <?php echo $row['item'] ?> </td>
     <?php
      $firstdate_convert = $row['date1'] ;
      $fistdate_newformat = date('d-m-Y',strtotime($firstdate_convert)) ;

      $second_date_convert = $row['date2'] ;
      $seconddate_newformat = date('d-m-Y',strtotime($second_date_convert)) ;
     ?>
     <td class="table-info"><?php echo $row['count1'] ?> </td>
     <td class="table-info"><?php echo $fistdate_newformat ?> </td>
     <td class="table-info"><?php echo $row['count2'] ?> </td>
      <td class="table-info"><?php echo $seconddate_newformat ?> </td>
     <td class="table-info"><?php  echo  $row['remarks'] ?> </td>
 
  <?php

$_SESSION["id"] = $row["id"];
$id = $row['id'] ;

  ?>
             
    
    <td class="table-info">
      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $row['id'] ; ?> ">
  Update Inventory
</button>
      
<!-- Modal -->
<div class="modal fade" id="<?php echo $row['id'] ; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update inventory item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<div class="modal-body"  style="text-align: center;">
           <div  style="align-content: center">
  <form action="getinventory.php" method="GET">
          <?php
            include 'updateinventory.php' ;
            ?>
              <div class="header">
                    <h2> </h2>
              </div>
                  <br><br>

            <div class="row">
                <div class="col-25">
              
                  <label for="item">Details of item</label>
                
              </div> 
          </div>
        <div class="row">
          <div class="col-25">
            <input type="text" name="item" placeholder="Item details" value="<?php echo $item; ?>"  > <br>
          </div>
        </div>
        <!--<div class="row">
        <div class="col-25">
        <label for="pic">Sample Picture</label>
        </div> 
        <div class="col-25">
        <input type="file" name="pic" placeholder="Choose File"> <br>
        </div>
        </div> -->
        <div class="row">
            <div class="col-25">
                <label for="quantity">Quantity Available</label>
            </div> 

            <div class="col-25">
                <input type="number" name="quantity" placeholder="Quantity"> <br>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="remarks">Remarks of Item</label>
            </div> 
            <div class="col-75">
                <input type="textarea" name="remarks" rows="1" cols="30" placeholder="Enter Remarks" style="height:100px" value="<?php echo $remarks; ?>"> <br>
            </div>
        </div>



                  <div class="modal-footer">
            <input type="hidden" value="<?php echo  $id ?>" name="id"  >
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" value="Update" name="submit" class="btn btn-primary">        
        
      
      </div>

  
        </div>
  </form>
            </div>
        </div>
      </div>
    </div>
  </td>

  
</tr>

<?php
}


?>

 </table>

<div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>     
</body>
</html>                                                               


<center><a href="indexdua.php"  class="btn btn-info" role="button" class="pull-right" >Home </a> </center>



</body>
</html>


