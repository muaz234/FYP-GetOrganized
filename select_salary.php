<html>
<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>
body {
    background-color: #d1f4ff;
}
</style>
<title> Salary Approval </title>
</head>
<body>
<center>
<form action = "approvalsalaryadmin.php" method="POST">
<div class="form-group">
    <label for="validate-select">Month</label>
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
<input type="submit" name="submit" class="btn btn-info" value="Select">
<a href="indexadmin.php"  class="btn btn-info"  align="center" role="button" class="pull-right" > Home  </a>
</form>
</center>
<div id ="display"  > </div>

</body>
</html>


<?php
if ( isset($_POST['submit']) )
{
  $month = $_POST['month'];
  $year = $_POST['year'];
}
//include 'table_salary.php';

?>
