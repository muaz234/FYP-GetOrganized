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
  <style>
  body {
      background-color: #d1f4ff;
  }
  .name{
font-weight: bold;
text-align: center;
float: center;
}
  </style>
  <script
    src="http://code.jquery.com/jquery-3.3.1.slim.js"
    integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA="
    crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<title> Salary Approval </title>

</head>
<body>

<form action = "approvalsalaryadmin.php" method="POST">
<div class="container">
  <h2 align="center">Employee Salary by Month </h2>
<center>
<div class="form-group">
    <label for="validate-select" class="name" >Month</label>
    <div class="input-group">
        <select class="form-control" name="month" id="month" placeholder="Month" style="max-width:40%" required>
            <option value="">Select Month</option>
            <option  value="January" selected="selected" >January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
        </select>
        <select class="form-control" name="year" id="year" placeholder="Year" style="max-width:40%" required>
            <option value="">Select Year</option>
            <option value="2017">2017</option>
            <option  value="2018" selected="selected">2018</option>
            <option value="2019">2019</option>
        </select>
      </div>
</div>
<input type="submit" name="submit" class="btn btn-info" role="button"  value="Select">
<a href="indexadmin.php"  class="btn btn-info"  align="center" role="button" class="pull-right" > Home  </a>
</form>
<div id ="display"  > </div>
</center>
</div>
</body>
</html>


<?php
if ( isset($_POST['submit']) )
{
  $month = $_POST['month'];
  $year = $_POST['year'];
}
include 'table_salary.php';

?>
